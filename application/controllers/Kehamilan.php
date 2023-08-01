<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehamilan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Keluarga_model', '', TRUE);
    $this->load->model('Kehamilan_model', '', TRUE);
  }

  public function index()
  {
    $data['judul'] = 'Kondisi Rumah | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    // $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $data['kehamilan'] = $this->Kehamilan_model->getAllKehamilan();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kehamilan/index', $data);
    $this->load->view('templates/footer');
  }


  public function tambah()
  {
    $data['judul'] = 'Form Tambah Data | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $data['status'] = ['Hamil', 'Melahirkan', 'Nifas'];

    if ($this->input->post('submit')) {
      $this->Kehamilan_model->tambahDataKehamilan();
      $this->session->set_flashdata('alert', 'Ditambahkan.');
      redirect('kehamilan');
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kehamilan/form_tambah', $data);
    $this->load->view('templates/footer');
  }

  function menampilkan_istri()
  {
    $id = $_POST['nik'];
    $s = "SELECT * FROM 'tbl_keluarga' WHERE id='$id'";
    $data = $this->db->query($s)->row_array();
    echo json_encode($data);
  }

  public function ubah($id)
  {
    $data['judul'] = 'Form Ubah Data | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->getKeluargaByKK($id);
    $data['kondisirumah'] = $this->Kondisirumah_model->getKondisiByKK($id);

    if ($this->input->post('submit')) {
      $this->Kondisirumah_model->ubahDataKondisirumah($id);
      $this->session->set_flashdata('alert', 'Diubah.');
      redirect('kondisirumah');
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kondisirumah/form_ubah', $data);
    $this->load->view('templates/footer');
  }

  public function detailKondisi($id)
  {
    $data['judul'] = 'Detail Kondisi Rumah | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->getKeluargaByKK($id);
    $data['kondisirumah'] = $this->Kondisirumah_model->getKondisiByKK($id);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kondisirumah/detail', $data);
    $this->load->view('templates/footer');
  }

  public function hapusKondisi($id)
  {
    $this->Kondisirumah_model->hapusDataKondisi($id);
    $this->session->set_flashdata('alert', 'Dihapus.');
    redirect('kondisirumah');
  }
}
