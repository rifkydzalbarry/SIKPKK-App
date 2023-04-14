<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluarga extends CI_Controller
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
    $data['judul'] = 'Keluarga | SIKPKK';
    $data['keluarga'] = $this->Keluarga_model->getAllKeluarga();
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('keluarga/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambahKeluarga()
  {
    $data['judul'] = 'Form Tambah Data | SIKPKK';
    $data['hbkel'] = ['Kepala Keluarga', 'Istri', 'Anak', 'Family Lain'];
    $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
    $data['pendidikan'] = ['Tidak Tamat SD', 'SD dan Sederajat', 'SMP dan Sederajat', 'SMA dan Sederajat', 'Diploma 1-3', 'S1 dan Sederajat', 'S2 dan Sederajat', 'S3 dan Sederajat'];
    $data['pekerjaan'] = ['Tidak Bekerja', 'Petani', 'Buruh Tani', 'Buruh Bangunan', 'Nelayan', 'Guru/Dosen', 'Pedagang', 'Karyawan Swasta', 'TNI', 'Polisi', 'Lainnya'];
    $data['kriteria'] = ['Balita', 'PUS', 'WUS', 'Buta', 'Hamil', 'Ibu Menyusui', 'Lansia'];

    $this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required');
    $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required');
    $this->form_validation->set_rules('nama_lgkp', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('tmp_lhr', 'Tempat Lahir', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('keluarga/form_tambah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Keluarga_model->tambahDataKeluarga();
      $this->session->set_flashdata('alert', 'Ditambah');
      redirect('keluarga');
    }
  }

  public function ubahKeluarga($id)
  {
    $data['judul'] = 'Form Ubah Data | SIKPKK';
    $data['keluarga'] = $this->Keluarga_model->getKeluargaById($id);
    $data['hbkel'] = ['Kepala Keluarga', 'Istri', 'Anak', 'Family Lain'];
    $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
    $data['pendidikan'] = ['Tidak Tamat SD', 'SD dan Sederajat', 'SMP dan Sederajat', 'SMA dan Sederajat', 'Diploma 1-3', 'S1 dan Sederajat', 'S2 dan Sederajat', 'S3 dan Sederajat'];
    $data['pekerjaan'] = ['Tidak Bekerja', 'Petani', 'Buruh Tani', 'Buruh Bangunan', 'Nelayan', 'Guru/Dosen', 'Pedagang', 'Karyawan Swasta', 'TNI', 'Polisi', 'Lainnya'];
    $data['kriteria'] = ['Balita', 'PUS', 'WUS', 'Buta', 'Hamil', 'Ibu Menyusui', 'Lansia'];

    $this->form_validation->set_rules('nama_lgkp', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('tmp_lhr', 'Tempat Lahir', 'required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('keluarga/form_ubah', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Keluarga_model->ubahDataKeluarga();
      $this->session->set_flashdata('alert', 'Diubah');
      redirect('keluarga');
    }
  }

  public function hapusKeluarga($id)
  {
    $this->Keluarga_model->hapusDataKeluarga($id);
    $this->session->set_flashdata('flash', 'Dihapus.');
    redirect('keluarga');
  }

  public function detailKeluarga($id)
  {
    $data['judul'] = 'Detail Keluarga | SIKPKK';
    $data['keluarga'] = $this->Keluarga_model->getKeluargaByKK($id);
    $data['kondisirumah'] = $this->Kondisirumah_model->getKondisiByKK($id);
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('keluarga/detail', $data);
    $this->load->view('templates/footer');
  }
}
