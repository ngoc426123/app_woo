<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>---[Bán hàng]---</title>
	<meta class="dataBill" data-bill="" data-ct="">
  	<link href="<?php echo base_url("AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("AdminLTE/bower_components/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("AdminLTE/bower_components/alertifyjs/css/alertify.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("AdminLTE/bower_components/alertifyjs/css/themes/default.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("tmp/css/style.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("tmp/css/style_print.css"); ?>" rel="stylesheet">
</head>
<body>
	<div class="areaTable">
		<div class="areaPosLive">
			<div class="tableMenu designScroll hide">
				<table>
					<thead>
						<tr>
							<th>Pos</th>
							<th>Đ.Giá</th>
							<th>S.Lượng</th>
							<th>T.Tiền</th>
							<th></th>
						</tr>
					</thead>
					<tbody class="listMenu">
						
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2">
								<div class="myCheckbox check-giamgia" data-giamgia="20"><label for="pr1"><input id="pr1" type="checkbox"><span>Có giảm giá</span></label></div>
							</td>
							<td colspan="2">-20%</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="myCheckbox check-vanchuyen" data-vanchuyen="15000"><label for="pr2"><input id="pr2" type="checkbox"><span>Vận chuyển có tính phí</span></label></div>
							</td>
							<td colspan="2">+15.000</td>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="paymenu hide">
				<div class="dateBill">Giờ vào : <strong>13:13:34 25/12/2019</strong></div>
				<button class="printArea">
					<span class="text">Thanh toán</span>
					<span class="total">0</span>
				</button>
				<button class="newBill"><i class="fa fa-file-text-o"></i></button>
			</div>
			<div class="addBill">
				<div class="img"><img src="<?php echo base_url("tmp/images/icon-news-bill.svg") ?>" alt=""></div>
				<button><i class="fa fa-plus"></i> Hóa đơn mới</button>
			</div>
		</div>
		<div class="areaMenuLive">
			<div class="topbarLive">
				<div class="time">12:41 25/12/2019</div>
				<div class="tools">
					<div class="icon"><i class="fa fa-cog"></i></div>
					<div class="popup">
						<ul>
							<li><a href=""><span class="fa-dashboard">Tổng quan hôm nay</span></a></li>
							<li><a href=""><span class="fa-list">Quản lý đơn hàng</span></a></li>
							<li><a href=""><span class="fa-eye">Tải Teamviewer</span></a></li>
							<li><a href=""><span class="fa-eye">Tải Ultraviewer</span></a></li>
							<li><a href=""><span class="fa-sign-out">Thoát</span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="menuLive designScroll">
				<div class="grid">
					<div class="col">
						<div class="item" id="m1210" pos="Cafe sữa đá" price="15000">
							<div class="img"><img src="<?php echo base_url("upload/item1.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Cafe sữa đá</div>
								<div class="price">15.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1211" pos="Cafe đá" price="10000">
							<div class="img"><img src="<?php echo base_url("upload/item2.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Cafe đá</div>
								<div class="price">10.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1212" pos="Nước cam vắt" price="15000">
							<div class="img"><img src="<?php echo base_url("upload/item3.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Nước cam vắt</div>
								<div class="price">15.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1213" pos="Soda chanh" price="10000">
							<div class="img"><img src="<?php echo base_url("upload/item4.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Soda chanh</div>
								<div class="price">10.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1214" pos="Soda Bạc hà" price="25000">
							<div class="img"><img src="<?php echo base_url("upload/item5.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Soda Bạc hà</div>
								<div class="price">25.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1215" pos="Capuchino" price="45000">
							<div class="img"><img src="<?php echo base_url("upload/item6.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Capuchino</div>
								<div class="price">45.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1216" pos="Chanh leo" price="45000">
							<div class="img"><img src="<?php echo base_url("upload/item7.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Chanh leo</div>
								<div class="price">45.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1217" pos="Nước dừa ca" price="12000">
							<div class="img"><img src="<?php echo base_url("upload/item8.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Nước dừa ca</div>
								<div class="price">12.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1218" pos="Sinh tố bơ" price="18000">
							<div class="img"><img src="<?php echo base_url("upload/item9.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Sinh tố bơ</div>
								<div class="price">18.000</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="item" id="m1219" pos="Sinh tố xoài" price="18000">
							<div class="img"><img src="<?php echo base_url("upload/item10.jpg"); ?>" alt=""></div>
							<div class="caption">
								<div class="tend">Sinh tố xoài</div>
								<div class="price">18.000</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="areaPrint"></div>
</body>
<!-- jQuery 3 -->
<script src="<?php echo base_url("tmp/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("AdminLTE/bower_components/alertifyjs/alertify.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("tmp/js/style.js"); ?>" type="text/javascript"></script>
<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";
</script>
</html>