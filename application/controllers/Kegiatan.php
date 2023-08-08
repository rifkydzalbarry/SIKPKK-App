<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kegiatan_model', '', TRUE);
    $this->load->model('Keluarga_model', '', TRUE);
  }
  public function index()
  {
    $data['judul'] = 'Kegiatan | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['kegiatan'] = $this->Kegiatan_model->getAllKegiatan();
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kegiatan/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahKegiatan()
  {
    $this->Kegiatan_model->tambahDataKegiatan();
    $this->session->set_flashdata('alert', 'Ditambah');
    redirect('kegiatan');
  }

  public function hapusKegiatan()
  {
    $this->Kegiatan_model->hapusDataKegiatan();
    $this->session->set_flashdata('alert', 'Dihapus');
    redirect('kegiatan');
  }

  public function ubahKegiatan()
  {
    $this->Kegiatan_model->ubahDataKegiatan();
    $this->session->set_flashdata('alert', 'Diubah');
    redirect('kegiatan');
  }


  // public function pkk()
  // {
  //   $data['judul'] = 'Member Kegiatan PKK | SIKPKK';
  //   $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
  //   $data['member'] = $this->Kegiatan_model->getMember()->result_array();
  //   $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
  //   $data['kegiatan'] = $this->Kegiatan_model->getAllKegiatan();

  //   $this->load->view('templates/header', $data);
  //   $this->load->view('templates/sidebar', $data);
  //   $this->load->view('templates/topbar', $data);
  //   $this->load->view('kegiatan/activityPkk', $data);
  //   $this->load->view('templates/footer');
  // }

  public function tambahMemberKgt()
  {
    $this->Kegiatan_model->tambahDataMemberKgt();
    $this->session->set_flashdata('alert', 'Ditambah');
    redirect('kegiatan');
  }

  public function memberKgt($id)
  {
    $data['judul'] = 'Member Kegiatan PKK | SIKPKK';
    $data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
    $data['member'] = $this->Kegiatan_model->getMember()->result_array();
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $data['kegiatan'] = $this->Kegiatan_model->getKegiatanById($id);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('kegiatan/member_kgt', $data);
    $this->load->view('templates/footer');
  }
}
