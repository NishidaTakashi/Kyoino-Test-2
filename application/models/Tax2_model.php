<?php
/**
 *
 */
class Tax2_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function get_tax(){
    $this->db->order_by("start","ASC");
    $query=$this->db->get("tax2");
    return $query->result_array();
  }

}


?>
