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
}
?>