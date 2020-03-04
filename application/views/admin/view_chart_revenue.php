<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Biểu đồ doanh thu</h3>
    </div>
    <div class="box-body">
        <div class=" box-df">
            <input type="text" class="form-control" id="datepicker-range">
            <select name="" id="change-select" class="form-control">
                <option value="month">Tháng trước</option>
                <option value="last-week">Tuần trước</option>
                <option value="yesterday">Hôm qua</option>
                <option value="today" selected>Hôm nay</option>
                <option value="week">Tuần này</option>
                <option value="month">Tháng này</option>
            </select>
        </div>
        <div class="chart">
            <canvas id="char-dashbroad"></canvas>
        </div>
    </div>
    <div class="overlay hidden"><i class="fa fa-refresh fa-spin"></i></div>
</div>
<script src="<?php echo base_url("AdminLTE/bower_components/chart.js/Chart.js") ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    ///////////////////////////////////////////////////////////////////
    /////////====================DASHBROAD===================//////////
    ///////////////////////////////////////////////////////////////////
    var canvas = $('#char-dashbroad').get(0).getContext('2d');
    var chart = new Chart(canvas,{
        type: 'line',
        data : {
            labels  : [],
            datasets: [
                {
                    label           : 'Khách thanh toán',
                    data            : [],
                    borderColor     : 'rgba(221, 75, 57, 0.7)',
                    backgroundColor : 'rgba(221, 75, 57, 0.3)',
                    borderWidth     : 2
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    // =====================================================
    data_label = new Array();
    data_pay = new Array();
    $.ajax({
        url:base_url+"dashbroad/get_revenue_detail",
        data:{
            option:"today",
        },
        type:'POST',
        success:function(e){
            dat = JSON.parse(e);
            dat.map((e,i) => {
                data_label.push(e.time);
                data_pay.push(e.pay);
            });
            chart.data.labels = data_label;
            chart.data.datasets[0].data = data_pay;
            chart.update();
        }
    });
    $("#change-select").on("change",function(){
        let option = $(this).val()
        $.ajax({
            url:base_url+"dashbroad/get_revenue_detail",
            data:{
                option:option,
            },
            type:'POST',
            async:true,
            beforeSend:function(){
                data_label = [];
                data_pay = [];
                $(".overlay").removeClass("hidden");
            },
            success:function(e){
                dat = JSON.parse(e);
                dat.map((e,i) => {
                    if(option=="today" || option=="yesterday"){
                        data_label.push(e.time);
                        data_pay.push(e.pay);
                    }
                    else{
                        data_label.push(e.day+"/"+e.month);
                        data_pay.push(e.sum);
                    }
                });
                chart.data.labels = data_label;
                chart.data.datasets[0].data = data_pay;
                chart.update();
                $(".overlay").addClass("hidden");
            }
        });
    });
});
</script>