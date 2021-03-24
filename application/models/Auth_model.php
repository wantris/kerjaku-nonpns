<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public $table       = 'tbl_user';
    public $id          = 'tbl_user.id';

    public function __construct()
    {
        parent::__construct();
    }

    public function update($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }

    public function get_by_id()
    {
        $id = $this->session->userdata('id');
        $this->db->select(
            'tbl_user.*, tbl_role.id AS id_role, tbl_role.name, tbl_role.description,',
            'tbl_user.*, tbl_bidang.id AS id_bidang, tbl_bidang.bidang, tbl_bidang.deskripsi,'
        );
        $this->db->join(
            'tbl_role',
            'tbl_user.id_role = tbl_role.id',
            'tbl_bidang',
            'tbl_user.id_bidang = tbl_bidang.id'
        );
        $this->db->from($this->table);
        $this->db->where($this->id, $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function login($nik, $password)
    {
        $query = $this->db->get_where($this->table, array('nik' => $nik, 'password' => $password));
        return $query->row_array();
    }

    public function check_account($nik)
    {
        //cari nik lalu lakukan validasi
        $this->db->where('nik', $nik);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 2 maka user tidak aktif
        if ($query->activated == 0) {
            return 2;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 3;
        }

        return $query;
    }

    public function logout($date, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $date);
    }
}
