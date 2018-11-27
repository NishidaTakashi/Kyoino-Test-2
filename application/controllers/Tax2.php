<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax2 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array("form","url"));
		$this->load->library("form_validation");
		$this->load->model("Tax2_model");
	}
	public function index(){
		$data["taxes"]=$this->Tax2_model->get_tax();
		$this->load->view("tax2",$data);
	}

	public function update(){
		// サーバ側でもってるデータ
		$array = array(
		    array('framework' => 'codeigniter', 'lang' => 'php',),
		);

		// //postで送られてきたデータ
		// $post_data = $this->input->post('start');
		// $post_data = $this->input->post('id');
		// $post_data = $this->input->post('rate');

		// //postデータをもとに$arrayからデータを抽出
		// $data = $array[$post_data];
		//
		// //$dataをJSONにして返す
		// $this->output
		// 		 ->set_content_type('application/json')
		// 		 ->set_output(json_encode($data));


		$this->form_validation->set_rules("start","開始日付","required");
		$this->form_validation->set_rules("rate","税率","required");
		if ($this->form_validation->run() === FALSE) {
			redirect("tax2","refresh");
		}else {
			$this->Tax2_model->update($_POST);
			redirect("tax2","refresh");
		}
	}
}
