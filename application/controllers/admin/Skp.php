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
        $data['skp'] = $this->skp_model->tampil();
        $this->template->load('layouts/template', 'admin/skp_view', $data);
    }

    public function save()
    {
        $this->form_validation->set_rules('uraian', 'uraian', 'required');
        $this->form_validation->set_rules('output', 'output', 'required');
        $this->form_validation->set_rules('mutu', 'mutu', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('biaya', 'biaya', 'required');
        if ($this->form_validation->run() == true) {
            $data['id_user'] = $this->input->post('user_id');
            $data['uraian'] = $this->input->post('uraian');
            $data['output'] = $this->input->post('output');
            $data['mutu'] = $this->input->post('mutu');
            $data['waktu'] = $this->input->post('waktu');
            $data['biaya'] = $this->input->post('biaya');
            $this->skp_model->save($data);
            redirect('admin/skp');
        }
    }
}
