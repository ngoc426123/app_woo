<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-line-chart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Hôm nay</span>
                <span class="info-box-number"><?php echo number_format($revenue["today"],0,'','.') ?><small> vnđ</small></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-line-chart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Tuần này</span>
                <span class="info-box-number"><?php echo number_format($revenue["week"],0,'','.') ?><small> vnđ</small></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-line-chart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Tháng này</span>
                <span class="info-box-number"><?php echo number_format($revenue["month"],0,'','.') ?><small> vnđ</small></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-line-chart"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Trong năm</span>
                <span class="info-box-number"><?php echo number_format($revenue["month"],0,'','.') ?><small> vnđ</small></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Danh sách món mới</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Hình</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Giảm giá</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($list_menu as $key => $value) {
                            $stt=$key+1;
                        ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><div class="img-table-menu"><img src="<?php echo base_url($value["image"]) ?>" alt=""></div></td>
                                <td><?php echo $value["name"] ?></td>
                                <td><?php echo number_format($value["cost"],0,'','.') ?> vnđ</td>
                                <td><?php echo ($value["type"] == "per")?"- ".$value["promotion"]."%":"- ".number_format($value["promotion"],0,'','.')." vnđ" ?></td>
                            </tr>
                        <?php
                        }
                        ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Danh sách giảm giá</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Nội dung</th>
                                <th>Giảm giá</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($list_promotion as $key => $value) {
                            $stt=$key+1;
                        ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $value["content"] ?></td>
                                <td><?php echo ($value["type"] == "per")?"- ".$value["promotion"]."%":"- ".number_format($value["promotion"],0,'','.')." vnđ" ?></td>
                                <td><?php echo $value["date"] ?></td>
                            </tr>
                        <?php
                        }
                        ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Danh sách phương thức</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Nội dung</th>
                                <th>Giá</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($list_method as $key => $value) {
                            $stt=$key+1;
                        ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $value["content"] ?></td>
                                <td>+ <?php echo number_format($value["cost"],0,'','.') ?> vnđ</td>
                                <td><?php echo $value["date"] ?></td>
                            </tr>
                        <?php
                        }
                        ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Doanh thu hôm nay</h3>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="char-dashbroad"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Bán hàng hôm nay</h3>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="char-dashbroad-2"></canvas>
                </div>
            </div>
        </div>
    </div>
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
    // ==============================================
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
    ///////////////////////////////////////////////////////////////////
    /////////====================DASHBROAD===================//////////
    ///////////////////////////////////////////////////////////////////
    var canvas2 = $('#char-dashbroad-2').get(0).getContext('2d');
    var chart2 = new Chart(canvas2,{
        type: 'bar',
        data : {
            labels  : [],
            datasets: [
                {
                    label           : 'Số lượng',
                    data            : [],
                    borderColor     : 'rgba(96, 92, 168, 0.7)',
                    backgroundColor : 'rgba(96, 92, 168, 0.3)',
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
            },
        }
    });
    // ==============================================
    data_label2 = new Array();
    data_pay2 = new Array();
    $.ajax({
        url:base_url+"dashbroad/get_sales_detail",
        data:{
            option:"today",
            menu:0,
        },
        type:'POST',
        success:function(e){
            dat = JSON.parse(e);
            dat.map((e,i) => {
                data_label2.push(e.name);
                data_pay2.push(e.num);
            });
            chart2.data.labels = data_label2;
            chart2.data.datasets[0].data = data_pay2;
            chart2.update();
        }
    });
});
</script>