<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Danh sách phương thức</h3>
        <div class="box-tools pull-right">
            <a href="<?php echo base_url("method/add") ?>" class="btn btn-sm btn-success">Thêm phương thức</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nội dung</th>
                        <th>Giá</th>
                        <th>Ngày tạo</th>
                        <th>Ghi chú</th>
                        <th class="text-right">Công cụ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list_method as $value) {
                ?>
                    <tr>
                        <td><?php echo $value["id"] ?></td>
                        <td><?php echo $value["content"] ?></td>
                        <td>+ <?php echo number_format($value["cost"],0,'','.') ?> vnđ</td>
                        <td><?php echo $value["date"] ?></td>
                        <td><?php echo $value["note"] ?></td>
                        <td class="text-right"><a href="<?php echo base_url("method/edit/".$value["id"]) ?>" class="btn btn-xs btn-primary"><i class="fa fa-cog"></i></a></td>
                    </tr>
                <?php
                }
                ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>