<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehamilan_model extends CI_Model
{
  public function kondisi()
  {
    $this->db->select('*');
    $this->db->from('tbl_ibu');
    $this->db->join('tbl_cek_kehamilan', 'tbl_cek_kehamilan.id_ibu = tbl_ibu.id_ibu');
    return $this->db->get();
  }

  public function getAllKehamilan()
  {
    return $this->db->get('tbl_ibu')->result_array();
  }

  public function tambahDataKehamilan()
  {
    $data = array(
      'nik' => $this->input->post('nik'),
      'nama_lgkp' => $this->input->post('nama_lgkp'),
      'status' => $this->input->post('status')
    );
    $this->db->insert('tbl_ibu', $data);
  }


  public function getKondisiByKK($id)
  {
    return $this->db->get_where('tbl_kondisirumah', ['no_kk' => $id])->result_array();
  }

  public function getKehamilanById($id)
  {
    return $this->db->get_where('tbl_ibu', ['id_ibu' => $id])->row_array();
  }

  public function ubahDataKehamilan($id)
  {
    $data = array(
      'status' => $this->input->post('status')
    );
    $this->db->where('id_ibu', $id);
    $this->db->update('tbl_ibu', $data);
  }

  public function hapusDataKehamilan($id)
  {
    $this->db->where('id_ibu', $id);
    $this->db->delete('tbl_ibu');
  }

  public function tambahDataCekKehamilan()
  {
    $data = [
      "tgl_cek" => $this->input->post('tgl_cek', true),
      "bb" => $this->input->post('bb', true),
      "tb" => $this->input->post('tb', true),
      "kondisi" => $this->input->post('kondisi', true)
    ];
    $this->db->insert('tbl_cek_kehamilan', $data);
  }
}
