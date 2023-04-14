<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisirumah extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Keluarga_model', '', TRUE);
    $this->load->model('Kondisirumah_model', '', TRUE);
  }

  public function index()
  {
    $data['judul'] = 'Kondisi Rumah | SIKPKK';
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $data['kondisirumah'] = $this->Kondisirumah_model->kondisi()->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kondisirumah/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Form Tambah Data | SIKPKK';
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();

    if ($this->input->post('submit')) {
      $this->Kondisirumah_model->tambahDataKondisirumah();
      $this->session->set_flashdata('alert', 'Ditambahkan.');
      redirect('kondisirumah');
    }
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kondisirumah/form_tambah', $data);
    $this->load->view('templates/footer');
  }

  public function ubah($id)
  {
    $data['judul'] = 'Form Ubah Data | SIKPKK';
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
