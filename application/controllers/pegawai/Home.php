<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('id_role') != "2") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['data'] = konfigurasi('Dashboard');
        $this->template->load('layouts/template', 'pegawai/dashboard', $data);
    }
}
