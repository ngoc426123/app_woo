<?php
class Pos extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->model("model_pos");
		if(isset($_POST["ok"])){
			$value["menu"] = $_POST["menu"];
			$value["method"] = $_POST["method"];
			$value["promotion"] = $_POST["promotion"];
			$this->model_pos->edit($value);
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