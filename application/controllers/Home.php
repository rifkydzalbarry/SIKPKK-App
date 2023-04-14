<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
  public function index()
  {
    $data['judul'] = 'Home | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/footer');
  }
}
