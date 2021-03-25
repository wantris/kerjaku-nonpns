<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skp_model extends CI_Model
{
    private $table = "tbl_target_skp";
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tbl_target_skp');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_target_skp.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function tampil_from_pegawai()
    {
        $this->db->select('tbl_target_skp.id as id_skp, tbl_target_skp.*, tbl_user.*');
        $this->db->from('tbl_target_skp');
        $this->db->join('tbl_user', 'tbl_user.id = tbl_target_skp.id_user');
        $this->db->where('tbl_target_skp.id_user', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query;
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function edit($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->get('user')->row();
    }

    function tampil_edit_pegawai($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->delete('user');
    }
}
