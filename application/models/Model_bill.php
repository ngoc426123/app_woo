<?php
class Model_bill extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function add($value){
		$this->db->insert("bill",$value);
		$list_menu = json_decode($value["content"])->content;
		foreach ($list_menu as $key => $val) {
			$arr_insert = array(
				'id'      => '',
				'id_menu' => $val->id,
				'num'     => $val->quantity,
				'day'     => $value["day"],
				'month'   => $value["month"],
				'year'    => $value["year"],
			);
			$this->db->select("*");
			$this->db->from("sales");
			$this->db->where("id_menu",$arr_insert["id_menu"]);
			$this->db->where("day",$arr_insert["day"]);
			$this->db->where("month",$arr_insert["month"]);
			$this->db->where("year",$arr_insert["year"]);
			$query=$this->db->get();
			if($query->num_rows()>0){
				$id = $query->row_array()["id"];
				$num = $query->row_array()["num"];
				$num+=$arr_insert["num"];
				$this->db->update("sales",array("num"=>$num),array("id"=>$id));
			}
			else{
				$this->db->insert("sales",$arr_insert);
			}
		}
	}
	public function get_list(){
		$this->db->select("*");
		$this->db->from("bill");
		$this->db->order_by("id","desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function del($id){
		$this->db->delete("bill",array('id' => $id));
	}
	public function get_count_bill(){
		$this->db->select("count(id)");
		$this->db->from("bill");
		$query = $this->db->get();
		return $query->row_array();
	}
}
?>