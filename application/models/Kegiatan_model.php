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

  public function tambahDataKegiatanMember()
  {
    $data = [
      "id_kegiatan" => $this->input->post('id_kegiatan', true),
      "nik" => $this->input->post('nik', true),
      "keterangan" => $this->input->post('keterangan', true)
    ];
    $this->db->insert('tbl_kgt_pkk', $data);
  }

  public function getMember()
  {
    $this->db->select('*');
    $this->db->from('tbl_keluarga');
    $this->db->join('tbl_kgt_pkk', 'tbl_kgt_pkk.nik = tbl_keluarga.nik');
    return $this->db->get();
  }

  public function jumlahKegiatan()
  {
    $this->db->select('*');
    $this->db->from('tbl_kegiatan');
    return $this->db->get()->num_rows();
  }
}
