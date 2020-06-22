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
		$list_day = get_list_date($year_now."/".$month_now."/".$day_now,$option);
		if($option != "today" && $option != "yesterday"){
			$this->db->select("time,day,month,year,SUM(pay) as sum");
		}
		else{
			$this->db->select("*");
		}
		$this->db->from("bill");
		$this->db->where_in("day",$list_day["day"]);
		$this->db->where_in("month",$list_day["month"]);
		$this->db->where_in("year",$list_day["year"]);
		if($option != "today" && $option != "yesterday"){
			$this->db->group_by("day");
		}
		$this->db->order_by("id","ASC");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_sales_detail($option,$menu){
		$day_now = (int)date('d');
		$month_now = (int)date('m');
		$year_now = (int)date('yy');
		$list_day = get_list_date($year_now."/".$month_now."/".$day_now,$option);
		if($option != "today" && $option != "yesterday"){
			$this->db->select("name,day,month,year,SUM(num) as num");
		}
		else{
			$this->db->select("*");
		}
		$this->db->from("sales");
		$this->db->join("menu","menu.id = sales.id_menu");
		$this->db->where_in("sales.day",$list_day["day"]);
		$this->db->where_in("sales.month",$list_day["month"]);
		$this->db->where_in("sales.year",$list_day["year"]);
		if($menu!=0){
			$this->db->where("id_menu",$menu);
		}
		if($option != "today" && $option != "yesterday"){
			$this->db->group_by("sales.day");
		}
		$this->db->order_by("menu.id","ASC");
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>