<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class posts extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }


public function index()
{
  $data['title'] = 'Latest Page';
  $data['posts'] = $this->Post_model->get_posts();

  //print_r($data['posts']);

  $this->load->view('templates/header');
  $this->load->view('posts/index',$data);
  $this->load->view('templates/footer');

    #code
}

public function view($slug = NULL)
{
    #code
    $data['post'] = $this->Post_model->get_posts($slug);
    $post_id = $data['post']['id'];
    $data['comments'] = $this->Comment_model->get_comments($post_id);

    if (empty($data['post'])) {
      # code...
      show_404();
    }

    $data['title'] = $data['post']['title'];
    $this->load->view('templates/header');
    $this->load->view('posts/view',$data);
    $this->load->view('templates/footer');
}

public function create()
{
    #code
    $data['title'] = 'Create Post';
    $data['categories'] = $this->Post_model->get_categories();

    $this->form_validation->set_rules('title','Title', 'required');
    $this->form_validation->set_rules('body','Body', 'required');

    if ($this->form_validation->run() === FALSE) {
      # code...
      $this->load->view('templates/header');
      $this->load->view('posts/create',$data);
      $this->load->view('templates/footer');
    }else {
      # code...
      $config['upload_path'] = './assets/images/posts';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '2048';
      $config['max_width'] = '500';
      $config['max_height'] = '500';

      $this->load->library('upload',$config);
      if (!$this->upload->do_upload()) {
        # code...
        $errors = array('error' => $this->upload->display_errors());
        $post_image = 'noimage.jpg';
      }else {
        # code...
        $data = array('upload_data' => $this->upload->data());
        $post_image = $_FILES['post_image_X']['name'];
      }
      $this->Post_model->create_post($post_image);
      $this->session->set_flashdata('post_created','Your post has been created');
      redirect('posts');
    }
}

public function delete($id)
{
    #code
    $this->Post_model->delete_post($id);
    $this->session->set_flashdata('post_deleted','Your post has been deleted');
    redirect('posts');
}

public function edit($slug)
{    #code
    $data['post'] = $this->Post_model->get_posts($slug);

    $data['categories'] = $this->Post_model->get_categories();
    if (empty($data['post'])) {
      # code...
      show_404();
    }

    $data['title'] = "Edit Post";
    $this->load->view('templates/header');
    $this->load->view('posts/edit',$data);
    $this->load->view('templates/footer');
    #code
}

public function update()
{
    $this->Post_model->update_post($id);
    $this->session->set_flashdata('post_updated','Your post has been created');

    redirect('posts');
}

}
