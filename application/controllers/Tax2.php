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

		$this->form_validation->set_rules("name","ID","trim|required",array(
			"required" => "%s を入力していません。"
		));
		$this->form_validation->set_rules("password","パスワード","trim|required");

		$data["user_name"]=$this->Tax2_model->login();
		$data["users"]=$this->Tax2_model->get_tax();

		if ($this->form_validation->run() === false || $data["user_name"] === false) {
			$this->load->view("user_login",$data);
		}else{
			$this->load->view("tax2",$data);
		}
	}


	public function add(){
		$this->load->view("user_add");
	}

	public function insert(){
		//validation
		$this->form_validation->set_rules("name","ID","trim|required|is_unique[users.name]",array(
			"required" => "%s を入力していません。",
			"is_unique" => "その %s はすでに存在しています。"
		));
		$this->form_validation->set_rules("password","パスワード","trim|required");
		$this->form_validation->set_rules("re-password","再パスワード","trim|required|matches[password]");


		//modelのadd関数を呼び出す
		if ($this->form_validation->run() === false) {
			$this->load->view("user_add");
		}else{
			$this->Tax2_model->insert($_POST);
			redirect("tax2","refresh");
		}
	}


	// 機能確認用。ここから--
	public function delete(){
		$id = $_POST["id"];
		$this->Tax2_model->delete($id);
		redirect('tax2','refresh');
	}
	//--ここまで消す


}
