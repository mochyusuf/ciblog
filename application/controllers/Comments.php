<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {

  }

  public function create($post_id)
  {
      #code
      $slug = $this->input->post['slug'];
      $data['post'] = $this->Post_model->get_posts($slug);

      $this->form_validation->set_rules('name','Name','required');
      $this->form_validation->set_rules('email','Email','required');
      $this->form_validation->set_rules('body','Body','required');

      if ($this->form_validation->run() === FALSE) {
        # code...
        $this->load->view('templates/header');
        $this->load->view('posts/view',$data);
        $this->load->view('templates/footer');
      }
      else{
        $this->Comment_model->create_comment($post_id);
        redirect('posts/'.$slug);
      }
  }
}
