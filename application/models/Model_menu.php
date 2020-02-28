<?php
class Model_menu extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function add($value){
		$data=array(
			'id'    => '',
			'code'  => $value["code"],
			'image' => $value["image"],
			'name'  => $value["name"],
			'cost'  => $value["cost"],
			'date'  => $value["date"],
		);
		$this->db->insert("menu",$data);
		$idmenu=$this->db->insert_id();
		$data=array(
			'id'        => '',
			'id_menu'   => $idmenu,
			'promotion' => $value["promotion"],
			'type'      => $value["type"],
			'status'    => $value["status"],
		);
		$this->db->insert("promotion_menu",$data);
	}
	public function edit($value,$id){
		$data=array(
			'image' => $value["image"],
			'name'  => $value["name"],
			'cost'  => $value["cost"],
			'date'  => $value["date"],
		);
		$this->db->update("menu",$data,array('id' => $id));
		$idmenu=$this->db->insert_id();
		$data=array(
			'promotion' => $value["promotion"],
			'type'      => $value["type"],
			'status'    => $value["status"],
		);
		$this->db->update("promotion_menu",$data,array('id_menu' => $id));
	}
	public function get_by_id($id){
		$this->db->select("*");
		$this->db->from("menu");
		$this->db->join("promotion_menu","promotion_menu.id_menu = menu.id");
		$this->db->where("menu.id",$id);
		$this->db->order_by("menu.id","DESC");
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_list(){
		$this->db->select("*");
		$this->db->from("menu");
		$this->db->join("promotion_menu","promotion_menu.id_menu = menu.id");
		$this->db->order_by("menu.id","DESC");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>