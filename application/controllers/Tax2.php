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
		//機能確認用。ここから--
		$data["users"]=$this->Tax2_model->get_tax();
		$this->load->view("user_login",$data);
		//--ここまで消す。

		//その時、この下のコメントを元に戻す。
		// $this->load->view("user_login");

	}


	public function tax2(){
		//機能確認用。ここから--
		$data["users"]=$this->Tax2_model->get_tax();
		$this->load->view("tax2",$data);
		//--ここまで消す。

		//その時、この下のコメントを元に戻す。
		// $this->load->view("tax2");
	}

	public function login(){
		$data["user_name"]=$this->Tax2_model->login();
		$data["users"]=$this->Tax2_model->get_tax();

		if ($data["user_name"]===false) {
			redirect("tax2","refresh");
		}else{
			$this->load->view("tax2",$data);
		}
	}


	public function add(){
		$this->load->view("user_add");
	}

	public function insert(){
		//validation

		//passwordとre-passwordの条件分岐


		//modelのadd関数を呼び出す

		$this->Tax2_model->insert($_POST);
		redirect("tax2","refresh");
	}


	// 機能確認用。ここから--
	public function delete(){
		$id = $_POST["id"];
		$this->Tax2_model->delete($id);
		redirect('tax2','refresh');
	}
	//--ここまで消す


}
