<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  function create_category()
  {
    $data = array(
      'name' => $this->input->post('name')
    );
    return $this->db->insert('categories',$data);
  }

  public function get_categories()
  {
    $this->db->order_by('name');
    $query = $this->db->get('categories');
    return $query->result_array();
      #code
  }

  public function get_category($id)
  {
    $query = $this->db->get_where('categories',array('id' => $id));

    return $query->row();
      #code
  }
}
