<?php
class Promotion extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->model(array("model_promotion"));
		$data["list_promotion"]=$this->model_promotion->get_list();
		$data["title_page"]="Danh sách giảm giá";
		$data["view_page"]="view_promotion_list";
		$this->load->view("admin/index",$data);
	}
	public function add(){
		if(isset($_POST["ok"])){
			$this->load->model(array("model_promotion"));
			$value = array(
				"code"      => $_POST["code"],
				"content"   => $_POST["content"],
				"date"      => $_POST["date"],
				"type"      => $_POST["type"],
				"promotion" => $_POST["promotion"],
			);
			$this->model_promotion->add($value);
			$t = ($value['type']=="per")?"<strong>- {$value['promotion']}%</strong>":"<strong>- {$value['promotion']}vnđ</strong>";
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Thêm giảm giá",
				"content" => "Thêm thành công, <strong>{$value['content']}</strong>, [ ".$t." ]",	
			);
		}
		$data["current_date"]=get_date_now();
		$data["title_page"]="Thêm giảm giá mới";
		$data["view_page"]="view_promotion_add";
		$this->load->view("admin/index",$data);
	}
	public function edit($id){
		$this->load->model(array("model_promotion"));
		if(isset($_POST["ok"])){
			$value = array(
				"code"      => $_POST["code"],
				"content"   => $_POST["content"],
				"date"      => $_POST["date"],
				"type"      => $_POST["type"],
				"promotion" => $_POST["promotion"],
			);
			$this->model_promotion->edit($value,$id);
			$t = ($value['type']=="per")?"<strong>- {$value['promotion']}%</strong>":"<strong>- {$value['promotion']}vnđ</strong>";
			$data["alert"]=array(
				"stt"     => "success",
				"title"   => "Sửa giảm giá",
				"content" => "Sửa thành công, <strong>{$value['content']}</strong>, [ ".$t." ]",	
			);
		}
		$data["promotion"]=$this->model_promotion->get_by_id($id);
		$data["title_page"]="Sửa giảm giá";
		$data["view_page"]="view_promotion_edit";
		$this->load->view("admin/index",$data);
	}
}
?>