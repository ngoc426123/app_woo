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
		$date = "{$year_now}-{$month_now}-{$day_now}";
		for ($i=(int)date("d", strtotime('monday this week', strtotime($date))); $i <= (int)date("d", strtotime('sunday this week', strtotime($date))); $i++) { 
			$day_on_week[] = (int)$i;
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
			// WEEK
			case 'last-week':
				$arr_n_day = array("last sunday","last monday","last tuesday","last wednesday","last thursday","last friday","last saturday");
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
			// YESTERDAY
			case 'yesterday':
				$yesterday["day"] = (int)date('d', strtotime("yesterday"));
				$yesterday["month"] = (int)date('m', strtotime("yesterday"));
				$yesterday["year"] = (int)date('yy', strtotime("yesterday"));
				$this->db->select("time,day,month,pay");
				$this->db->from("bill");
				$this->db->where(array(
					"day" => $yesterday["day"],
					"month" => $yesterday["month"],
					"year" => $yesterday["year"],
				));
				$this->db->order_by("id","ASC");
				$query = $this->db->get();
				return $query->result_array();
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
				$date = "{$year_now}-{$month_now}-{$day_now}";
				for ($i=(int)date("d", strtotime('monday this week', strtotime($date))); $i <= (int)date("d", strtotime('sunday this week', strtotime($date))); $i++) { 
					$day_on_week[] = (int)$i;
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
	public function get_sales_detail($option){
		$day_now = (int)date('d');
		$month_now = (int)date('m');
		$year_now = (int)date('yy');
		$week_now = (int)date('W');
		switch ($option) {
			// TODAY
			case 'today':
				$this->db->select("*");
				$this->db->from("menu");
				$this->db->join("sales","menu.id = sales.id_menu");
				$this->db->where(array(
					"sales.day" => $day_now,
					"sales.month" => $month_now,
					"sales.year" => $year_now,
				));
				$this->db->order_by("menu.id","ASC");
				$query = $this->db->get();
				return $query->result_array();
			// DEFAULT
			default:
				return false;
				break;
		}
	}
}
?>