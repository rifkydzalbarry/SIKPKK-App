<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    $data['judul'] = 'Login Page | SIKPKK';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/login');
    $this->load->view('templates/auth_footer');
  }

  public function registration()
  {
    $data['judul'] = 'Registration Page | SIKPKK';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/registration');
    $this->load->view('templates/auth_footer');
  }

  public function forgotPassword()
  {
    $data['judul'] = 'Forgot Password Page | SIKPKK';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/forgot_password');
    $this->load->view('templates/auth_footer');
  }
}
