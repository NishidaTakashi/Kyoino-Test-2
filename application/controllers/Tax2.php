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
		$this->form_validation->set_rules("start","開始日付","required");
		$this->form_validation->set_rules("rate","税率","required");
		if ($this->form_validation->run() === FALSE) {
			redirect("tax2","refresh");
		}else {
			$this->Tax_model->update($_POST);
			redirect("tax2","refresh");
		}
	}
}
