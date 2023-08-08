<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  public function register()
  {
    $data = [
      'fullname' => htmlspecialchars($this->input->post('fullname', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'image' => 'default.jpg',
      'address' => 'Bandung',
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'role_id' => 2,
      'is_active' => 0,
      'date_created' => time()
    ];

    $this->db->insert('tbl_user', $data);
  }

  public function jumlahDasawisma()
  {
    $this->db->select('*');
    $this->db->from('tbl_user');
    $this->db->where('role_id', 2);

    return $this->db->get()->num_rows();
  }
}
