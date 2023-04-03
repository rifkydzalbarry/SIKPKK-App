<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasawisma extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dasawisma_model');
  }
  public function index()
  {
    $data['judul'] = 'Dasawisma | SIKPKK';
    $data['dasawisma'] = $this->Dasawisma_model->getAllDasawisma();
    $this->load->view('templates/header', $data);
    $this->load->view('dasawisma/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahDasawisma()
  {
    $this->Dasawisma_model->tambahDataDasawisma();
    $this->session->set_flashdata('alert', 'Ditambah');
    redirect('dasawisma');
  }

  public function hapusDasawisma($id)
  {
    $this->Dasawisma_model->hapusDataDasawisma($id);
    $this->session->set_flashdata('alert', 'Dihapus');
    redirect('dasawisma');
  }

  public function ubahDasawisma()
  {
    $this->Dasawisma_model->ubahDataDasawisma();
    $this->session->set_flashdata('alert', 'Diubah');
    redirect('dasawisma');
  }
}
