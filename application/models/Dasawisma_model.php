<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasawisma_model extends CI_Model
{
  public function getAllDasawisma()
  {
    return $this->db->get('tbl_dasawisma')->result_array();
  }

  public function tambahDataDasawisma()
  {
    $data = [
      "nama_dw" => $this->input->post('nama_dw', true),
      "alamat" => $this->input->post('alamat', true)
    ];
    $this->db->insert('tbl_dasawisma', $data);
  }

  public function hapusDataDasawisma($id)
  {
    $this->db->where('id_dw', $id);
    $this->db->delete('tbl_dasawisma');
  }

  public function ubahDataDasawisma()
  {
    $data = [
      "nama_dw" => $this->input->post('nama_dw', true),
      "alamat" => $this->input->post('alamat', true)
    ];
    $this->db->where('id_dw', $this->input->post('id'));
    $this->db->update('tbl_dasawisma', $data);
  }
}
