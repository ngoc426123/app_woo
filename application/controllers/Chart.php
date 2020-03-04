<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chart extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$data["title_page"]="Biểu đồ doanh thu";
		$data["view_page"]="view_chart";
		$this->load->view('admin/index',$data);
	}
	public function revenue(){
		$data["title_page"]="Biểu đồ doanh thu";
		$data["view_page"]="view_chart_revenue";
		$this->load->view('admin/index',$data);
	}
	public function sales(){
		$this->load->model("model_menu");
		$data["list_menu"] = $this->model_menu->get_list();
		$data["title_page"]="Biểu đồ bán hàng";
		$data["view_page"]="view_chart_sales";
		$this->load->view('admin/index',$data);
	}
}