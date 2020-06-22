<div class="box">
    <div class="box-body">
        <div class="table-responsive">
            <div class="table-responsive table-image">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="50">STT</th>
                            <th>Hình</th>
                            <th class="text-right">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($images as $key => $value) {
                        $index = $key + 1;
                    ?>
                        <tr>
                            <td><?php echo $index; ?></td>
                            <td><img src="<?php echo base_url("upload/{$value}"); ?>" alt=""></td>
                            <td class="text-right">
                                <a href="<?php echo base_url("upload/{$value}"); ?>" download class="btn btn-xs btn-success"><i class="fa fa-download"></i></a>
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