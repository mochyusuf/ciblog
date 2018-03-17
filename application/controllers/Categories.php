<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $data['title'] = 'Categories';

    $data['categories'] = $this->category_model->get_categories();

    $this->load->view('templates/header');
    $this->load->view('categories/index',$data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
      if (!$this->session->userdata('logged_in')) {
        # code...
        redirect('users/login');
      }
      #code
      $data['title'] = "Create Category";

      $this->form_validation->set_rules('name','Name','required');

      if ($this->form_validation->run() === FALSE) {
        # code...
        $this->load->view('templates/header');
        $this->load->view('categories/create',$data);
        $this->load->view('templates/footer');
      }else {
        # code...
        $this->category_model->create_category();
        $this->session->set_flashdata('categories_created','Your categories has been created');

        redirect('categories');
      }
  }

  public function posts($id)
  {
    $data['title'] = $this->category_model->get_category($id)->name;
      #code
    $data['posts'] = $this->Post_model->get_posts_by_category($id);

    $this->load->view('templates/header');
    $this->load->view('posts/index',$data);
    $this->load->view('templates/footer');
  }
}
