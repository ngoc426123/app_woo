<?php
class Model_promotion extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function add($value){
		$data=array(
			'id'        => '',
			'code'      => $value["code"],
			'content'   => $value["content"],
			'date'      => $value["date"],
			'type'      => $value["type"],
			'promotion' => $value["promotion"],
		);
		$this->db->insert("promotion_bill",$data);
	}
	public function edit($value,$id){
		$data=array(
			'code'      => $value["code"],
			'content'   => $value["content"],
			'date'      => $value["date"],
			'type'      => $value["type"],
			'promotion' => $value["promotion"],
		);
		$this->db->update("promotion_bill",$data,array('id' => $id));
	}
	public function get_by_id($id){
		$this->db->select("*");
		$this->db->from("promotion_bill");
		$this->db->where("id",$id);
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_list(){
		$this->db->select("*");
		$this->db->from("promotion_bill");
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>