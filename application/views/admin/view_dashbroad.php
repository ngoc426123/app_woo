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
        <div class="box box-solid bg-teal-gradient">
            <div class="box-header with-border">
                <h3 class="box-title">Biểu đồ hôm nay</h3>
            </div>
            <div class="box-body">
                <div class="chart">
                    <canvas id="char-dashbroad"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url("AdminLTE/bower_components/jquery/dist/jquery.min.js") ?>"></script>
<script src="<?php echo base_url("AdminLTE/bower_components/chart.js/Chart.js") ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    ///////////////////////////////////////////////////////////////////
    /////////====================DASHBROAD===================//////////
    ///////////////////////////////////////////////////////////////////
    var data = {
        labels  : ['8:40', '9h15', '10:20', '18:45', '20:45', '20:50', '21:05'],
        datasets: [
            {
                label               : 'Electronics',
                fillColor           : '#FFFFFF',
                strokeColor         : '#FFFFFF',
                pointColor          : '#FFFFFF',
                pointStrokeColor    : '#FFFFFF',
                pointHighlightFill  : '#ffeb3b',
                pointHighlightStroke: '#ffeb3b',
                data                : [135000, 245000, 30000, 48000, 44500, 106400, 30500]
            }
        ]
    }
    var options = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(255,255,255,0.3)",
        scaleGridLineWidth: 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke: true,
        barStrokeWidth: 1,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
        maintainAspectRatio: false,
        datasetFill:false,
    };
    var canvas = $('#char-dashbroad').get(0).getContext('2d')
    var char = new Chart(canvas)
    char.Line(data, options)
});
</script>