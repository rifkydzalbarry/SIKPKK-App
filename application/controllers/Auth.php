<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Auth_model', '', TRUE);
    $this->load->model('Users_model', '', TRUE);
  }
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('users/profile');
    }
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Login Page | SIKPKK';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      //validasi success
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

    //jika usernya ada
    if ($user) {
      // jika usernya aktif
      if ($user['is_active'] == 1) {
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          redirect('dashboard');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered</div>');
      redirect('auth');
    }
  }

  public function registration()
  {
    if ($this->session->userdata('email')) {
      redirect('users/profile');
    }

    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'Password dont matches!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['judul'] = 'Registration Page | SIKPKK';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $this->Auth_model->register();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('auth');
  }

  // public function forgotPassword()
  // {
  //   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
  //   if ($this->form_validation->run() == false) {
  //     $data['judul'] = 'Forgot Password Page | SIKPKK';
  //     $this->load->view('templates/auth_header', $data);
  //     $this->load->view('auth/forgot_password');
  //     $this->load->view('templates/auth_footer');
  //   } else {
  //     $email = $this->input->post('email');
  //     $user = $this->db->get_where('tbl_user', ['email' => $email, 'is_active' => 1])->row_array();

  //     if ($user) {
  //     } else {
  //       $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated! </div>');
  //       redirect('auth/forgotpassword');
  //     }
  //   }
  // }

  public function respass()
  {
    if ($this->input->post('submit')) {

      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

      if ($this->form_validation->run() == TRUE) {
        $email = $this->input->post('email');
        $user = $this->db->get_where('tbl_user', ['email' => $email, 'is_active' => 1])->row_array();
        // $usercheck = $this->Auth_model->getuserby($this->input->post('email'));
        // $emailcheck = $this->Auth_model->getuserby($this->input->post('email'));
        if ($user == NULL) {
          $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Please input Username Correctly!</p>');
          // echo 'wrong';
        } else if ($user != NULL) {
          if ($this->input->post('email') == $user->email) {
            $this->Auth_model->forgotpass($this->input->post('email'));
            $this->Users_model->sendmail($user->id);
            $this->Auth_model->encrypt($user->id);
            $this->session->set_flashdata('msg', '<br><p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Reset password successfully, Check your email</p>');

            redirect('auth/login');
          } else {
            $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Email is not Registered!</p>');
          }
          // echo 'invalid username or email';
        }
      } else {
        $this->session->set_flashdata('msg', '<br><p style="background-color:black; letter-spacing: 3px; color:red; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:auto; padding:10px; margin: auto">Please enter the data correctly! </p>');
        // echo 'Input username dan email yang benar';
      }

      // $this->Auth_model->val_res();
      // echo 'test';
      // $usercheck = $this->Auth_model->getuser($this->input->post('username'));
      // if ($this->val_res()) {
      //     // $this->Auth_model->forgotpass($this->input->post('username'));
      //     // $this->sendmail($usercheck->userid);
      //     // $this->Auth_model->encrypt($usercheck->userid);
      //     // $this->session->set_flashdata('msg', '<p style="color:green">Reset password successfully, Check your email</p>');
      //     echo "test";

      //     redirect('auth/login');
      // }
    }

    $data['judul'] = 'Forgot Password Page | SIKPKK';
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/forgot_password');
    $this->load->view('templates/auth_footer');
  }
}
