<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Danh sách món</h3>
        <div class="box-tools pull-right">
            <a href="<?php echo base_url("menu/add") ?>" class="btn btn-sm btn-success">Thêm món</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Hình</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>TT giảm giá</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list_menu as $value) {
                ?>
                    <tr>
                        <td><?php echo $value["id"] ?></td>
                        <td><?php echo $value["code"] ?></td>
                        <td><div class="img-table-menu"><img src="<?php echo base_url($value["image"]) ?>" alt=""></div></td>
                        <td><?php echo $value["name"] ?></td>
                        <td><?php echo $value["cost"] ?> vnđ</td>
                        <td><?php echo ($value["type"] == "per")?"- ".$value["promotion"]."%":"- ".$value["promotion"]."vnđ" ?></td>
                        <td><?php echo ($value["status"]=="1")?"<label class='label label-success'>Đang bật</label>":"<label class='label label-default'>Đang tắt</label>" ?></td>
                        <td><a href="<?php echo base_url("menu/edit/".$value["id"]) ?>" class="btn btn-xs btn-primary"><i class="fa fa-cog"></i></a></td>
                    </tr>
                <?php
                }
                ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>