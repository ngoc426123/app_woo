<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banhang extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->load->model(array("model_pos","model_menu","model_promotion","model_method"));
		$pos = $this->model_pos->get();
		foreach ($pos as $ps) {
            if($ps["field"] == "menu"){
                $data_menu[] = $this->model_menu->get_by_id($ps["id_rel"]);
            }
            if($ps["field"] == "promotion"){
            	$data_promotion[] = $this->model_promotion->get_by_id($ps["id_rel"]);
            }
            if($ps["field"] == "method"){
            	$data_method[] = $this->model_method->get_by_id($ps["id_rel"]);
            }
        }
		$data["menu"]=$data_menu;
		$data["promotion"]=$data_promotion;
		$data["method"]=$data_method;
		$this->load->view('view_banhang',$data);
	}
	public function getbillct(){
		get_code_bill();
		die();
	}
}
