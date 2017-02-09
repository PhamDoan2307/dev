<?php error_reporting(E_ALL & ~ E_NOTICE);
?>
<?php
Session_start();
require_once "../../Shareds/Utils.php";
require('../../Controls/QLPhone_ctrl.php');
Utils::check_login();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý điện thoại</title>
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
    <script type="text/javascript">
        function themmoi() {
            if (document.frmThem.txt_name.value=="") {
                alert('Bạn chưa nhập tên điện thoại');
                document.frmThem.txt_name.focus();
                return false;
            }
            if (document.frmThem.txt_price.value=="") {
                alert('Bạn chưa nhập giá bán');
                document.frmThem.txt_price.focus();
                return false;
            }
            if (document.frmThem.txt_number.value=="") {
                alert('Bạn chưa nhập số lượng');
                document.frmThem.txt_number.focus();
                return false;
            }
            if (document.frmThem.txt_khuyenmai.value=="") {
                alert('Bạn chưa thông tin khuyến mại');
                document.frmThem.txt_khuyenmai.focus();
                return false;
            }
            return true;
        }
        function confirm_del()
        {
            if(confirm("Bạn có chắc chắn xóa dữ liệu này không?") === true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    </script>
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
                <small><p style="color: green" disabled=""><?php
                        if(isset($_SESSION['err'])){
                            echo  $_SESSION['err'];
                            unset($_SESSION['err']);
                        }
                        ?></p>
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Quản lý loại điện thoại</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- general form elements -->
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cập nhật điện thoại</h3>
                            <div class="box-tools pull-right">

                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                <button class="btn btn-box-tool" disabled="" data-widget="remove"><i class="fa fa-remove"></i>
                                </button>

                            </div>
                        </div>

                        <!-- form start -->
                        <form role="form" name="frmThem" action="" method="post" enctype="multipart/form-data">

                            <div class="box-body">

                                <div class="form-group row">
                                    <label class="col-md-2">Tên điện thoại</label>
                                    <div class="col-md-10">
                                        <input placeholder="Tên điện thoại..." class="form-control" type="text" id="txt_name" name="txt_name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Tên loại điện thoại</label>
                                    <div class="col-md-10">
                                        <select class="col-md-12" name="slc_pID">
                                            <?php
                                            $ldt=quanlyldt();
                                            while($row_ldt=mysqli_fetch_array($ldt)){
                                                ?>
                                                <option value="<?php echo $row_ldt['pID'] ?>"><?php echo $row_ldt['pTypephone']?></option>
                                            <?php } ?></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Giá bán</label>
                                    <div class="col-md-10">
                                        <input placeholder="Giá bán..." class="form-control" type="text" id="txt_price" name="txt_price"  >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Trải ngiệm sản phẩm</label>
                                    <div class="col-md-10">
                                        <textarea  class="form-control"  id="editor2" name="txt_info" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Cấu hình chi tiết</label>
                                    <div class="col-md-10">
                                        <textarea placeholder="Nội dung..." class="form-control" id="editor1" name="txt_content"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">số lượng</label>
                                    <div class="col-md-10">
                                        <input placeholder="Số lượng..." class="form-control" type="text" id="txt_number" name="txt_number" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Ảnh mô tả</label>
                                    <div class="col-md-10">
                                        <input type="file" name="pImage" id="image_upload" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Trạng thái</label>
                                    <div class="col-md-10">
                                        <input type="radio" name="rd_status" checked="checked" value="1">Còn hàng  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="rd_status" value="0">Tạm hết hàng
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Thông tin khuyễn mại</label>
                                    <div class="col-md-10">
                                        <textarea  class="form-control"  id="editor2" name="txt_khuyenmai" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Đánh giá sản phẩm</label>
                                    <div class="col-md-10">
                                        <select class="col-md-12" name="slc_rate">
                                            <option value="1">1 sao</option>
                                            <option value="2">2 sao</option>
                                            <option value="3">3 sao</option>
                                            <option value="4">4 sao</option>
                                            <option value="5">5 sao</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <input class="btn btn-default pull-right" type="reset"  value="Hủy" onclick="cancel()" style="margin-left: 20px;">
                                <input class="btn btn-primary pull-right" onclick="return themmoi();" type="submit" name="btnThem" value="Thêm mới">
                            </div>
                        </form>
                    </div><!-- /.box -->
                    <!--            </div>-->
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dữ liệu bảng loại điện thoại</h3>
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
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên điện thoại</th>
                                    <th class="text-center">Loại điện thoại</th>
                                    <th class="text-center">Giá bán</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Ảnh mô tả</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Sửa</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php $stt = 1; ?>
                                    <?php
                                    $dt=quanlydt();
                                    while($row_dt=mysqli_fetch_array($dt)){
                                    ?>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $row_dt['pName']; ?></td>
                                    <td><?php echo $row_dt['pTypephone']; ?></td>
                                    <td><?php echo $row_dt['pPrice']; ?></td>
                                    <td><?php echo $row_dt['pNumber']; ?></td>
                                    <td class="img"><img width="70px" src="uploads/<?php echo $row_dt["pImage"];?>" /></td>
                                    <td><?php if($row_dt['pStatus1'] == 1){ echo "<span class='text-red'>Còn hàng</span>";}else{ echo "Tạm hết hàng"; }?></td>
                                    <td class="text-red"><a href="qlphone_sua.php?pIMEI=<?php echo $row_dt["pIMEI"];?>"><span class="text-red">Sửa</span></a></td>
                                    <td><a href="qlphone_xoa.php?pIMEI=<?php echo $row_dt["pIMEI"]; ?>" onclick=" return confirm_del()">Xóa</a></td>
                                </tr>
                                <?php $stt++; } ?>


                                </tbody>
                                <tfoot>
                                <tr class="info">
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên điện thoại</th>
                                    <th class="text-center">Loại điện thoại</th>
                                    <th class="text-center">Giá bán</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Ảnh mô tả</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Sửa</th>
                                    <th class="text-center">Xóa</th>

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
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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