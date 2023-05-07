<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
  public function getAllKegiatan()
  {
    return $this->db->get('tbl_kegiatan')->result_array();
  }

  public function getKegiatanById($id)
  {
    return $this->db->get_where('tbl_kegiatan', ['id_kegiatan' => $id])->row_array();
  }

  public function tambahDataKegiatan()
  {
    $data = [
      "nama_kegiatan" => $this->input->post('nama_kegiatan', true)
    ];
    $this->db->insert('tbl_kegiatan', $data);
  }

  public function hapusDataKegiatan()
  {
    $this->db->where('id_kegiatan', $this->input->post('id'));
    $this->db->delete('tbl_kegiatan');
  }

  public function ubahDataKegiatan()
  {
    $data = [
      "nama_kegiatan" => $this->input->post('nama_kegiatan', true)
    ];
    $this->db->where('id_kegiatan', $this->input->post('id'));
    $this->db->update('tbl_kegiatan', $data);
  }
}
