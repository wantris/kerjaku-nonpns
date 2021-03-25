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
}
