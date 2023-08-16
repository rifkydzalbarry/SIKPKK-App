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
    $data['judul'] = 'Kehamilan | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    // $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $data['kehamilan'] = $this->Kehamilan_model->getAllKehamilan();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kehamilan/index', $data);
    $this->load->view('templates/footer');
  }


  public function tambahKehamilan()
  {
    $data['judul'] = 'Form Tambah Data | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $data['status'] = ['Hamil', 'Melahirkan'];

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

  public function ubahKehamilan($id)
  {
    $data['judul'] = 'Form Ubah Data | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->getKeluargaByKK($id);
    $data['kehamilan'] = $this->Kehamilan_model->getKehamilanById($id);
    $data['status'] = ['Hamil', 'Melahirkan'];


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

  public function hapusKehamilan($id)
  {
    $this->Kehamilan_model->hapusDataKehamilan($id);
    $this->session->set_flashdata('alert', 'Dihapus.');
    redirect('kehamilan');
  }

  public function detailKehamilan($id)
  {
    $data['judul'] = 'Cek Kehamilan | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->getKeluargaByKK($id);
    $data['kehamilan'] = $this->Kehamilan_model->getKehamilanById($id);
    $data['hamil'] = $this->Kehamilan_model->kondisi()->result_array();
    $data['bayi'] = $this->Kehamilan_model->getBayi()->result_array();
    $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan']; // data untuk di form lahir
    $data['akta'] = ['Ada', 'Tidak']; // data untuk di form lahir

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kehamilan/detail', $data);
    $this->load->view('templates/footer');
  }

  //Cek Kehamilan
  public function tambahCekKehamilan()
  {
    $this->Kehamilan_model->tambahDataCekKehamilan();
    $this->session->set_flashdata('alert', 'Ditambah');
    redirect('kehamilan');
  }

  public function hapusCekKehamilan($id)
  {
    $this->Kehamilan_model->hapusDataCekKehamilan($id);
    $this->session->set_flashdata('alert', 'Dihapus.');
    redirect('kehamilan');
  }

  //Melahirkan
  public function tambahBayi()
  {
    $this->Kehamilan_model->tambahDataBayi();
    $this->session->set_flashdata('alert', 'Ditambah');
    redirect('kehamilan');
  }
  public function hapusBayi($id)
  {
    $this->Kehamilan_model->hapusDataBayi($id);
    $this->session->set_flashdata('alert', 'Dihapus.');
    redirect('kehamilan');
  }
  public function ubahBayi()
  {
    $this->Kehamilan_model->ubahDataBayi();
    $this->session->set_flashdata('alert', 'Diubah');
    redirect('kehamilan');
  }
}
