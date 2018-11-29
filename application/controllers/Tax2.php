<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax2 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array("form","url"));
		$this->load->library("form_validation");
    $this->load->library("session");
		$this->load->model("Tax2_model");
	}

	//ログイン画面へ
	public function index(){
		//一度ログインしているかどうかの判断
		if ($this->session->userdata("is_loggged_in")) {
			//セッションに保存したnameを取得
			$data["user_name"]=$this->session->userdata("user_name");
      $data["taxes"]=$this->Tax2_model->get_tax();
			//メイン画面で名前を表示
			$this->load->view("tax2",$data);
		//一度もログインしていなければ
		}else{
			//ログイン画面へ
			$this->load->view("user_login");
		}
	}

	//ログイン処理
	public function login(){
		//一度ログインしているかどうかの判断
		if ($this->session->userdata("is_loggged_in")) {
			//セッションに保存したnameを取得
			$data["user_name"]=$this->session->userdata("user_name");
			$data["taxes"]=$this->Tax2_model->get_tax();
			//メイン画面で名前を表示
			$this->load->view("tax2",$data);
		//一度もログインしていなければ
		}else{
			//validationルールの設定
			$this->form_validation->set_rules("name","ID","trim|required",array(
				"required" => "%s を入力していません。"
			));
			$this->form_validation->set_rules("password","パスワード","trim|required");

			//validationのチェック
			if ($this->form_validation->run() === false) {
				//NGでログイン画面に戻る
				$this->load->view("user_login");
				//OKなら
			}else{
				//ログインデータを取得
				$data["user_name"]=$this->Tax2_model->login();
				$data["taxes"]=$this->Tax2_model->get_tax();
				//セッションデータの作成
				$session_data=array(
					//ログインデータを取得
					"user_name"=>$this->Tax2_model->login(),
					//ログインフラグ
					"is_loggged_in"=>1
				);
				//セッションデータの追加
				$this->session->set_userdata($session_data);
				//メイン画面へ
				$this->load->view("tax2",$data);
			}
		}
	}

	//新規登録画面へ移動
	public function add(){
		$this->load->view("user_add");
	}

	//登録処理
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
			$data["user_name"]=$this->session->userdata("user_name");
      $data["taxes"]=$this->Tax2_model->get_tax();
			//メイン画面で名前を表示
			$this->load->view("tax2",$data);
		}
	}

	//セッション破棄関数
	public function logout(){
		$this->session->sess_destroy();
		redirect("tax2","refresh");
	}
}
