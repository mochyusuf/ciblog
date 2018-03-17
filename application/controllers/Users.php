<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {

  }

  public function register()
  {
    $data['title'] = "Sign Up";

    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
    $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
    $this->form_validation->set_rules('password','Password','required');
    $this->form_validation->set_rules('password2','Confirm Password','matches[password]');
    if ($this->form_validation->run() === FALSE) {
      # code...
      $this->load->view('templates/header');
      $this->load->view('user/register',$data);
      $this->load->view('templates/footer');
    }
    else {
      # code...
      $enc_password = md5($this->input->post('password'));

      $this->User_model->register($enc_password);

      $this->session->set_flashdata('user_registered','You are now registered');
      redirect('posts');
    }
      #code
  }

  public function check_username_exists($username)
  {
      #code
      $this->form_validation->set_message('check_username_exists','Username already taken');
      if ($this->User_model->check_username_exists($username)) {
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
      $this->form_validation->set_message('check_email_exists','email already taken');
      if ($this->User_model->check_email_exists($email)) {
        # code...
        return true;
      }
      else{
        return false;
      }
  }
}
