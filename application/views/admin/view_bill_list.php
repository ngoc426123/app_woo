<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Bảng hóa đơn</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="datatable2" class="table table-bill">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Nội dung</th>
                        <th>Tổng giá</th>
                        <th>Thanh toán</th>
                        <th>Thời gian</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list_bill as $value) {
                    $day = (count($value["day"])==1)?("0".$value["day"]):($value["day"]);
                    $month = (count($value["month"])==1)?("0".$value["month"]):($value["month"]);
                    $list_menu = json_decode($value["content"])->content;
                ?>
                    <tr>
                        <td><?php echo $value["code"] ?></td>
                        <td class="active">
                        <?php
                        foreach ($list_menu as $menu) {
                        ?>
                            <div class="item">
                                <div>
                                    <div><?php echo $menu->pos ?> <b>x<?php echo $menu->quantity ?></b></div>
                                    <div><small><?php echo number_format($menu->price,0,'','.') ?> vnđ</small></div>
                                </div>
                                <div><?php echo number_format($menu->total,0,'','.') ?> vnđ</div>
                            </div>
                        <?php
                        }
                        ?>
                        </td>
                        <td class="success"><?php echo number_format($value["total"],0,'','.') ?> vnđ</td>
                        <td class="warning"><?php echo number_format($value["pay"],0,'','.') ?> vnđ</td>
                        <td><?php echo $value["time"]." ".$day."/".$month."/".$value["year"] ?></td>
                        <td>
                            <button class="btn btn-xs btn-primary btn-print" data-bill='<?php echo $value["content"] ?>'><i class="fa fa-print"></i></button>
                        </td>
                    </tr>
                <?php
                }
                ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>
