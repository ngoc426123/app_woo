$(document).ready(function(){
	var newBill = false;
	var dataBill = "";
	$(".addBill").click(function(){
		$.ajax({
			url:base_url+"banhang/getbillct",
			type:'post',
			async:true,
			beforeSend:function(){
				$("body").addClass("loading");
			},
			success:function(e){
				new_bill();
				newBill=true;
		    	let date_now = $(".topbarLive .time").attr("data-date");
		    	$(".paymenu .dateBill").find("strong").text(date_now);
		    	$(".dataBill").attr("data-ct",e);
		    	alertify.dismissAll();
		    	getDataBill();
		    	$("body").removeClass("loading");
			}
		});
    });
	$(".areaMenuLive .item").click(function(){
		if(newBill==false){
			var notification = alertify.notify('Vui lòng tạo hóa đơn mới', 'success', 3);
			return false;
		}
		let id = $(this).attr("id");
		let pos = $(this).attr("pos");
		let price = $(this).attr("price");
		updateItemMenu(id,pos,price);
		updatePosTotal();
		getDataBill();
	});
	$("html").on("click",".tableMenu .del",function(){
		$(this).parents("tr").remove();
		updatePosTotal();
		getDataBill();
		return false;
	});
    $("html").on("click",".quantity button",function() {
    	if($(this).hasClass("btn-down")){
    		var $value = parseInt($(this).parents(".quantity").find("input").val());
	        if (parseInt($value) > 1) {
	            $value = parseInt($value) - 1;
	            $(this).parents(".quantity").find("input").val($value);
	        }
    	}
    	else if($(this).hasClass("btn-up")){
    		var $value = parseInt($(this).parents(".quantity").find("input").val());
	        $value = parseInt($value) + 1;
	        $(this).parents(".quantity").find("input").val($value);
    	}
        updatePosPrice($(this).parents("tr"),$value);
        updatePosTotal();
        getDataBill();
    });
    $(".newBill").click(function(){
    	alertify.confirm('Tạo đơn hàng mới', '<p>Bạn có chắc muốn tạo đơn hàng mới</p><p>Đơn hàng đang nhập sẽ mất và đơn hàng mới sẽ được tạo.</p>', 
    		function(){
    			newBill=true;
		    	let date_now = $(".topbarLive .time").attr("data-date");
		    	$(".paymenu .dateBill").find("strong").text(date_now);
		    	$(".paymenu .dateBill").attr("data-date",date_now);
		    	$(".listMenu").html("");
		    	$(".printArea .total").text("0");
		    	getDataBill();
		    	alertify.success('Tạo đơn hàng mới thành công.');
    		},function(){ 
    			alertify.error('Hủy bỏ');
    		});
    });
    let date_now;
    date_now = new Date();
	date_now = date_now.getHours()+":"+pad_num(date_now.getMinutes())+":"+pad_num(date_now.getSeconds())+" "+pad_num(date_now.getDate())+"/"+pad_num(date_now.getMonth() + 1)+"/"+pad_num(date_now.getFullYear()); // 07:25, 20/06/2019
	$(".topbarLive .time").text(date_now);
	$(".topbarLive .time").attr("data-date",date_now);
	setInterval(function(){
		date_now = new Date();
		date_now = date_now.getHours()+":"+pad_num(date_now.getMinutes())+":"+pad_num(date_now.getSeconds())+" "+pad_num(date_now.getDate())+"/"+pad_num(date_now.getMonth() + 1)+"/"+pad_num(date_now.getFullYear()); // 07:25, 20/06/2019
		$(".topbarLive .time").text(date_now);
		$(".topbarLive .time").attr("data-date",date_now);
	},1000);
	
	$(".topbarLive .tools .icon").click(function(){
        if(!$(this).parents(".tools").hasClass("active")){
            $(this).parents(".tools").addClass("active");
        }
        else{
            $(this).parents(".tools").removeClass("active");
        }
    });
    $(window).bind("click",function(e){
        var target=e.target;
        if(!$(target).parents(".topbarLive .tools").hasClass("active")){
            $(".topbarLive .tools").removeClass("active");
        }
    });
    $(".myCheckbox input").change(function(){
    	updatePosTotal();
    	getDataBill();
    });
    function pad_num(num){
		let n = num.toString();
		return (n.length==1)?"0"+n:n;
	}
    function formatNumber(num) {
	  	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
	}
	function updateItemMenu(id,pos,price){
		if($(".listMenu tr[id="+id+"]").size()==0){
			let tmp = getTemplateItemMenu(id,pos,price);
			$(".listMenu").append($(tmp));
		}
		else{
			let quantity = $(".listMenu tr[id="+id+"]").attr("quantity");
			quantity++;
			$(".listMenu tr[id="+id+"]").find(".quantity").find("input").val(quantity);
			updatePosPrice($(".listMenu tr[id="+id+"]"),quantity);
        	updatePosTotal();
		}
	}
	function getTemplateItemMenu(id,pos,price){
		var template = `<tr id="`+id+`" pos="`+pos+`" price="`+price+`" quantity="1" total="`+price+`">
							<td>`+pos+`</td>
							<td>`+formatNumber(price)+`</td>
							<td>
								<div class="quantity">
                                    <button type="button" class="btn-down"><i class="fa fa-minus"></i></button>
                                    <input type="text" value="1">
                                    <button type="button" class="btn-up"><i class="fa fa-plus"></i></button>
                                </div>
							</td>
							<td>`+formatNumber(price)+`</td>
							<td><a href="" class="del"><i class="fa fa-times"></i></a></td>
						</tr>`;
		return template;
	}
    function updatePosPrice(ele,quantity){
    	let price = parseInt(ele.attr("price"));
    	let total = price*quantity;
    	ele.attr("quantity",quantity);
    	ele.attr("total",total);
    	ele.find("td:nth-child(4)").text(formatNumber(total));
    }
    function updatePosTotal(){
    	let total=0;
    	$(".tableMenu table tbody tr").each(function(){
    		let tot = parseInt($(this).attr("total"));
    		total+=tot;
    	});
    	///////////
    	$(".check-giamgia").each(function(){
    		let __ = $(this);
    		if(__.find("input").prop("checked")){
	    		let giamgia = parseInt(__.attr("data-giamgia"));
	    		if(__.attr("data-type")=="per"){
	    			total=total-(total*giamgia/100);
	    		}
	    		else{
	    			total=total-giamgia;
	    		}
	    	}
    	});
    	$(".check-vanchuyen").each(function(){
    		let __ = $(this);
	    	if(__.find("input").prop("checked")){
	    		let vanchuyen = parseInt(__.attr("data-vanchuyen"));
	    		total=total+vanchuyen;
	    	}
    	});
    	///////////
    	$(".printArea .total").text(formatNumber(total));
    }
    function getDataBill(){
    	let ttotal=0;
    	let pay=0;
    	let date = $(".topbarLive .time").attr("data-date");
    	let ct   = $(".dataBill").attr("data-ct");
    	let arr_cont = [];
    	$(".tableMenu table tbody tr").each(function(){
    		let pos = $(this).attr("pos");
    		let price = $(this).attr("price");
    		let quantity = $(this).attr("quantity");
    		let total = $(this).attr("total");
    		ttotal+=parseInt(total);
    		arr_cont.push(`{"pos":"`+pos+`","price":"`+price+`","quantity":"`+quantity+`","total":"`+total+`"}`);
    	});
    	let data = `{"ct":"`+ct+`","date":"`+date+`","content":[`+arr_cont+`],"billtotal":"`+ttotal+`"`;
    	///////////
    	pay=ttotal;
    	if($(".tableMenu").find(".check-giamgia").find("input:checked").size()>0){
    		let ele = $(".tableMenu").find(".check-giamgia").find("input:checked");
    		let giamgia = parseInt(ele.parents(".check-giamgia").attr("data-giamgia"));
    		if(ele.parents(".check-giamgia").attr("data-type")=="per"){
    			pay=pay-(pay*giamgia/100);
    			data_giamgia = `,"discount":"-`+ele.parents(".check-giamgia").attr("data-giamgia")+`%"`;
    		}
    		else{
    			pay=pay-giamgia;
    			data_giamgia = `,"discount":"-`+ele.parents(".check-giamgia").attr("data-giamgia")+`"`;
    		}
    	}
    	else{
    		data_giamgia = `,"discount":"0"`;
    	}
    	data+=data_giamgia;

    	if($(".tableMenu").find(".check-vanchuyen").find("input:checked").size()>0){
    		let ele = $(".tableMenu").find(".check-vanchuyen").find("input:checked");
    		let vanchuyen = parseInt(ele.parents(".check-vanchuyen").attr("data-vanchuyen"));
    		pay=pay+vanchuyen;
    		data_vanchuyen = `,"method":"+`+ele.parents(".check-vanchuyen").attr("data-vanchuyen")+`"`;
    	}
    	else{
    		data_vanchuyen = `,"method":"0"`;
    	}
    	data+=data_vanchuyen;
    	///////////
    	data += `,"pay":"`+pay+`"}`;
    	$(".dataBill").attr("data-bill",data);
    }
     function new_bill(){
    	$(".paymenu").removeClass("hide");
    	$(".tableMenu").removeClass("hide");
    	$(".addBill").addClass("hide");
    	$(".listMenu").html("");
    	$(".printArea .total").text("0");
    	$(".paymenu .dateBill").find("strong").text("00:00:00 00/00/0000");
    	$(".dataBill").attr("data-bill","");
    	$(".dataBill").attr("data-ct","");
    	$(".tableMenu .myCheckbox").find("input").prop("checked",false);
    }
    function complate_bill(){
    	$(".paymenu").addClass("hide");
    	$(".tableMenu").addClass("hide");
    	$(".addBill").removeClass("hide");
    	$(".listMenu").html("");
    	$(".printArea .total").text("0");
    	$(".paymenu .dateBill").find("strong").text("00:00:00 00/00/0000");
    	$(".dataBill").attr("data-bill","");
    	$(".dataBill").attr("data-ct","");
    	$(".tableMenu .myCheckbox").find("input").prop("checked",false);
    }
    ////////////////////////////////////////////////////////////
    // PRINT
    ////////////////////////////////////////////////////////////
    $(".printArea").click(function(){
    	let dataBill = JSON.parse($(".dataBill").attr("data-bill"));
    	let dataBillText = $(".dataBill").attr("data-bill");
    	if(dataBill.billtotal<=0){
    		alertify.notify('Hóa đơn chưa có giá, hãy thêm món', 'error', 3);
    		return false;
    	}
    	else{
    		$.ajax({
    			url:base_url+'bill/addbill',
    			type:'POST',
    			async:true,
    			data:{content: dataBillText},
    			beforeSend:function(){
    				$("body").addClass("loading");
    			},
    			success:function(e){
    				newBill=false;
    				let content = getContentPrint(dataBill);
    				$(".areaPrint").html($(content));
    				$("body").removeClass("loading");
    				complate_bill();
    				window.print();
    			}
    		});
    	}
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
});