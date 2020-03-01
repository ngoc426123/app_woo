<?php
class Model_dashbroad extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_revenue(){
		$day_now = (int)date('d');
		$month_now = (int)date('m');
		$year_now = (int)date('yy');
		$week_now = (int)date('W');
		// TODAY
		$today=0;
		$this->db->select("pay");
		$this->db->from("bill");
		$this->db->where(array(
			"day" => $day_now,
			"month" => $month_now,
			"year" => $year_now,
		));
		$query = $this->db->get();
		foreach ($query->result_array() as $value) {
			$today+=(int)$value["pay"];
		}
		// ON WEEK
		$week=0;
		$arr_n_day = array("sunday","monday","tuesday","wednesday","thursday","friday","saturday");
		foreach ($arr_n_day as $value) {
			$day_on_week[] = (int)date('d', strtotime($value));
		}
		$query=array(
			"month" => $month_now,
			"year" => $year_now,
		);
		$this->db->select("pay");
		$this->db->from("bill");
		$this->db->where_in("day",$day_on_week);
		$query = $this->db->get();
		foreach ($query->result_array() as $value) {
			$week+=(int)$value["pay"];
		}
		// ON MONTH
		$month = 0;
		$this->db->select("pay");
		$this->db->from("bill");
		$this->db->where(array(
			"month" => $month_now,
			"year" => $year_now,
		));
		$query = $this->db->get();
		foreach ($query->result_array() as $value) {
			$month+=(int)$value["pay"];
		}
		// YEAR
		$year = 0;
		$this->db->select("pay");
		$this->db->from("bill");
		$this->db->where(array(
			"year" => $year_now,
		));
		$query = $this->db->get();
		foreach ($query->result_array() as $value) {
			$year+=(int)$value["pay"];
		}
		// RETURN
		return array(
			"today" => $today,
			"week" => $week,
			"month" => $month,
			"year" => $year,
		);
	}
}
?>