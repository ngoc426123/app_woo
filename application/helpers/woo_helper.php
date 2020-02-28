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
?>