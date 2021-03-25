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
}
