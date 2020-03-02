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
}