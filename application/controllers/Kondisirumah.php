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

  public function tambah()
  {
    $data['judul'] = 'Form Tambah Data | SIKPKK';
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();

    if ($this->input->post('submit')) {
      $this->Kondisirumah_model->tambahDataKondisirumah();
      $this->session->set_flashdata('flash', 'Ditambahkan.');
      redirect('kondisirumah');
    }
    $this->load->view('templates/header', $data);
    $this->load->view('kondisirumah/form_tambah', $data);
    $this->load->view('templates/footer');
  }
}
