<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivitas_model extends CI_Model
{
    private $table = "tbl_aktivitas";
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tbl_aktivitas');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_aktivitas.id_user');
        $query = $this->db->get();
        return $query;
    }

    function tampil_edit_pegawai($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function tampil_from_pegawai()
    {
        $this->db->select('tbl_aktivitas.id as id_ak, tbl_aktivitas.*, tbl_user.*');
        $this->db->from('tbl_aktivitas');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_aktivitas.id_user');
        $this->db->where('tbl_aktivitas.id_user', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query;
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // public function cari($nip)
    // {
    //     $this->db->where('nip', $nip);
    //     $query = $this->db->get('user');
    //     if ($query->num_rows() > 0) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    // public function tambah($data)
    // {
    //     return $this->db->insert('user', $data);
    // }

    // public function edit($nip)
    // {
    //     $this->db->where('nip', $nip);
    //     return $this->db->get('user')->row();
    // }

    // public function proses_edit($where, $data)
    // {
    //     $this->db->where($where);
    //     return $this->db->update('user', $data);
    // }

    // public function hapus($nip)
    // {
    //     $this->db->where('nip', $nip);
    //     return $this->db->delete('user');
    // }
}
