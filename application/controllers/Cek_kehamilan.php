<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_kehamilan extends CI_Controller
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
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $data['kondisirumah'] = $this->Kondisirumah_model->kondisi()->result();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kondisirumah/index', $data);
    $this->load->view('templates/footer');
  }
}