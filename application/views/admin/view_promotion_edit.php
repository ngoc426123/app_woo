<form action="<?php base_url("menu/edit/".$promotion["id"]); ?>" method="post">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin giảm giá</h3>
                </div>
                <div class="box-body">
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Code</label>
                                <input type="text" class="form-control" value="<?php echo $promotion["code"] ?>" name="code" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <input type="text" class="form-control" value="<?php echo $promotion["content"] ?>" name="content">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Ngày đăng</label>
                                <input type="text" class="form-control datepicker" value="<?php echo $promotion["date"] ?>" name="date" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="">Giảm giá</label>
                                <div class="input-df">
                                    <select name="type" id="" class="form-control">
                                        <option value="per" <?php echo ($promotion["type"]=="per")?"selected":"" ?>>Giảm theo %</option>
                                        <option value="num" <?php echo ($promotion["type"]=="num")?"selected":"" ?>>Giảm theo giá thực</option>
                                    </select>
                                    <input type="text" class="form-control" value="<?php echo $promotion["promotion"] ?>" name="promotion">
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
                    <h3 class="box-title">Công cụ</h3>
                </div>
                <div class="box-body">
                    <button class="pull-left btn btn-danger">Xóa</button>
                    <button class="pull-right btn btn-primary" type="submit" name="ok">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
</form>
