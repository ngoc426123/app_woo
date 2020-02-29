<?php
class Method extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->model(array("model_method"));
		$data["list_method"]=$this->model_method->get_list();
		$data["title_page"]="Danh sách phương thức";
		$data["view_page"]="view_method_list";
		$this->load->view("admin/index",$data);
	}
	public function add(){
		if(isset($_POST["ok"])){
			$this->load->model(array("model_method"));
			$value = array(
				"content" => $_POST["content"],
				"cost"    => $_POST["cost"],
				"date"    => $_POST["date"],
				"note"    => $_POST["note"],
			);
			$this->model_method->add($value);
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Thêm phương thức",
				"content" => "Thêm thành công, <strong>{$value['content']}</strong>, [ +".$value['cost']." ]",	
			);
		}
		$data["current_date"]=get_date_now();
		$data["title_page"]="Thêm phương thức mới";
		$data["view_page"]="view_method_add";
		$this->load->view("admin/index",$data);
	}
	public function edit($id){
		$this->load->model(array("model_method"));
		if(isset($_POST["ok"])){
			$value = array(
				"content" => $_POST["content"],
				"cost"    => $_POST["cost"],
				"date"    => $_POST["date"],
				"note"    => $_POST["note"],
			);
			$this->model_method->edit($value,$id);
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Sửa phương thức",
				"content" => "Sửa thành công, <strong>{$value['content']}</strong>, [ +".$value['cost']." ]",		
			);
		}
		$data["method"]=$this->model_method->get_by_id($id);
		$data["title_page"]="Sửa phương thức";
		$data["view_page"]="view_method_edit";
		$this->load->view("admin/index",$data);
	}
}
?>