<form action="<?php base_url("menu/edit/".$menu["id"]); ?>" method="post">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin món</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" class="form-control" value="<?php echo $menu["code"]; ?>" name="code" readonly>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Tên món</label>
                                <input type="text" class="form-control" value="<?php echo $menu["name"]; ?>" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Ngày đăng</label>
                                <input type="text" class="form-control datepicker" value="<?php echo $menu["date"]; ?>" name="date" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Giá món</label>
                                <input type="text" class="form-control" value="<?php echo $menu["cost"]; ?>" name="cost">
                            </div>
                            <div class="form-group">
                                <label for="">Giảm giá</label>
                                <div class="input-df">
                                    <input type="checkbox" name="status" <?php echo ($menu["status"]==1)?"checked":"" ?> />
                                    <select name="type" id="" class="form-control">
                                        <option value="per"<?php echo ($menu["type"]=="per")?"selected":"" ?>>Giảm theo %</option>
                                        <option value="num"<?php echo ($menu["type"]=="num")?"selected":"" ?>>Giảm theo giá thực</option>
                                    </select>
                                    <input type="text" class="form-control" value="<?php echo $menu["promotion"]; ?>" name="promotion">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin hình ảnh</h3>
                </div>
                <div class="box-body">
                    <div class="img_menu">
                        <img src="<?php echo base_url($menu["image"]) ?>" alt="">
                        <input type="hidden" class="form-control" value="<?php echo $menu["image"]; ?>" name="image">
                        <button class="btn btn-block btn-default openUploadfile" type="button">Upload</button>
                    </div>
                    
                </div>
                <div class="box-footer">
                    <button class="pull-left btn btn-danger">Xóa</button>
                    <button class="pull-right btn btn-primary" type="submit" name="ok">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
</form>
