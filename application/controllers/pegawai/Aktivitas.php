<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivitas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Aktivitas_model');
    }

    public function index()
    {
        $data['data'] = konfigurasi('Aktivitas', 'Data Aktivitas');
        $data['ak'] = $this->Aktivitas_model->tampil_from_pegawai();
        $this->template->load('layouts/template', 'pegawai/aktivitas', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        if ($this->form_validation->run() == true) {
            $data['id_user'] = $this->session->userdata('id');
            $data['tanggal'] = $this->input->post('tanggal');
            $data['uraian_aktifitas'] = $this->input->post('aktivitas');
            $data['kuantitas'] = $this->input->post('kuantitas');
            $data['waktu'] = $this->input->post('waktu');
            $data['catatan'] = $this->input->post('catatan');
            $this->Aktivitas_model->save($data);
            redirect('Pegawai/Aktivitas');
        }
    }

    public function edit($id)
    {
        $data['data'] = konfigurasi('Aktivitas', 'Edit Aktivitas');
        $where = array('id' => $id);
        $data['ak'] = $this->Aktivitas_model->tampil_edit_pegawai($where, 'tbl_aktivitas')->result();
        $this->template->load('layouts/template', 'pegawai/edit_aktivitas', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_aktivitas');
        redirect('pegawai/aktivitas');
    }

    public function update($id)
    {

        $data = array(
            'id_user' => $this->session->userdata('id'),
            'tanggal' => $this->input->post('tanggal'),
            'uraian_aktifitas' => $this->input->post('aktivitas'),
            'kuantitas' => $this->input->post('kuantitas'),
            'waktu' => $this->input->post('waktu'),
            'catatan' => $this->input->post('catatan'),
        );

        $where = array(
            'id' => $id
        );

        $this->Aktivitas_model->update_data($where, $data, 'tbl_aktivitas');
        redirect('Pegawai/Aktivitas');
    }

    public function export()
    {
        $orders = $this->Aktivitas_model->tampil_from_pegawai();

        $where = array('id' => $this->session->userdata('id'));
        $pg = $this->Aktivitas_model->cari_pegawai($where, 'tbl_user')->result();

        $tanggal = date('d-m-Y');

        foreach ($pg as $pg) {
            $nama_pegawai = $pg->first_name . " " . $pg->last_name;
        }

        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->setPageOrientation('L');
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan Aktivitas " . $nama_pegawai . ' - ' . $tanggal, 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);


        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(55, 8, "Pegawai", 1, 0, 'C');
        $pdf->Cell(35, 8, "NIK", 1, 0, 'C');
        $pdf->Cell(35, 8, "Tanggal", 1, 0, 'C');
        $pdf->Cell(35, 8, "Output", 1, 0, 'C');
        $pdf->Cell(50, 8, "Waktu", 1, 0, 'C');
        $pdf->Cell(50, 8, "Catatan", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        foreach ($orders->result_array() as $k => $order) {
            $this->addRow($pdf, $k + 1, $order);
        }
        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan Aktivitas -  ' . $tanggal . '.pdf');
    }

    private function addRow($pdf, $no, $order)
    {
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(55, 8, $order['first_name'], 1, 0, '');
        $pdf->Cell(35, 8, $order['nik'], 1, 0, 'C');
        $pdf->Cell(35, 8, $order['tanggal'], 1, 0, 'C');
        $pdf->Cell(35, 8, $order['uraian_aktifitas'], 1, 0, 'C');
        $pdf->Cell(50, 8, $order['waktu'], 1, 0, 'C');
        $pdf->Cell(50, 8, $order['catatan'], 1, 0, 'C');
    }
}
