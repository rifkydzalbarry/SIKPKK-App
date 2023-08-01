<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga_model extends CI_Model
{
  public function getAllKeluarga()
  {
    return $this->db->get('tbl_keluarga')->result_array();
  }

  public function tambahDataKeluarga()
  {
    $data = array(
      'no_kk' => $this->input->post('no_kk'),
      'nik' => $this->input->post('nik'),
      'nama_lgkp' => $this->input->post('nama_lgkp'),
      'hbkel' => $this->input->post('hbkel'),
      'jk' => $this->input->post('jk'),
      'tmp_lhr' => $this->input->post('tmp_lhr'),
      'tgl_lhr' => $this->input->post('tgl_lhr'),
      'pendidikan' => $this->input->post('pendidikan'),
      'pekerjaan' => $this->input->post('pekerjaan'),
      'kriteria' => $this->input->post('kriteria'),
      'keb_khs' => $this->input->post('keb_khs')
    );
    $this->db->insert('tbl_keluarga', $data);
  }

  public function getKeluargaByKK($id)
  {
    return $this->db->get_where('tbl_keluarga', ['no_kk' => $id])->result_array();
  }

  public function getKeluargaById($id)
  {
    return $this->db->get_where('tbl_keluarga', ['nik' => $id])->row_array();
  }

  public function hapusDataKeluarga($id)
  {
    $this->db->where('nik', $id);
    $this->db->delete('tbl_keluarga');
  }

  public function ubahDataKeluarga()
  {
    $data = array(
      'nama_lgkp' => $this->input->post('nama_lgkp'),
      'hbkel' => $this->input->post('hbkel'),
      'jk' => $this->input->post('jk'),
      'tmp_lhr' => $this->input->post('tmp_lhr'),
      'tgl_lhr' => $this->input->post('tgl_lhr'),
      'pendidikan' => $this->input->post('pendidikan'),
      'pekerjaan' => $this->input->post('pekerjaan'),
      'kriteria' => $this->input->post('kriteria'),
      'keb_khs' => $this->input->post('keb_khs')
    );
    $this->db->where('nik', $this->input->post('id'));
    $this->db->update('tbl_keluarga', $data);
  }

  public function jumlahKeluarga()
  {
    $this->db->select('*');
    $this->db->from('tbl_keluarga');
    $this->db->where('hbkel', 'Kepala Keluarga');

    return $this->db->get()->num_rows();
  }

  public function jumlahPenduduk()
  {
    $this->db->select('*');
    $this->db->from('tbl_keluarga');

    return $this->db->get()->num_rows();
  }

  public function jumlahHamil()
  {
    $this->db->select('*');
    $this->db->from('tbl_keluarga');
    $this->db->where('kriteria', 'Hamil');

    return $this->db->get()->num_rows();
  }
}
