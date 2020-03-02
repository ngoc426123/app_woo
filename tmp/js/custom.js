$(document).ready(function(){
	$(".datepicker").datepicker({
     	autoclose: true,
     	format: 'dd/mm/yyyy',
    })
	$(".openCkFinder").click(function(){
		var __= $(this);
		CKFinder.popup( {
	        width: 800,
	        height: 500,
	        chooseFiles: true,
	        resourceType: 'Images',
	        selectActionFunction: function( fileUrl, data ) {
                var file_url = fileUrl.substr(9);
                __.parents(".img_menu").find("img").attr("src",base_url+file_url);
                __.parents(".img_menu").find("input").val(file_url);
	        }
	    });
	});
	$("input[type='checkbox'][icheck], input[type='radio'][icheck]").iCheck({
      	checkboxClass: 'icheckbox_flat-blue',
      	radioClass   : 'iradio_flat-blue'
    });
    $("#datatable").DataTable({
		paging   : true,
		ordering : false,
    });
    $(".btn-print-bill").click(function(){
    	let dataBill = JSON.parse($(this).attr("data-bill"));
    	let content = getContentPrint(dataBill);
    	$(".areaPrint").html($(content));
		window.print();
    });
    function getContentPrint(dataBill){
		let content = `<div id="printableArea">
					<div class="billStart">.</div>
				    <div class="billHead">
				    	<div class="storeTitle">La Cooffe & Flower</div>
				    	<div class="storeAddress">483 Kênh Tân Hoá , Phường Hoà Thạnh, Quận Tân Phú, TP. Hồ Chí Minh, Việt Nam</div>
				    </div>
					<div class="billShoulder">
						<div class="billTitle">PHIẾU THANH TOÁN</div>
						<div class="billDate">Số CT : `+dataBill.ct+`</div>
						<div class="billDate">Ngày CT : `+dataBill.date+`</div>
					</div>
					<div class="billTable">
						<table>
							<tr>
								<th>Món</th>
								<th>Sl</th>
								<th>T.T</th>
							</tr>`;

		dataBill.content.map((e,i) => {
    		content+=`<tr>
						<td>`+e.pos+`</br>---`+e.price+`</td>
						<td> <strong>x`+e.quantity+`</strong></td>
						<td>`+e.total+`</td>
					</tr>`;
    	});
		content+=`</table>
				</div>
				<div class="billTotal">
					<table>
						<tr>
							<th>Tổng tiền</th>
							<td>`+dataBill.billtotal+`</td>
						</tr>
						<tr>
							<th class="">Đã giảm</th>
							<td class="">`+dataBill.discount+`</td>
						</tr>
						<tr>
							<th class="pb">Vận chuyển</th>
							<td class="pb">`+dataBill.method+`</td>
						</tr>
						<tr>
							<th class="bb">Thanh toán</th>
							<td class="bb">`+dataBill.pay+`</td>
						</tr>
					</table>
				</div>
				<div class="billNote">
					<p>Lưu ý: Cửa hàng giải quyết khiếu nại về hóa đơn trong ngày, mọi vấn đề qua ngày đều không nhận giải quyết.</p>
					<p>Chúc quý khách ngon miệng.</p>
				</div>
				<div class="billWifi">Pass wifi: <strong>lacoffee438</strong></div>
				<div class="billEnd"></div>
		</div>`;
		return content;
	}
	$(".btn-del-bill").click(function(){
		let __ = $(this);
    	alertify.confirm('Xóa hóa đơn', '<p>Bạn có chắc muốn xóa</p>', 
    		function(){
    			$.ajax({
    				url:base_url+'bill/del',
    				type:'POST',
    				data:{
    					id: __.attr("data-bill-id"),
    				},
    				async:true,
    				beforeSend:function(){
    					__.parents(".box").find("overlay").removeClass("hidden");
    				},
    				success:function(e){
    					console.log(e);
    					__.parents("tr").remove();
    					__.parents(".box").find("overlay").addClass("hidden");
    					alertify.success('Xóa thành công.');
    				}
    			});
    		},function(){}
    	);
    });
    $('#datepicker-range').daterangepicker({
    	
    })
});