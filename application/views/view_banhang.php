<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>---[Bán hàng]---</title>
	<meta class="dataBill" data-bill="" data-ct="">
  	<link href="<?php echo base_url("AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("AdminLTE/bower_components/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("AdminLTE/plugins/alertifyjs/css/alertify.css"); ?>" rel="stylesheet">
  	<link href="<?php echo base_url("AdminLTE/plugins/alertifyjs/css/themes/default.css"); ?>" rel="stylesheet">
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
				</table>
				<table>
					<tfoot>
					<?php
					foreach ($promotion as $value) {
					?>
						<tr>
							<td colspan="2">
								<div class="myCheckbox check-giamgia" data-giamgia="<?php echo $value["promotion"] ?>" data-type="<?php echo $value["type"] ?>"><label for="pr<?php echo $value["id"] ?>"><input id="pr<?php echo $value["id"] ?>" type="checkbox" name="promotion"><span><?php echo $value["content"] ?></span></label></div>
							</td>
							<td colspan="2"><?php echo ($value["type"] == "per")?"- ".$value["promotion"]."%":"- ".number_format($value["promotion"],0,'','.')." vnđ" ?></td>
							<td></td>
						</tr>
					<?php
					}
					?>
					</tfoot>
				</table>
				<table>
					<tfoot>
					<?php
					foreach ($method as $value) {
					?>
						<tr>
							<td colspan="2">
								<div class="myCheckbox check-vanchuyen" data-vanchuyen="<?php echo $value["cost"] ?>"><label for="mt<?php echo $value["id"] ?>"><input id="mt<?php echo $value["id"] ?>" type="checkbox" name="method"><span><?php echo $value["content"] ?></span></label></div>
							</td>
							<td colspan="2">+ <?php echo number_format($value["cost"],0,'','.') ?> vnđ</td>
							<td></td>
						</tr>
					<?php
					}
					?>
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
							<li><a href="<?php echo base_url("dashbroad"); ?>"><span class="fa-dashboard">Tổng quan hôm nay</span></a></li>
							<li><a href="<?php echo base_url("bill"); ?>"><span class="fa-list">Quản lý đơn hàng</span></a></li>
							<li><a href=""><span class="fa-eye">Tải Teamviewer</span></a></li>
							<li><a href=""><span class="fa-eye">Tải Ultraviewer</span></a></li>
							<!-- <li><a href=""><span class="fa-sign-out">Thoát</span></a></li> -->
						</ul>
					</div>
				</div>
			</div>
			<div class="menuLive designScroll">
				<div class="grid">
				<?php 
				foreach ($menu as $value) {
					if($value["status"]==1){
						$cost = ($value["type"]=="per")?($value["cost"] - (($value["cost"]*$value["promotion"])/100)):($value["cost"]-$value["promotion"]);
					}
					else{
						$cost = $value["cost"];
					}
					
				?>
					<div class="col">
						<div class="item" id="<?php echo $value["id"] ?>" pos="<?php echo $value["name"] ?>" price="<?php echo $cost ?>">
							<div class="img"><img src="<?php echo base_url($value["image"]); ?>" alt=""></div>
							<div class="caption">
								<div class="tend"><?php echo $value["name"] ?></div>
								<div class="price"><?php echo $cost ?></div>
							</div>
						</div>
					</div>
				<?php
				}
				?>
				</div>
			</div>
		</div>
	</div>
	<div class="areaPrint"></div>
</body>
<!-- jQuery 3 -->
<script src="<?php echo base_url("tmp/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("AdminLTE/plugins/alertifyjs/alertify.js"); ?>" type="text/javascript"></script>
<script src="<?php echo base_url("tmp/js/style.js"); ?>" type="text/javascript"></script>
<script type="text/javascript">
	var base_url = "<?php echo base_url(); ?>";
</script>
</html>