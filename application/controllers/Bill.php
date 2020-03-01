<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bill extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->model("model_bill");
		$data["list_bill"]=$this->model_bill->get_list();
		$data["title_page"]="Danh sách hóa đơn";
		$data["view_page"]="view_bill_list";
		$this->load->view('admin/index',$data);
	}
	public function getbillct(){
		get_code_bill();
		die();
	}
	public function addbill(){
		$dataBill = json_decode($_POST["content"]);
		$value = array(
			'id'      => '',
			'code'    => $dataBill->ct,
			'content' => $_POST["content"],
			'total'   => $dataBill->billtotal,
			'pay'     => $dataBill->pay,
			'time'    => substr($dataBill->date,0,8),
			'day'     => (int)substr($dataBill->date,9,2),
			'month'   => (int)substr($dataBill->date,12,2),
			'year'    => (int)substr($dataBill->date,15,4),
		);
		$this->load->model("model_bill");
		$this->model_bill->add($value);
		die();
	}
	public function del(){
		$this->load->model("model_bill");
		$this->model_bill->del($_POST["id"]);
		echo "done";
		die();
	}
}
