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
	public function get_revenue_detail($option){
		$day_now = (int)date('d');
		$month_now = (int)date('m');
		$year_now = (int)date('yy');
		$week_now = (int)date('W');
		switch ($option) {
			// TODAY
			case 'today':
				$this->db->select("time,day,month,pay");
				$this->db->from("bill");
				$this->db->where(array(
					"day" => $day_now,
					"month" => $month_now,
					"year" => $year_now,
				));
				$this->db->order_by("id","ASC");
				$query = $this->db->get();
				return $query->result_array();
			// WEEK
			case 'week':
				$arr_n_day = array("sunday","monday","tuesday","wednesday","thursday","friday","saturday");
				foreach ($arr_n_day as $value) {
					$day_on_week[] = (int)date('d', strtotime($value));
				}
				$query=array(
					"month" => $month_now,
					"year" => $year_now,
				);
				$this->db->select("day,month,SUM(pay) as sum");
				$this->db->from("bill");
				$this->db->where_in("day",$day_on_week);
				$this->db->group_by("day");
				$this->db->order_by("id","ASC");
				$query = $this->db->get();
				return $query->result_array();
			// MONTH
			case 'month':
				$this->db->select("day,month,SUM(pay) as sum");
				$this->db->from("bill");
				$this->db->where(array(
					"month" => $month_now,
					"year" => $year_now,
				));
				$this->db->group_by("day");
				$this->db->order_by("id","ASC");
				$query = $this->db->get();
				return $query->result_array();
			// DEFAULT
			default:
				return false;
				break;
		}
	}
	public function get_list_bill_today(){
		$day_now = (int)date('d');
		$month_now = (int)date('m');
		$year_now = (int)date('yy');
		$this->db->select("*");
		$this->db->from("bill");
		$this->db->where(array(
			"day" => $day_now,
			"month" => $month_now,
			"year" => $year_now,
		));
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>