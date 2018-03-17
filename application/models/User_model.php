<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

  public function register()
  {
      #code
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'password' => $enc_password,
        'zipcode' => $this->input->post('zipcode'),
      );

      return $this->db->insert('users',$data);
  }

  public function check_username_exists($username)
  {
      #code
      $query = $this->db->get_where('users',array(
        'username' => $username
      ));
    if (empty($query->row_array())) {
        # code...
        return true;
      }
      else{
        return false;
      }
  }

  public function check_email_exists($email)
  {
      #code
      $query = $this->db->get_where('users',array(
        'email' => $email
      ));
    if (empty($query->row_array())) {
        # code...
        return true;
      }
      else{
        return false;
      }
  }

}
