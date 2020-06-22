<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function upload_file(){
		$upload_folder = 'upload/';
		$fileName = $_FILES['file']['name'];
		$fileTmp = $_FILES['file']['tmp_name'];
		$fileUpload = $upload_folder.$fileName;
		$imageFileType = pathinfo($fileUpload,PATHINFO_EXTENSION);
		$valid_extensions = array("jpg","jpeg","png");
		if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
			echo 0;
			die();
		}
		if ( move_uploaded_file($fileTmp, $fileUpload )) {
			echo $fileUpload;
		} else {
			echo 0;
		}
		die();
	}
}
