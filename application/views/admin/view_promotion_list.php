<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Danh sách giảm giá</h3>
        <div class="box-tools pull-right">
            <a href="<?php echo base_url("promotion/add") ?>" class="btn btn-sm btn-success">Thêm giảm giá</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Nội dung</th>
                        <th>Ngày tạo</th>
                        <th>Giảm giá</th>
                        <th class="text-right">Công cụ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list_promotion as $value) {
                ?>
                    <tr>
                        <td><?php echo $value["id"] ?></td>
                        <td><?php echo $value["code"] ?></td>
                        <td><?php echo $value["content"] ?></td>
                        <td><?php echo $value["date"] ?></td>
                        <td><?php echo ($value["type"] == "per")?"- ".$value["promotion"]."%":"- ".number_format($value["promotion"],0,'','.')." vnđ" ?></td>
                        <td class="text-right"><a href="<?php echo base_url("promotion/edit/".$value["id"]) ?>" class="btn btn-xs btn-primary"><i class="fa fa-cog"></i></a></td>
                    </tr>
                <?php
                }
                ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>