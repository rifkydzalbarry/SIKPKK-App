<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisirumah extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Keluarga_model');
    $this->load->model('Kondisirumah_model');
  }

  public function index()
  {
    $data['judul'] = 'Kondisi Rumah | SIKPKK';
    $data['kondisirumah'] = $this->Kondisirumah_model->kondisi()->result_array();
    $this->load->view('templates/header', $data);
    $this->load->view('kondisirumah/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahKondisi()
  {
    $data['judul'] = 'Form Tambah Data | SIKPKK';
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();

    $this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required');
    $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required');
    $this->form_validation->set_rules('nama_lgkp', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('tmp_lhr', 'Tempat Lahir', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('kondisirumah/form_tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Keluarga_model->tambahDataKeluarga();
      $this->session->set_flashdata('alert', 'Ditambah');
      redirect('keluarga');
    }
  }
}
