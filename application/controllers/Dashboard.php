<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Keluarga_model', '', TRUE);
    $this->load->model('Auth_model', '', TRUE);
    $this->load->model('Kegiatan_model', '', TRUE);
  }

  public function index()
  {
    $data['judul'] = 'Dashboard | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['keluarga'] = $this->Keluarga_model->jumlahKeluarga();
    $data['penduduk'] = $this->Keluarga_model->jumlahPenduduk();
    $data['kehamilan'] = $this->Keluarga_model->jumlahHamil();
    $data['dasawisma'] = $this->Auth_model->jumlahDasawisma();
    $data['kegiatan'] = $this->Kegiatan_model->jumlahKegiatan();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }
}
