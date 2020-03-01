<?php
class Model_method extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function add($value){
		$data=array(
			'id'      => '',
			'content' => $value["content"],
			'cost'    => $value["cost"],
			'date'    => $value["date"],
			'note'    => $value["note"],
		);
		$this->db->insert("method",$data);
	}
	public function edit($value,$id){
		$data=array(
			'content' => $value["content"],
			'cost'    => $value["cost"],
			'date'    => $value["date"],
			'note'    => $value["note"],
		);
		$this->db->update("method",$data,array('id' => $id));
	}
	public function get_by_id($id){
		$this->db->select("*");
		$this->db->from("method");
		$this->db->where("id",$id);
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_list($limit=0){
		$this->db->select("*");
		$this->db->from("method");
		if($limit!=0){
			$this->db->limit($limit);
		}
		$this->db->order_by("id","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>