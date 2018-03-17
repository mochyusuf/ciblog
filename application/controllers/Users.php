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

  public function login()
  {
    $data['title'] = "Login";

    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');
    if ($this->form_validation->run() === FALSE) {
      # code...
      $this->load->view('templates/header');
      $this->load->view('user/login',$data);
      $this->load->view('templates/footer');
    }
    else {
      # code...
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));

      $user_id = $this->User_model->login($username,$password);
      if ($user_id) {
        # code...
        $user_data = array(
          'user_id' => $user_id,
          'username' => $username,
          'logged_in'=> true
        );
        $this->session->set_flashdata('user_loggedin','You are now logged in');
        redirect('posts');
      }
      else {
        # code...
        $this->session->set_flashdata('login_failed','Login Failed');
        redirect('users/login');
      }
    }
      #code
  }

  public function logout()
  {
      #code
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('username');
      $this->session->set_flashdata('user_loggedout','Logout Success');

      redirect('users/login');

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
