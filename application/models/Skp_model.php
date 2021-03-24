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

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function edit($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->get('user')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('user', $data);
    }

    public function hapus($nip)
    {
        $this->db->where('nip', $nip);
        return $this->db->delete('user');
    }
}
