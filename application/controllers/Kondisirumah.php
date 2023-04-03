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
}
