<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {

  }

public function view($page = 'home')
{
  if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
    show_404();
    # code...
  }
  $data['title'] = ucfirst($page);

  $this->load->view('templates/header');
  $this->load->view('pages/'.$page,$data);
  $this->load->view('templates/footer');

    #code
}

}
