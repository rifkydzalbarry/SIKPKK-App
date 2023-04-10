<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisirumah_model extends CI_Model
{
  public function kondisi()
  {
    $this->db->select('*');
    $this->db->from('tbl_keluarga');
    $this->db->join('tbl_kondisirumah', 'tbl_kondisirumah.no_kk = tbl_keluarga.no_kk');
    return $this->db->get();
  }

  public function tambahDataKondisirumah()
  {
    $data = array(
      'no_kk' => $this->input->post('no_kk'),
      'mkn_pokok' => $this->input->post('mkn_pokok'),
      'jamban' => $this->input->post('jamban'),
      'sbr_air' => $this->input->post('sbr_air'),
      'tps' => $this->input->post('tps'),
      'spal' => $this->input->post('spal'),
      'stiker_p4k' => $this->input->post('stiker_p4k'),
      'krt_rmh' => $this->input->post('krt_rmh'),
      'akf_up2k' => $this->input->post('akf_up2k'),
      'akf_kukpl' => $this->input->post('akf_kukpl')
    );
    $this->db->insert('tbl_kondisirumah', $data);
  }


  public function getKondisiByKK($id)
  {
    return $this->db->get_where('tbl_kondisirumah', ['no_kk' => $id])->result_array();
  }

  public function getKondisiById($id)
  {
    return $this->db->get_where('tbl_kondisirumah', ['id_konrmh' => $id])->row_array();
  }

  public function ubahDataKondisirumah($id)
  {
    $data = array(
      'mkn_pokok' => $this->input->post('mkn_pokok'),
      'jamban' => $this->input->post('jamban'),
      'sbr_air' => $this->input->post('sbr_air'),
      'tps' => $this->input->post('tps'),
      'spal' => $this->input->post('spal'),
      'stiker_p4k' => $this->input->post('stiker_p4k'),
      'krt_rmh' => $this->input->post('krt_rmh'),
      'akf_up2k' => $this->input->post('akf_up2k'),
      'akf_kukpl' => $this->input->post('akf_kukpl')
    );
    $this->db->where('no_kk', $id);
    $this->db->update('tbl_kondisirumah', $data);
  }

  public function hapusDataKondisi($id)
  {
    $this->db->where('no_kk', $id);
    $this->db->delete('tbl_kondisirumah');
  }
}
