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
}
