<?php
class Pos extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->model("model_pos");
		if(isset($_POST["ok"])){
			$value["menu"] = isset($_POST["menu"])?$_POST["menu"]:array();
			$value["method"] = isset($_POST["method"])?$_POST["method"]:array();
			$value["promotion"] = isset($_POST["promotion"])?$_POST["promotion"]:array();
			$this->model_pos->edit($value);
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Hiệu chỉnh POS",
				"content" => "Thành công, vui lòng kiểm tra trong phần POS (phần bán hàng).",	
			);
		}
		$this->load->model(array("model_pos","model_menu","model_promotion","model_method"));
		$data["pos"]=$this->model_pos->get();
		$data["list_menu"]=$this->model_menu->get_list();
		$data["list_promotion"]=$this->model_promotion->get_list();
		$data["list_method"]=$this->model_method->get_list();
		$data["title_page"]="Quản lý POS";
		$data["view_page"]="view_pos";
		$this->load->view("admin/index",$data);
	}
}
?>