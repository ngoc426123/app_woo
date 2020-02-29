<form action="<?php base_url("method/add"); ?>" method="post">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin phương thức</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Nội dung</label>
                                <input type="text" class="form-control" value="" name="content">
                            </div>
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" class="form-control" value="0" name="cost">
                            </div>
                            <div class="form-group">
                                <label for="">Ngày đăng</label>
                                <input type="text" class="form-control datepicker" value="<?php echo $current_date ?>" name="date" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <textarea name="note" id="" class="form-control textarea-method"></textarea>
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
