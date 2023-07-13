<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga_model extends CI_Model
{
  public function getAllKeluarga()
  {
    return $this->db->get('tbl_keluarga')->result_array();
  }
}
