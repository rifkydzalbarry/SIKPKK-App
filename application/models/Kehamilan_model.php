<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehamilan_model extends CI_Model
{
  public function kondisi()
  {
    $this->db->select('*');
    $this->db->from('tbl_kehamilan');
    $this->db->join('tbl_cek_kehamilan', 'tbl_cek_kehamilan.id_ibu = tbl_kehamilan.id_ibu');
    $query = $this->db->get();
    return $query;
  }

  public function getAllKehamilan()
  {
    return $this->db->get('tbl_kehamilan')->result_array();
  }

  public function tambahDataKehamilan()
  {
    $data = array(
      'nik' => $this->input->post('nik'),
      'nama_lgkp' => $this->input->post('nama_lgkp'),
      'status' => $this->input->post('status')
    );
    $this->db->insert('tbl_kehamilan', $data);
  }


  public function getKondisiByKK($id)
  {
    return $this->db->get_where('tbl_kondisirumah', ['no_kk' => $id])->result_array();
  }

  public function getKehamilanById($id)
  {
    return $this->db->get_where('tbl_kehamilan', ['id_ibu' => $id])->row_array();
  }

  public function getKehamilanByIdcek($id)
  {
    return $this->db->get_where('tbl_cek_kehamilan', ['id_cek' => $id])->row_array();
  }

  public function ubahDataKehamilan($id)
  {
    $data = array(
      'status' => $this->input->post('status')
    );
    $this->db->where('id_ibu', $id);
    $this->db->update('tbl_kehamilan', $data);
  }

  public function hapusDataKehamilan($id)
  {
    $this->db->where('id_ibu', $id);
    $this->db->delete('tbl_kehamilan');
  }

  public function tambahDataCekKehamilan()
  {
    $data = [
      "id_ibu" => $this->input->post('id_ibu', true),
      "tgl_cek" => $this->input->post('tgl_cek', true),
      "bb" => $this->input->post('bb', true),
      "tb" => $this->input->post('tb', true),
      "kondisi" => $this->input->post('kondisi', true)
    ];
    $this->db->insert('tbl_cek_kehamilan', $data);
  }

  public function hapusDataCekKehamilan($id)
  {
    $this->db->where('id_cek', $id);
    $this->db->delete('tbl_cek_kehamilan');
  }

  // Function Melahirkan
  public function getBayi()
  {
    $this->db->select('tbl_bayi.*, tbl_kehamilan.nama_lgkp as nama_ibu');
    $this->db->from('tbl_bayi');
    $this->db->join('tbl_kehamilan', 'tbl_kehamilan.id_ibu = tbl_bayi.id_ibu');
    $query = $this->db->get();
    return $query;
  }

  public function tambahDataBayi()
  {
    $data = [
      "id_ibu" => $this->input->post('id_ibu', true),
      "nama_bayi" => $this->input->post('nama_bayi', true),
      "tgl_lahir" => $this->input->post('tgl_lahir', true),
      "jk" => $this->input->post('jk', true),
      "akta" => $this->input->post('akta', true)
    ];
    $this->db->insert('tbl_bayi', $data);
  }

  public function hapusDataBayi($id)
  {
    $this->db->where('id_bayi', $id);
    $this->db->delete('tbl_bayi');
  }

  public function ubahDataBayi()
  {
    $data = [
      "nama_bayi" => $this->input->post('nama_bayi', true),
      "tgl_lahir" => $this->input->post('tgl_lahir', true),
      "jk" => $this->input->post('jk', true),
      "akta" => $this->input->post('akta', true)
    ];
    $this->db->where('id_bayi', $this->input->post('id'));
    $this->db->update('tbl_bayi', $data);
  }
}
