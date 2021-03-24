<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Pegawai_model');
    }

    public function index()
    {
        $data['data'] = konfigurasi('Pegawai', 'Tambah Pegawa');
        $data['pegawai'] = $this->Pegawai_model->tampil();
        $this->template->load('layouts/template', 'admin/pegawai', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $pw = password_hash($this->input->post('pass'), PASSWORD_BCRYPT);
        if ($this->form_validation->run() == true) {
            $data['id_role'] = $this->input->post('role');
            $data['id_bidang'] = $this->input->post('bidang');
            $data['nik'] = $this->input->post('nik');
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['activated'] = '1';

            $this->Pegawai_model->save($data);

            redirect('admin/pegawai/index');
        }
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'assets/uploads/images/foto_profil/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000);
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('auth/profile');
        }
        return $this->upload->data('file_name');
    }
}
