<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
  public function getAllKegiatan()
  {
    return $this->db->get('tbl_master_kegiatan')->result_array();
  }

  public function getKegiatanById($id)
  {
    return $this->db->get_where('tbl_master_kegiatan', ['id_kegiatan' => $id])->row_array();
  }

  public function tambahDataKegiatan()
  {
    $data = [
      "nama_kegiatan" => $this->input->post('nama_kegiatan', true)
    ];
    $this->db->insert('tbl_master_kegiatan', $data);
  }

  public function hapusDataKegiatan()
  {
    $this->db->where('id_kegiatan', $this->input->post('id'));
    $this->db->delete('tbl_master_kegiatan');
  }

  public function ubahDataKegiatan()
  {
    $data = [
      "nama_kegiatan" => $this->input->post('nama_kegiatan', true)
    ];
    $this->db->where('id_kegiatan', $this->input->post('id'));
    $this->db->update('tbl_master_kegiatan', $data);
  }

  // public function tambahDataKegiatanMember()
  // {
  //   $data = [
  //     "id_kegiatan" => $this->input->post('id_kegiatan', true),
  //     "nik" => $this->input->post('nik', true),
  //     "keterangan" => $this->input->post('keterangan', true)
  //   ];
  //   $this->db->insert('tbl_kgt_pkk', $data);
  // }

  public function getMember()
  {
    $this->db->select('tbl_kegiatan.*, tbl_master_kegiatan.nama_kegiatan as nama_kgt, tbl_keluarga.nama_lgkp as nama_mbr');
    $this->db->from('tbl_kegiatan');
    $this->db->join('tbl_master_kegiatan', 'tbl_master_kegiatan.id_kegiatan = tbl_kegiatan.id_kegiatan');
    $this->db->join('tbl_keluarga', 'tbl_keluarga.nik = tbl_kegiatan.nik');
    $query = $this->db->get();
    return $query;
  }


  public function jumlahKegiatan()
  {
    $this->db->select('*');
    $this->db->from('tbl_master_kegiatan');
    return $this->db->get()->num_rows();
  }

  public function tambahDataMemberKgt()
  {
    $data = [
      "id_kegiatan" => $this->input->post('id_kegiatan', true),
      "nik" => $this->input->post('nik', true),
      "tgl_kegiatan" => $this->input->post('tgl_kegiatan', true)
    ];
    $this->db->insert('tbl_kegiatan', $data);
  }
}
