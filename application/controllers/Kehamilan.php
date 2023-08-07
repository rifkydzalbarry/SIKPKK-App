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
    $nik = $_POST['nik'];
    $s = "SELECT nama_lgkp as nama FROM tbl_keluarga WHERE nik='$nik'";
    $data = $this->db->query($s)->row_array();
    echo json_encode($data);
  }

  public function ubah($id)
  {
    $data['judul'] = 'Form Ubah Data | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->getKeluargaByKK($id);
    $data['kehamilan'] = $this->Kehamilan_model->getKehamilanById($id);
    $data['status'] = ['Hamil', 'Melahirkan', 'Nifas'];


    if ($this->input->post('submit')) {
      $this->Kehamilan_model->ubahDataKehamilan($id);
      $this->session->set_flashdata('alert', 'Diubah.');
      redirect('kehamilan');
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kehamilan/form_ubah', $data);
    $this->load->view('templates/footer');
  }

  public function detailKehamilan($id)
  {
    $data['judul'] = 'Cek Kehamilan | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->getKeluargaByKK($id);
    $data['kehamilan'] = $this->Kehamilan_model->getKehamilanById($id);
    $data['hamil'] = $this->Kehamilan_model->kondisi()->result_array();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kehamilan/detail', $data);
    $this->load->view('templates/footer');
  }

  public function hapusKehamilan($id)
  {
    $this->Kehamilan_model->hapusDataKehamilan($id);
    $this->session->set_flashdata('alert', 'Dihapus.');
    redirect('kehamilan');
  }

  public function tambahCekKehamilan()
  {

    $this->Kehamilan_model->tambahDataCekKehamilan();
    $this->session->set_flashdata('alert', 'Ditambah');
    redirect('kehamilan');
  }
}
