<?php
if(!function_exists("alert")){
	function alert($type="success",$title="Thông báo",$content="Lorem ipsum"){
		switch ($type){
			case "success" : 
				$icon="fa-check";
				break;
			case "info" : 
				$icon="fa-info";
				break;
			case "warning" : 
				$icon="fa-warning";
				break;
			case "danger" : 
				$icon="fa-ban";
				break;
		}
		?>
			<div class="alert alert-<?php echo $type; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            	<h4><i class="icon fa <?php echo $icon; ?>"></i> <?php echo $title; ?></h4>
                <?php echo $content; ?>
             </div>
		<?php
	}
}
if(!function_exists("get_code_menu")){
	function get_code_menu(){
		$CI = get_instance();
		$CI->db->select("code");
		$CI->db->from("menu");
		$CI->db->order_by("id","desc");
		$qr = $CI->db->get();
		if($qr->num_rows()>0){
			$value = $qr->row_array();
			$num = (int) substr($value["code"], 2);
			$num++;
			$num = str_pad($num, 5,0,STR_PAD_LEFT);
			echo "MT".$num;
		}
		else{
			echo "MT00001";
		}
	}
}
if(!function_exists("get_code_promotion")){
	function get_code_promotion(){
		$CI = get_instance();
		$CI->db->select("code");
		$CI->db->from("promotion_bill");
		$CI->db->order_by("id","desc");
		$qr = $CI->db->get();
		if($qr->num_rows()>0){
			$value = $qr->row_array();
			$num = (int) substr($value["code"], 2);
			$num++;
			$num = str_pad($num, 5,0,STR_PAD_LEFT);
			echo "PR".$num;
		}
		else{
			echo "PR00001";
		}
	}
}
if(!function_exists("get_code_bill")){
	function get_code_bill(){
		$CI = get_instance();
		$CI->db->select("code");
		$CI->db->from("bill");
		$CI->db->order_by("id","desc");
		$qr = $CI->db->get();
		if($qr->num_rows()>0){
			$value = $qr->row_array();
			$num = (int) substr($value["code"], 2);
			$num++;
			$num = str_pad($num, 5,0,STR_PAD_LEFT);
			echo "CT".$num;
		}
		else{
			echo "CT00001";
		}
	}
}
if(!function_exists("pr")){
	function pr($array){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
}
if(!function_exists("get_date_now")){
	function get_date_now(){
        return date('d').'/'.date('m').'/'.date('Y');
	}
}
if(!function_exists("get_list_date")){
	function get_list_date($date, $option){
		$return = array(
			"day" => [],
			"month" => [],
			"year" => [],
		);
		switch ($option) {
			// LAST WEEK
			case 'last-month':
				$jday = (int)date("t",strtotime("last month",strtotime($date)));
				$day = (int)date("d",strtotime("last month",strtotime($date)));
				$month = (int)date("m",strtotime("last month",strtotime($date)));
				$year = (int)date("yy",strtotime("last month",strtotime($date)));
				for ($i=1; $i <= $jday; $i++) { 
					$return["day"][]=(int)date("d",mktime(0,0,0,$month,$i,$year));
					$return["month"][]=(int)date("m",mktime(0,0,0,$month,$i,$year));
					$return["year"][]=(int)date("yy",mktime(0,0,0,$month,$i,$year));
				}
				break;
			case 'last-week':
				$first_day = array(
					"day" => (int)date("d", strtotime('monday last week', strtotime($date))),
					"month" => (int)date("m", strtotime('monday last week', strtotime($date))),
					"year" => (int)date("yy", strtotime('monday last week', strtotime($date))),
				);
				
				for ($i=0; $i <= 6; $i++) { 
					$return["day"][]=(int)date("d",mktime(0,0,0,$first_day["month"],$first_day["day"],$first_day["year"]));
					$return["month"][]=(int)date("m",mktime(0,0,0,$first_day["month"],$first_day["day"]+$i,$first_day["year"]));
					$return["year"][]=(int)date("yy",mktime(0,0,0,$first_day["month"],$first_day["day"]+$i,$first_day["year"]));
				}
				break;
			// YESTERDAY
			case 'yesterday':
				$return["day"][] = (int)date('d', strtotime("yesterday",strtotime($date)));
				$return["month"][] = (int)date('m', strtotime("yesterday",strtotime($date)));
				$return["year"][] = (int)date('yy', strtotime("yesterday",strtotime($date)));
				break;
			// TODAY
			case 'today':
				$return["day"][] = (int)date("d",strtotime("today",strtotime($date)));
				$return["month"][] = (int)date("m",strtotime("today",strtotime($date)));
				$return["year"][] = (int)date("yy",strtotime("today",strtotime($date)));
				break;
			// WEEK
			case 'week':
				$first_day = array(
					"day" => (int)date("d", strtotime('monday this week', strtotime($date))),
					"month" => (int)date("m", strtotime('monday this week', strtotime($date))),
					"year" => (int)date("yy", strtotime('monday this week', strtotime($date))),
				);
				for ($i=0; $i <= 6; $i++) { 
					$return["day"][]=(int)date("d",mktime(0,0,0,$first_day["month"],$first_day["day"]+$i,$first_day["year"]));
					$return["month"][]=(int)date("m",mktime(0,0,0,$first_day["month"],$first_day["day"]+$i,$first_day["year"]));
					$return["year"][]=(int)date("yy",mktime(0,0,0,$first_day["month"],$first_day["day"]+$i,$first_day["year"]));
				}
				break;
			case 'month':
				$jday = (int)date("t",strtotime("today",strtotime($date)));
				$day = (int)date("d",strtotime("today",strtotime($date)));
				$month = (int)date("m",strtotime("today",strtotime($date)));
				$year = (int)date("yy",strtotime("today",strtotime($date)));
				for ($i=1; $i <= $jday; $i++) { 
					$return["day"][]=(int)date("d",mktime(0,0,0,$month,$i,$year));
					$return["month"][]=(int)date("m",mktime(0,0,0,$month,$i,$year));
					$return["year"][]=(int)date("yy",mktime(0,0,0,$month,$i,$year));
				}
				break;
			// MONTH
			case 'month':
				break;
			// DEFAULT
			default:
				break;				
		}
		return $return;
	}
}
?>