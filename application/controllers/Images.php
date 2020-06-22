<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Images extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$images = scandir("upload/");
		array_splice($images,0,2);
		$data["images"] = $images;
		$data["title_page"]="Quản lý hình ảnh";
		$data["view_page"]="view_images";
		$this->load->view('admin/index',$data);
	}
}
