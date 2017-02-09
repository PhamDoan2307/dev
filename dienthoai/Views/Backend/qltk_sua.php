<?php error_reporting(E_ALL & ~ E_NOTICE);
?>
<?php
require_once "../../Shareds/Utils.php";
require('../../Controls/QLTK_ctrl.php');
Utils::check_login();
$uID=$_GET['uID'];
$row_update=update_user($uID);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý tài khoản</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--    <link rel="stylesheet" href="../../css/site.css">-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="quanly.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>VD</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Quản lý</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p class="text-red"><?php echo $_SESSION["uUser"]?></p>
                    <a href="logout.php" class="text-warning">Đăng xuất</a></div>
            </div>
            <!-- search form -->

            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
            include "partial/menu_left.php";
            ?>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý dữ liệu
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Quản lý tài khoản</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- general form elements -->
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập nhật tài khoản</h3>
                            <div class="box-tools pull-right">

                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                <button class="btn btn-box-tool" disabled="" data-widget="remove"><i class="fa fa-remove"></i>
                                </button>

                            </div>
                        </div>

                        <!-- form start -->
                        <form role="form" action="" method="post" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group row">
                                    <label class="col-md-2">Tên tài khoản</label>
                                    <div class="col-md-10">
                                        <input placeholder="Tài khoản..." class="form-control" type="text" id="txt_user" name="txt_user" value="<?php echo $row_update['uUser']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Mật khẩu</label>
                                    <div class="col-md-10">
                                        <input placeholder="Mật khẩu..." class="form-control" type="text" id="txt_pass" name="txt_pass" value="<?php echo $row_update['uPass']?>" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Tên người dùng</label>
                                    <div class="col-md-10">
                                        <input placeholder="Tên người dùng..." class="form-control" type="text" id="txt_name" name="txt_name" value="<?php echo $row_update['uName']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Số điện thoại</label>
                                    <div class="col-md-10">
                                        <input placeholder="Số điện thoại..." class="form-control" type="text" id="txt_phone" name="txt_phone" value="<?php echo $row_update['uPhone']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Địa chỉ</label>
                                    <div class="col-md-10">
                                        <input placeholder="Địa chỉ..." class="form-control" type="text" id="txt_add" name="txt_add" value="<?php echo $row_update['uAdd']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Email</label>
                                    <div class="col-md-10">
                                        <input placeholder="Email..." class="form-control" type="text" id="txt_mail" name="txt_mail" value="<?php echo $row_update['uMail']?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2">Trạng thái</label>
                                    <div class="col-md-10">
                                        <input type="radio" name="rd_status" id="rd_status1" <?php if($row_update['uStatus']==1) echo "checked='checked'";?> value="1">Đang hoạt động  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="rd_status" id="rd_status0" <?php if($row_update['uStatus']==0) echo "checked='checked'";?> value="0">Ngưng hoạt động
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Quyền quản trị</label>
                                    <div class="col-md-10">
                                        <input type="radio" name="rd_admin" <?php if($row_update['uAdmin']==1) echo "checked='checked'";?> value="1">Admin  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="rd_admin" <?php if($row_update['uAdmin']==0) echo "checked='checked'";?> value="0">Member
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <input class="btn btn-default pull-right" type="reset"  value="Hủy" onclick="cancel()" style="margin-left: 20px;">
                                <input class="btn btn-primary pull-right" type="submit" name="btnSua" value="Cập nhật">
                            </div>
                        </form>
                    </div><!-- /.box -->
                    <!--            </div>-->
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dữ liệu bảng tài khoản</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                <button class="btn btn-box-tool" disabled="" data-widget="remove"><i class="fa fa-remove"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class=" table table-bordered table-striped">
                                <thead>
                                <tr class="info">
                                    <th>STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Mật khẩu</th>
                                    <th>Tên người dùng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Quyền</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php $stt = 1; ?>
                                    <?php
                                    $taikhoan=quanlytaikhoan();
                                    while($row_tk=mysqli_fetch_array($taikhoan)){
                                    ?>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $row_tk['uUser']; ?></td>
                                    <td><?php echo $row_tk['uPass']; ?></td>
                                    <td><?php echo $row_tk['uName']; ?></td>
                                    <td><?php echo $row_tk['uPhone']; ?></td>
                                    <td><?php echo $row_tk['uAdd']; ?></td>
                                    <td><?php echo $row_tk['uMail']; ?></td>
                                    <!--                                    <td class="img"><img width="70px" src="../anh_mo_ta/--><?php //echo $items["pImage"];?><!--" /></td>-->
                                    <td><?php if($row_tk['uStatus'] == 1){ echo "<span class='text-red'>Dang hoat dong</span>";}else{ echo "Ngung hoat dong"; }?></td>
                                    <td><?php if($row_tk['uAdmin'] == 1){ echo "<span class='text-red'>Admin</span>";}else{ echo "Member"; }?></td>
                                    <td class="text-red"><a href="qltk_sua.php?uID=<?php echo $row_tk["uID"];?>"><span class="text-red">Sửa</span></a></td>
                                    <td><a href="qltk_xoa.php?uID=<?php echo $row_tk["uID"];?>">Xóa</a></td>
                                </tr>
                                <?php $stt++; } ?>


                                </tbody>
                                <tfoot>
                                <tr class="info">
                                    <th>STT</th>
                                    <th>Tên tài khoản</th>
                                    <th>Mật khẩu</th>
                                    <th>Tên người dùng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Quyền</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

        </section><!-- /.content -->
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Công ty</b> Apple
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://thegioididong.com">Cửa hàng điện thoại</a>.</strong> All rights
        reserved.
    </footer>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->
            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<!--    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
<!-- FastClick -->
<!--    <script src="plugins/fastclick/fastclick.js"></script>-->
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable(
            {
                "searching": true,
            }
        );
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>