<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kegiatan_model');
  }
  public function index()
  {
    $data['judul'] = 'Kegiatan | SIKPKK';
    $data['kegiatan'] = $this->Kegiatan_model->getAllKegiatan();
    $this->load->view('templates/header', $data);
    $this->load->view('kegiatan/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahKegiatan()
  {
    $this->Kegiatan_model->tambahDataKegiatan();
    $this->session->set_flashdata('alert', 'Ditambah');
    redirect('kegiatan');
  }

  public function hapusKegiatan($id)
  {
    $this->Kegiatan_model->hapusDataKegiatan($id);
    $this->session->set_flashdata('alert', 'Dihapus');
    redirect('kegiatan');
  }

  public function ubahKegiatan()
  {
    $this->Kegiatan_model->ubahDataKegiatan();
    $this->session->set_flashdata('alert', 'Diubah');
    redirect('kegiatan');
  }
}
