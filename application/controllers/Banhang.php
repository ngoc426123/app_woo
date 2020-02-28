<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banhang extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->view('view_banhang');
	}
	public function getbillct(){
		echo "CT000123";
		die();
	}
}
