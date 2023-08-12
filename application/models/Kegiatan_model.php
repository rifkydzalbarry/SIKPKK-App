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

  public function hapusDataKegiatan($id)
  {
    $this->db->where('id_kgt', $id);
    $this->db->delete('tbl_member_kegiatan');
  }

  public function ubahDataKegiatan()
  {
    $data = [
      "nama_kegiatan" => $this->input->post('nama_kegiatan', true)
    ];
    $this->db->where('id_kegiatan', $this->input->post('id'));
    $this->db->update('tbl_kegiatan', $data);
  }

  public function getMember()
  {
    $this->db->select('tbl_member_kegiatan.*, tbl_kegiatan.nama_kegiatan as nama_kgt, tbl_keluarga.nama_lgkp as nama_mbr');
    $this->db->from('tbl_member_kegiatan');
    $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_kegiatan = tbl_member_kegiatan.id_kegiatan');
    $this->db->join('tbl_keluarga', 'tbl_keluarga.nik = tbl_member_kegiatan.nik');
    $query = $this->db->get();
    return $query;
  }


  public function jumlahKegiatan()
  {
    $this->db->select('*');
    $this->db->from('tbl_kegiatan');
    return $this->db->get()->num_rows();
  }

  public function tambahDataMemberKgt()
  {
    $data = [
      "id_kegiatan" => $this->input->post('id_kegiatan', true),
      "nik" => $this->input->post('nik', true),
      "tgl_kegiatan" => $this->input->post('tgl_kegiatan', true)
    ];
    $this->db->insert('tbl_member_kegiatan', $data);
  }

  public function hapusDataMemberKgt($id)
  {
    $this->db->where('id_kgt', $id);
    $this->db->delete('tbl_member_kegiatan');
  }
}
