<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Skp extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('skp_model');
    }

    public function index()
    {
        $data['data'] = konfigurasi('SKP', 'Data SKP');
        $data['skp'] = $this->skp_model->tampil_from_pegawai();
        $this->template->load('layouts/template', 'pegawai/skp_view', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('uraian', 'uraian', 'required');
        $this->form_validation->set_rules('output', 'output', 'required');
        $this->form_validation->set_rules('mutu', 'mutu', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('biaya', 'biaya', 'required');
        if ($this->form_validation->run() == true) {
            $data['id_user'] = $this->session->userdata('id');
            $data['uraian'] = $this->input->post('uraian');
            $data['output'] = $this->input->post('output');
            $data['mutu'] = $this->input->post('mutu');
            $data['waktu'] = $this->input->post('waktu');
            $data['biaya'] = $this->input->post('biaya');
            $this->skp_model->save($data);
            redirect('pegawai/skp');
        }
    }

    public function edit($id)
    {
        $data['data'] = konfigurasi('SKP', 'Edit SKP');
        $where = array('id' => $id);
        $data['skp'] = $this->skp_model->tampil_edit_pegawai($where, 'tbl_target_skp')->result();
        $this->template->load('layouts/template', 'pegawai/edit_skp', $data);
    }

    public function update($id)
    {

        $data = array(
            'id_user' => $this->session->userdata('id'),
            'uraian' => $this->input->post('uraian'),
            'output' => $this->input->post('output'),
            'mutu' => $this->input->post('mutu'),
            'waktu' => $this->input->post('waktu'),
            'biaya' => $this->input->post('biaya'),
        );

        $where = array(
            'id' => $id
        );

        $this->skp_model->update_data($where, $data, 'tbl_target_skp');
        redirect('Pegawai/skp');
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_target_skp');
        redirect('pegawai/skp');
    }

    public function export()
    {
        $orders = $this->skp_model->tampil_from_pegawai();

        $where = array('id' => $this->session->userdata('id'));
        $pg = $this->skp_model->cari_pegawai($where, 'tbl_user')->result();

        $tanggal = date('d-m-Y');

        foreach ($pg as $pg) {
            $nama_pegawai = $pg->first_name . " " . $pg->last_name;
        }

        $pdf = new \TCPDF();
        $pdf->AddPage('A4');
        $pdf->setPageOrientation('L');
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan SKP " . $nama_pegawai . ' - ' . $tanggal, 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);


        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(55, 8, "Pegawai", 1, 0, 'C');
        $pdf->Cell(35, 8, "NIK", 1, 0, 'C');
        $pdf->Cell(35, 8, "Uraian", 1, 0, 'C');
        $pdf->Cell(35, 8, "Output", 1, 0, 'C');
        $pdf->Cell(35, 8, "Mutu", 1, 0, 'C');
        $pdf->Cell(35, 8, "Waktu", 1, 0, 'C');
        $pdf->Cell(35, 8, "Biaya", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        foreach ($orders->result_array() as $k => $order) {
            $this->addRow($pdf, $k + 1, $order);
        }
        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan SKP -  ' . $tanggal . '.pdf');
    }

    private function addRow($pdf, $no, $order)
    {
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(55, 8, $order['first_name'], 1, 0, '');
        $pdf->Cell(35, 8, $order['nik'], 1, 0, '');
        $pdf->Cell(35, 8, $order['uraian'], 1, 0, 'C');
        $pdf->Cell(35, 8, $order['output'], 1, 0, 'C');
        $pdf->Cell(35, 8, $order['mutu'], 1, 0, 'C');
        $pdf->Cell(35, 8, $order['waktu'], 1, 0, 'C');
        $pdf->Cell(35, 8, $order['biaya'], 1, 0, 'C');
    }
}
