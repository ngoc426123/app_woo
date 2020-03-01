<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title_page; ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/bower_components/font-awesome/css/font-awesome.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") ?> ">
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/plugins/iCheck/all.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/plugins/alertifyjs/css/alertify.css"); ?>" >
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/plugins/alertifyjs/css/themes/default.css"); ?>" >
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/dist/css/AdminLTE.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("AdminLTE/dist/css/skins/_all-skins.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("tmp/css/style_print.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("tmp/css/custom.css") ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper areaAdmin">
        <header class="main-header">
            <a href="<?php echo base_url("dashbroad"); ?>" class="logo">
                <span class="logo-mini"><b>A</b></span>
                <span class="logo-lg"><b>Admin</b> LCF</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a target="_blank" href="<?php echo base_url("banhang") ?>"><i class="fa fa-sign-in"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu chức năng</li>
                    <li><a href="<?php echo base_url("dashbroad") ?>"><i class="fa fa-dashboard"></i><span>Bảng tổng quan</span></a></li>
                    <li><a href="<?php echo base_url("pos") ?>"><i class="fa fa-shopping-cart"></i><span>Quản lý POS</span></a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-coffee"></i><span>Quản lý món</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url("menu") ?>"><i class="fa fa-circle-o"></i> Danh sách món</a></li>
                            <li><a href="<?php echo base_url("menu/add") ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-drivers-license-o"></i><span>Quản lý giảm giá</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url("promotion") ?>"><i class="fa fa-circle-o"></i> Danh sách giảm giá</a></li>
                            <li><a href="<?php echo base_url("promotion/add") ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-truck"></i><span>Quản lý phương thức</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url("method") ?>"><i class="fa fa-circle-o"></i> Danh sách phương thức</a></li>
                            <li><a href="<?php echo base_url("method/add") ?>"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url("bill") ?>"><i class="fa fa-file-text"></i><span>Quản lý hóa đơn</span></a></li>
                    <!-- <li><a href="<?php echo base_url("reset") ?>"><i class="fa fa-repeat"></i><span>Reset</span></a></li> -->
                </ul>
            </section>
        </aside>
        <div class="content-wrapper">
            <section class="content-header">
                <h1><?php echo $title_page; ?><small></small></h1>
            </section>
            <section class="content">
                <?php
                if(isset($alert)){alert($alert["stt"],$alert["title"],$alert["content"]);}
                $this->load->view('admin/'.$view_page);
                ?>
            </section>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs"><b>Version</b> 1.0.0</div>
            <strong>Copyright &copy; 2020 <a href="#">La Coffee & Flower</a></strong>.
        </footer>
    </div>
    <div class="areaPrint"></div>
    <!-- ./wrapper -->
    <script src="<?php echo base_url("AdminLTE/bower_components/jquery/dist/jquery.min.js") ?>"></script>
    <script src="<?php echo base_url("AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
    <script src="<?php echo base_url("AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") ?>"></script>
    <script src="<?php echo base_url("AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js") ?>"></script>
    <script src="<?php echo base_url("AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script>
    <script src="<?php echo base_url("AdminLTE/plugins/iCheck/icheck.min.js") ?>"></script>
    <script src="<?php echo base_url("AdminLTE/plugins/alertifyjs/alertify.js"); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url("AdminLTE/dist/js/adminlte.min.js") ?>"></script>
    <script src="<?php echo base_url("ckfinder/ckfinder.js") ?>"></script>
    <script src="<?php echo base_url("tmp/js/custom.js") ?>"></script>
    <script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    </script>
</body>
</html>