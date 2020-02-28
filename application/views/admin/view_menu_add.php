<form action="<?php base_url("menu/add"); ?>" method="post">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin món</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Code</label>
                        <input type="text" class="form-control" value="<?php echo get_code_menu(); ?>" name="code" readonly>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Tên món</label>
                                <input type="text" class="form-control" value="" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Ngày đăng</label>
                                <input type="text" class="form-control" value="" name="date">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="">Giá món</label>
                                <input type="text" class="form-control" value="" name="cost">
                            </div>
                            <div class="form-group">
                                <label for="">Giảm giá</label>
                                <div class="input-df">
                                    <input type="checkbox" name="status">
                                    <select name="type" id="" class="form-control">
                                        <option value="per">Giảm theo %</option>
                                        <option value="num">Giảm theo giá thực</option>
                                    </select>
                                    <input type="text" class="form-control" value="0" name="promotion">
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
                        <img src="<?php echo base_url("tmp/images/download.png") ?>" alt="">
                        <input type="hidden" class="form-control" value="" name="image">
                        <button class="btn btn-block btn-default openCkFinder" type="button">Upload</button>
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
