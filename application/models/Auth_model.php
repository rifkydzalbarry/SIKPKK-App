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

  public function getuserby($email)
  {
    $this->db->where('email', $email);
    return $this->db->get('tbl_user')->row();
  }

  public function forgotpass($email)
  {
    $newpass = random_string('alnum', '10');
    $this->db->set('password', $newpass);
    $this->db->where('email', $email);
    return $this->db->update('tbl_user');
  }

  public function encrypt($id)
  {
    $data = $this->read_by($id);
    $this->db->where('id', $id);
    $this->db->set('password', password_hash($data->password, PASSWORD_DEFAULT));
    $this->db->update('tbl_user');
  }
  public function read_by($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_user');
        return $query->row();
    }
}
