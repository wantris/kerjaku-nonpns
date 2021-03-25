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
        $data['ak'] = $this->Aktivitas_model->tampil();
        $this->template->load('layouts/template', 'admin/aktivitas', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('aktivitas', 'Aktivitas', 'required');
        $this->form_validation->set_rules('kuantitas', 'Kuantitas', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        if ($this->form_validation->run() == true) {
            $data['id_user'] = $this->input->post('user_id');
            $data['tanggal'] = $this->input->post('tanggal');
            $data['uraian_aktifitas'] = $this->input->post('aktivitas');
            $data['kuantitas'] = $this->input->post('kuantitas');
            $data['waktu'] = $this->input->post('waktu');
            $data['catatan'] = $this->input->post('catatan');
            $this->Aktivitas_model->save($data);
            redirect('Pegawai/Aktivitas');
        }
    }
}
