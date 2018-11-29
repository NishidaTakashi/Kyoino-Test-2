<?php

class Tax2_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }


  public function get_tax(){
    $query=$this->db->get("tax2");
    return $query->result_array();
  }

  //コントローラーのupdateから呼び出される関数
  public function update(){
    //jqueryからpost送信されてきたデータを取得
    $id= $this->input->post('id');
    $data->start= $this->input->post('start');
    $data->rate= $this->input->post('rate');

    //update処理
    $this->db->where("id",$id);
    $this->db->update("tax2",$data);
  }

  //新規登録画面の登録処理
  public function insert(){
    $this->name=$_POST["name"];
    //パスワードをハッシュ化
    $this->password=password_hash($_POST["password"],PASSWORD_BCRYPT);
    $this->db->insert("users",$this);
  }

  //ログイン画面のログイン処理
  public function login(){
    $this->db->where("name",$this->input->post("name"));
    $query=$this->db->get("users");
    $users=$query->row_array();

    //ハッシュ化したパスワードのすり合わせ
    if (password_verify($_REQUEST['password'],$users["password"])) {
      //合ってるならデータを返す
      return $users;
    }else{
      //間違っているならfalseを返す
      return false;
    }

  }
}


?>
