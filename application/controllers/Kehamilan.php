<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehamilan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Keluarga_model', '', TRUE);
    $this->load->model('Kondisirumah_model', '', TRUE);
  }
  public function index()
  {
    $data['judul'] = 'Kehamilan | SIKPKK';
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kehamilan/index', $data);
    $this->load->view('templates/footer');
  }
}
