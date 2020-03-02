<?php
class Reset extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->db->query("DELETE FROM bill WHERE 1");
		$this->db->query("DELETE FROM menu WHERE 1");
		$this->db->query("DELETE FROM method WHERE 1");
		$this->db->query("DELETE FROM promotion_bill WHERE 1");
		$this->db->query("DELETE FROM promotion_menu WHERE 1");
		$this->db->query("DELETE FROM pos WHERE 1");
		$this->db->query("ALTER TABLE bill AUTO_INCREMENT = 1");
		$this->db->query("ALTER TABLE menu AUTO_INCREMENT = 1");
		$this->db->query("ALTER TABLE method AUTO_INCREMENT = 1");
		$this->db->query("ALTER TABLE promotion_bill AUTO_INCREMENT = 1");
		$this->db->query("ALTER TABLE promotion_menu AUTO_INCREMENT = 1");
		$this->db->query("ALTER TABLE pos AUTO_INCREMENT = 1");
		echo "Mọi sự đã hoàn tất !!!";
	}
}
?>