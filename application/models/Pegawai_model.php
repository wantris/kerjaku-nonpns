<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
  private $table = "tbl_user";
  public function tampil()
  {
    return $this->db->get($this->table)->result();
  }

  // public function cari($nip)
  // {
  //   $this->db->where('nip', $nip);
  //   $query = $this->db->get('user');
  //   if($query->num_rows() > 0) {
  //     return false;
  //   } else {
  //     return true;
  //   }
  // }

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
