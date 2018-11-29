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
}


?>
