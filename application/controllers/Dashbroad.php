<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashbroad extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->model(array("model_dashbroad","model_menu","model_promotion","model_method"));
		$data["revenue"]=$this->model_dashbroad->get_revenue();
		$data["list_menu"]=$this->model_menu->get_list(6);
		$data["list_promotion"]=$this->model_promotion->get_list(3);
		$data["list_method"]=$this->model_method->get_list(3);
		$data["title_page"]="Thống kê";
		$data["view_page"]="view_dashbroad";
		$this->load->view('admin/index',$data);
	}
}
