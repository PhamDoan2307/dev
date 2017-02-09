<?php error_reporting(E_ALL & ~ E_NOTICE);
?>
<?php
session_start();
require_once "../../Shareds/Utils.php";
require('../../Controls/QLKhuyenmai_ctrl.php');
Utils::check_login();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý khuyến mại</title>
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
            if (document.frmThem.txt_title.value=="") {
                alert('Bạn chưa nhập Tiêu đề khuyến mại');
                document.frmThem.txt_title.focus();
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
                        ?></p></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Quản lý khuyến mại</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- general form elements -->
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm mới khuyến mại</h3>
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
                                    <label class="col-md-2">Tiêu đề khuyến mại</label>
                                    <div class="col-md-10">
                                        <input placeholder="Tiêu đề khuyến mại..." class="form-control" type="text" id="txt_title" name="txt_title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Nội dung khuyến mại</label>
                                    <div class="col-md-10">
                                        <textarea placeholder="Nội dung khuyến mại..." class="form-control" id="editor1" name="txt_content" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Ngày bắt đầu</label>
                                    <div class="col-md-10">
                                        <input placeholder="Ngày bắt đầu..." class="form-control" type="date" id="txt_datestart" name="txt_datestart" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Ngày kết thúc</label>
                                    <div class="col-md-10">
                                        <input placeholder="Ngày kết thúc..." class="form-control" type="date" id="txt_dateend" name="txt_dateend" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Trạng thái</label>
                                    <div class="col-md-10">
                                            <input type="radio" name="rd_status" checked="checked" value="1">Đang khuyến mại  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" name="rd_status" value="0">Ngừng khuyến mại
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <input class="btn btn-default pull-right" type="button" value="Hủy" style="margin-left: 20px;">
                                <input class="btn btn-primary pull-right" onclick="return themmoi()" type="submit" name="btnThem" value="Thêm mới"></td>
                            </div>
                        </form>
                    </div><!-- /.box -->
                    <!--            </div>-->
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dữ liệu bảng khuyến mại</h3>
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
                                    <th>Tiêu đề khuyến mại</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bắt đầu</th>
                                   <th>Ngày kết thúc</th>
                                    <th>Trạng thái</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php $stt = 1; ?>
                                    <?php
                                    $km=getAllKM();
                                    while($row_km=mysqli_fetch_array($km)){
                                    ?>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $row_km['kTitle']; ?></td>
                                    <td><?php echo $row_km['kContent']; ?></td>
                                    <td><?php echo $row_km['kDateStart']; ?></td>
                                    <td><?php echo $row_km['kDateEnd']; ?></td>
                                    <td><?php if($row_km['kStatus'] == 1){ echo "<span class='text-red'>Đang khuyến mại</span>";}else{ echo "Ngừng khuyến mại"; }?></td>
                                    <td class="text-red"><a href="qlkhuyenmai_sua.php?kID=<?php echo $row_km["kID"];?>"><span class="text-red">Sửa</span></a></td>
                                    <td><a href="qlkhuyenmai_xoa.php?kID=<?php echo $row_km["kID"]; ?>" onclick="confirm_del()">Xóa</a></td>
                                </tr>
                                <?php $stt++; } ?>


                                </tbody>
                                <tfoot>
                                <tr class="info">
                                    <th>STT</th>
                                    <th align="center">Tiêu đề khuyến mại</th>
                                    <th>Nội dung</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái</th>
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>

</body>
</html>