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

	//jqueryから渡されてきたデータの処理
	public function update(){
		//validationのルールぎめ
		$this->form_validation->set_rules("start","開始日付","required");
		$this->form_validation->set_rules("rate","税率","required");

		//異常がなければ、update関数を呼び出して元の画面へ
		if ($this->form_validation->run() === FALSE) {
			redirect("tax2","refresh");
		}else {
			$this->Tax2_model->update();
			redirect("tax2","refresh");
		}
	}
}
