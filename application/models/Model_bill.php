<?php
class Model_bill extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function add($value){
		$this->db->insert("bill",$value);
	}
	public function get_list(){
		$this->db->select("*");
		$this->db->from("bill");
		$this->db->order_by("id","desc");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>