<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		require APPPATH . 'libraries/phpmailer/src/Exception.php';
		require APPPATH . 'libraries/phpmailer/src/PHPMailer.php';
		require APPPATH . 'libraries/phpmailer/src/SMTP.php';

		$this->load->model('Users_model');
	}

	public function index()
	{
		$role_id = '2';
		$data['tbl_user'] = $this->Users_model->read_role($role_id);
		$data['judul'] = 'USERS | SIKPKK';
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		if ($this->input->post('submit')) {
			$this->Users_model->create();
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User successfully added ! </p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> User Add failed ! </p>');
			}

			redirect('users');
		}
		$this->load->view('users/user_form');
	}

	public function edit($id)
	{
		if ($this->input->post('submit')) {
			$this->Users_model->update($id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> Congratulation your data successfully updated ! </p>');
			} else {
				$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto"> User update failed ! </p>');
			}
			redirect('users');
		}
		$data['user'] = $this->Users_model->read_by($id);
		$this->load->view('users/edit_form', $data);
	}

	public function delete($id)
	{
		$this->Users_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User successfully Deleted ! </p>');
		} else {
			$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:400px; padding:10px; margin: auto">User Delete failed ! </p>');
		}
		redirect('users');
	}
	public function verify($id)
	{
		$data = $this->Users_model->read_by($id);
		// $toMail = $this->input->get('email');

		$this->Users_model->updateverify($id);
		$this->sendmail($data);

		// $this->Users_model->encrypt($id);
		$this->session->set_flashdata('msg', '<p style="background-color:grey; letter-spacing: 3px; color:black; font-weight: bold; opacity:0.8; text-align:center; border-radius:20px; width:600px; padding:10px; margin: auto">You have successfully verified one of the users ! </p>');
		redirect('users');
		// var_dump($data);
	}

	private function sendmail($data)
	{
		$mail = new PHPMailer();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'syahrilanas09@gmail.com'; // user email anda
		$mail->Password = 'fcqoxpcrcxurroxj'; // diisi dengan App Password yang sudah di generate
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->isHTML(true);
		$mail->setFrom('syahrilanas09@gmail.com', 'SIKPKK'); // user email anda
		$mail->addReplyTo('syahrilanas09@gmail.com', ''); //user email anda

		$mail->Subject = 'Verifikasi Akun';
		$mailContent = 'Akun Anda Telah Terverifikasi">Verifikasi</a>';

		// Email subject
		// $mail->Subject = 'test'; //subject email

		// Add a recipient
		$mail->addAddress($data->email); //email tujuan pengiriman email

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			$this->session->set_flashdata('msg', 'Verifikasi Akun Berhasil!');
			// $toMail = $data->toMail;
		}
	}

	public function ubahpass()
	{
		// Validasi inputan (misalnya, pastikan password baru memenuhi persyaratan tertentu)
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

		if ($this->form_validation->run() === FALSE) {
			// Tampilkan kembali halaman change_password.php dengan pesan kesalahan validasi
			$this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
		 gagal mengganti password !
	  </div>');
			redirect('mahasiswa/ubahpassword');
		} else {
			// Ambil data pengguna saat ini dari sesi (Anda dapat mengubah ini sesuai kebutuhan)
			$username = $this->session->userdata('username');

			// Ambil password baru dari inputan form
			$newPassword = $this->input->post('new_password');

			// Memperbarui password pengguna
			$this->User_model->updatePassword($username, $newPassword);
			$this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">
		berhasil mengganti password !
	  </div>');
			redirect('mahasiswa/ubahpassword');
			// Tampilkan pesan berhasil atau arahkan ke halaman lain
			// (Anda dapat mengubah ini sesuai kebutuhan)
		}
	}

	// private function sendmail($id)
	// {
	// 	$data = $this->Users_model->read_by($id);
	// 	// Konfigurasi email
	// 	$config = [
	// 		'mailtype'  => 'html',
	// 		'charset'   => 'utf-8',
	// 		'protocol'  => 'smtp',
	// 		'smtp_host' => 'ssl://smtp.googlemail.com',
	// 		'smtp_user' => 'pwftubes21@gmail.com',  // Email gmail
	// 		'smtp_pass'   => 'PWFTubes2021',  // Password gmail
	// 		'smtp_port'   => 465,
	// 		'newline' => "\r\n"
	// 	];

	// 	$this->email->initialize($config);
	// 	// Load library email dan konfigurasinya
	// 	$this->load->library('email', $config);

	// 	// Email dan nama pengirim
	// 	$this->email->from('pwftubes21@gmail.com', 'Askunla.com');

	// 	// Email penerima
	// 	$this->email->to($data->email); // Ganti dengan email tujuan

	// 	// Lampiran email, isi dengan url/path file
	// 	//$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

	// 	// Subject email
	// 	$this->email->subject('Your Account has been Verified! | Askunla.com');

	// 	// Isi email
	// 	$pass = $data->password;
	// 	$fullname = $data->fullname;
	// 	$this->email->message("Selamat $fullname, Akun anda sudah bisa digunakan. <br><br> Password : $pass  <br><br> Klik <strong><a href='http://localhost/askunla/index.php/auth/login' target='_blank' rel='noopener'>disini</a></strong> untuk login.");

	// 	// Tampilkan pesan sukses atau error
	// 	if ($this->email->send()) {
	// 		echo $this->email->send();
	// 	} else {
	// 		echo $this->email->print_debugger();
	// 		die;
	// 	}
	// }
}
