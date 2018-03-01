<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_posts($slug = FALSE)
  {
      #code
      if ($slug === false) {
        # code...
        $this->db->order_by(' posts.id','DESC');
        $this->db->join('categories','categories.id = posts.categories_id');
        $query = $this->db->get('posts');
        return $query->result_array();
      }

      $query = $this->db->get_where('posts',array('slug' => $slug));
      return $query->row_array();
  }

  public function create_post($post_image)
  {
    $slug =url_title($this->input->post('title'));
    $data = array(
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'body' => $this->input->post('body'),
      'categories_id' => $this->input->post('category_id'),
      'post_image' => $post_image
    );

    return $this->db->insert('posts',$data);
      #code
  }

  public function delete_post($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('posts');
      #code
    return true;
  }

  public function update_post()
  {
    $slug =url_title($this->input->post('title'));

    $data = array(
      'title' => $this->input->post('title'),
      'slug' => $slug,
      'body' => $this->input->post('body'),
      'categories_id' => $this->input->post('category_id')
    );
    $this->db->where('id',$this->input->post('id'));
    return $this->db->update('posts',$data);
  }

  public function get_categories()
  {
    $this->db->order_by('name');
    $query = $this->db->get('categories');
    return $query->result_array();
      #code
  }
}
