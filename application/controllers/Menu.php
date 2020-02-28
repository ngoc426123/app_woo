<?php
class Menu extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->model(array("model_menu"));
		$data["list_menu"]=$this->model_menu->get_list();
		$data["title_page"]="Danh sách món";
		$data["view_page"]="view_menu_list";
		$this->load->view("admin/index",$data);
	}
	public function add(){
		if(isset($_POST["ok"])){
			$this->load->model(array("model_menu"));
			$value = array(
				"code"      => $_POST["code"],
				"name"      => $_POST["name"],
				"date"      => $_POST["date"],
				"cost"      => $_POST["cost"],
				"type"      => $_POST["type"],
				"promotion" => $_POST["promotion"],
				"image"     => $_POST["image"],
				"status"    => isset($_POST["status"])?1:0,
			);
			$this->model_menu->add($value);
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Thêm món",
				"content" => "Thêm thành công, <strong>{$value['name']}</strong> giá <strong>{$value['cost']}</strong>"	
			);
		}
		$data["current_date"]=get_date_now();
		$data["title_page"]="Thêm món mới";
		$data["view_page"]="view_menu_add";
		$this->load->view("admin/index",$data);
	}
	public function edit($id){
		$this->load->model(array("model_menu"));
		if(isset($_POST["ok"])){
			$value = array(
				"code"      => $_POST["code"],
				"name"      => $_POST["name"],
				"date"      => $_POST["date"],
				"cost"      => $_POST["cost"],
				"type"      => $_POST["type"],
				"promotion" => $_POST["promotion"],
				"image"     => $_POST["image"],
				"status"    => isset($_POST["status"])?1:0,
			);
			$this->model_menu->edit($value,$id);
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Sửa món",
				"content" => "Sửa thành công, <strong>{$value['name']}</strong> giá <strong>{$value['cost']}</strong>"	
			);
		}
		$data["menu"]=$this->model_menu->get_by_id($id);
		$data["title_page"]="Sửa món";
		$data["view_page"]="view_menu_edit";
		$this->load->view("admin/index",$data);
	}
}
?>