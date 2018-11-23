<?php

class Tax2_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insert(){
    $this->name=$_POST["name"];
    $this->password=$_POST["password"];
    $this->db->insert("users",$this);
  }

  public function login(){
    $this->db->where("name",$this->input->post("name"));
    $this->db->where("password",$this->input->post("password"));
    $query=$this->db->get("users");

    if($query->num_rows()===1){
      return $query->row_array();
    }else{
      return false;
    }
  }



  //機能確認用。ここから--

  public function get_tax(){
    $query=$this->db->get("users");
    return $query->result_array();
  }

  public function delete($id){
    $this->db->where("id",$id);
    $this->db->delete("users");
  }
  //--ここまで消す

}


?>
