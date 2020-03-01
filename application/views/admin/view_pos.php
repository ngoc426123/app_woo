<form action="<?php base_url("pos"); ?>" method="post">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Bảng hiệu chỉnh pos</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <table class="table">
                        <thead>
                            <tr class="success">
                                <th class="whs">Stt</th>
                                <th class="whs">Hình</th>
                                <th class="whs">Món</th>
                                <th class="text-right whs">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($list_menu as $key => $value) {
                            $stt = $key + 1;
                        ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td>
                                    <div class="img-pos"><img src="<?php echo base_url($value["image"]); ?>" alt=""></div>
                                </td>
                                <td>
                                    <div><b><?php echo $value["name"] ?></b></div>
                                    <div><?php echo number_format($value['cost'],0,'','.') ?> vnđ</div>
                                    <?php
                                    if($value["status"]==1){
                                        $pr = ($value["type"] == "per")?"- ".$value["promotion"]."%":"- ".number_format($value["promotion"],0,'','.')." vnđ";
                                    ?>
                                        <small class="text-mute"><?php echo $pr; ?></small>
                                    <?php
                                    }
                                    ?>
                                    
                                </td>
                                <td class="text-right">
                                <?php
                                $boo=false;
                                foreach ($pos as $ps) {
                                    if($ps["field"] == "menu"){
                                        if($ps["id_rel"] == $value["id"]){
                                            $boo=true;
                                            break;
                                        }
                                    }
                                }
                                ?>
                                    <input icheck type="checkbox" name="menu[]" value="<?php echo $value["id"] ?>" <?php echo ($boo==true)?"checked":"" ?> />
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <table class="table">
                        <thead>
                            <tr class="success">
                                <th class="whs">Nội dung</th>
                                <th class="whs">Giá</th>
                                <th class="text-right whs">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach ($list_method as $value) {
                        ?>
                            <tr>
                                <td><?php echo $value["content"] ?></td>
                                <td class="whs">+ <?php echo number_format($value['cost'],0,'','.') ?> vnđ</td>
                                <td class="text-right">
                                <?php
                                $boo=false;
                                foreach ($pos as $ps) {
                                    if($ps["field"] == "method"){
                                        if($ps["id_rel"] == $value["id"]){
                                            $boo=true;
                                            break;
                                        }
                                    }
                                }
                                ?>
                                    <input icheck type="checkbox" name="method[]" value="<?php echo $value["id"] ?>" <?php echo ($boo==true)?"checked":"" ?> />
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <table class="table">
                        <thead>
                            <tr class="success">
                                <th class="whs">Nội dung</th>
                                <th class="whs">Giảm giá</th>
                                <th class="text-right whs">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach ($list_promotion as $value) {
                        ?>
                            <tr>
                                <td><?php echo $value["content"] ?></td>
                                <td class="whs"><?php echo ($value["type"] == "per")?"- ".$value["promotion"]."%":"- ".number_format($value["promotion"],0,'','.')." vnđ" ?></td>
                                <td class="text-right">
                                <?php
                                $bo2=false;
                                foreach ($pos as $ps) {
                                    if($ps["field"] == "promotion"){
                                        if($ps["id_rel"] == $value["id"]){
                                            $bo2=true;
                                            break;
                                        }
                                    }
                                }
                                ?>
                                    <input icheck type="checkbox" name="promotion[]" value="<?php echo $value["id"] ?>" <?php echo ($bo2==true)?"checked":"" ?> />
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
        <div class="box-footer">
            <button class="pull-right btn btn-primary" type="submit" name="ok">Đồng ý</button>
        </div>
    </div>
</form>
