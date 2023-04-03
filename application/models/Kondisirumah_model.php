<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisirumah_model extends CI_Model
{
  public function kondisi()
  {
    $this->db->select('*');
    $this->db->from('tbl_keluarga');
    $this->db->join('tbl_kondisirumah', 'tbl_kondisirumah.nik = tbl_keluarga.nik');
    return $this->db->get();
  }
}
