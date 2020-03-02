<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Backup extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$filename="backup_app_woo_".date("d-m-Y_H-i-s").'.sql';
		$this->load->dbutil();
		$backup = $this->dbutil->backup();
		$this->load->helper('file');
		write_file('./backup/'.$filename, $backup);
		$this->load->helper('download');
		force_download($filename, $backup);
	}
}
