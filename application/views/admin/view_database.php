<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Bảng database</h3>
        <div class="box-tools pull-right">
            <a href="<?php echo base_url("database/backup"); ?>" class="btn btn-sm btn-success">Backup Database</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên bảng</th>
                            <th>Trường</th>
                            <th>Số lượng record</th>
                            <th class="text-right">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list_tables as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $key; ?></td>
                            <td>
                            <?php
                            foreach ($value["field"] as $k => $v) {
                            ?>
                                <div><small><?php echo $v; ?></small></div>
                            <?php
                            }
                            ?>
                            </td>
                            <td><?php echo $value["record"]; ?></td>
                            <td class="text-right">
                                <a href="<?php echo base_url("database/emptytable/{$key}"); ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                <a href="<?php echo base_url("database/optimizetable/{$key}"); ?>" class="btn btn-xs btn-primary"><i class="fa fa-repeat"></i></a>
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
</div>