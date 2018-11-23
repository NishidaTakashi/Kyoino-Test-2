<?php

class Tax2_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function insert(){
    $this->name=$_POST["name"];
    $this->password=password_hash($_POST["password"],PASSWORD_BCRYPT);
    $this->db->insert("users",$this);
  }

  public function login(){
    $this->db->where("name",$this->input->post("name"));
    $query=$this->db->get("users");
    $users=$query->row_array();

    if (password_verify($_REQUEST['password'],$users["password"])) {
      return $users;
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
