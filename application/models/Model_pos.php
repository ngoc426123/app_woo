<?php
class Model_pos extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function edit($value){
		$this->db->query("DELETE FROM pos WHERE 1");
		foreach ($value as $key => $val) {
			foreach ($val as $vl) {
				$data = array(
					"id"     => '',
					"field"  => $key,
					"id_rel" => $vl,
				);
				$this->db->insert("pos",$data);
			}
		}
	}
	public function get(){
		$this->db->select("*");
		$this->db->from("pos");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>