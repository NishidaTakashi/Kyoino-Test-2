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
    // $this->db->order_by("start","ASC");
    $query=$this->db->get("tax2");
    return $query->result_array();
  }

  public function update(){

    // $id=$_POST["id"];
    // $data->start=$_POST["start"];
    // $data->rate=$_POST["rate"];

    $id= $this->input->post('id');
    if ($this->input->post('start')) {
      $data->start= $this->input->post('start');
    }else if ($this->input->post('rate')) {
      $data->rate= $this->input->post('rate');
    }

    $this->db->where("id",$id);
    $this->db->update("tax2",$data);
  }
}


?>
