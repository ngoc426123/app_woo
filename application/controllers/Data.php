<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function index(){
		$arr_menu = [
			["","CT00001","menu/zcdfef_001.png","Cafe đen","15000","25/12/2016"],
			["","CT00002","menu/xfbvfxbv_002.png","Cafe sữa","18000","25/12/2016"],
			["","CT00003","menu/denfr_003.png","Cafe thanh đạm","20000","25/12/2016"],
			["","CT00004","menu/hfnmgn_004.png","Capuchino Expresso","15000","25/12/2016"],
			["","CT00005","menu/dasced_005.png","Capuchino Latinote","23000","25/12/2016"],
			["","CT00006","menu/ergtr_006.png","Capuchino Normal","12000","25/12/2016"],
			["","CT00007","menu/vbnns_007.png","Soda chanh","25000","20/12/2016"],
			["","CT00008","menu/etytr_008.png","Soda dừa dâu","25000","18/12/2016"],
			["","CT00009","menu/vbcghbdgh_009.png","Soda bạc hà bưởi","25000","20/12/2016"],
			["","CT00010","menu/ytryutr_010.png","Trà đào vải","13000","20/12/2016"],
			["","CT00011","menu/wdcwef_011.png","Lipton chanh nóng","18000","18/12/2016"],
			["","CT00012","menu/kj,im,_012.png","Lipton chanh đá","20000","20/12/2016"],
			["","CT00013","menu/hjgjfy_010.png","Dừa ca","15000","20/12/2016"],
			["","CT00014","menu/cvbdgbdt_011.png","Nước chanh","10000","18/12/2016"],
			["","CT00015","menu/dxfbdfb_012.png","Nước suối","5000","20/12/2016"],
		];
		$arr_promotion = [
			["","Khuyến mãi 25%","25","per","15/2/2019"],
			["","Khuyến mãi 50%","50","per","27/6/2019"],
			["","Trừ tổng hóa đơn 50000","50000","num","24/10/2019"],
			["","Trừ tổng hóa đơn 100000","100000","num","28/10/2019"],
			["","free ship toàn bộ","15000","num","29/12/2019"],
		];
		$arr_customer = [
			["","Khách tại quán","385 Kênh Tân Hóa","email@email.com","033333444",""],
			["","Khách mang về","385 Kênh Tân Hóa","email@email.com","033333444",""],
			["","Bác hòa","480/12 Hoàng Xuân Nhị","","0905995478",""],
			["","cô Thắm Đa minh","28/45/2 Trịnh Đình Trọng","","0337754805",""],
			["","Ca đoàn thiếu nhi","19/2 Hoàng Xuân Nhị","","0373996947",""],
			["","Cha sở","19/2 Hoàng Xuân Nhị","","0309900745",""],
			["","Chú Quang","19/8 Hoàng Xuân Nhị","","098888999",""],
			["","Huynh đoàn Đa Minh","19/2 Hoàng Xuân Nhị","","0337754805",""],
		];
		$arr_method = [
			["","Uống tại quán","0",""],
			["","Mang về","0",""],
			["","Giao hàng < 5km","15000",""],
			["","Giao hàng < 10km","20000",""],
		];
		$arr_bill = [
			["","CT00001","{}","150000","100000",1,1,1,"15:30","25","10","2019",""],
			["","CT00002","{}","245000","215000",2,3,3,"20:30","30","11","2019",""],
			["","CT00003","{}","80000","80000",0,1,1,"15:30","30","11","2019",""],
			["","CT00004","{}","50000","50000",0,5,4,"12:35","30","11","2019",""],
			["","CT00005","{}","80000","80000",0,1,1,"15:30","30","11","2019",""],
			["","CT00006","{}","135000","135000",0,1,1,"15:30","30","11","2019",""],
			["","CT00007","{}","25000","25000",0,5,4,"12:38","15","12","2019",""],
			["","CT00008","{}","5000","0",3,7,4,"8:49","15","12","2019",""],
		];
	}
}
