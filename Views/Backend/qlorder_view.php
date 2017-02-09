<?php error_reporting(E_ALL & ~ E_NOTICE);
?>
<?php
session_start();
require_once "../../Shareds/Utils.php";
require('../../Controls/QLOrder_ctrl.php');
Utils::check_login();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý hóa đơn</title>
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
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!--    <link rel="stylesheet" href="../../css/site.css">-->
    <script language='javascript'>
        function huyDdh(){
            var conf=confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');
            return conf;
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

                    <a href="logout.php" class="text-warning">Đăng xuất</a>
                </div>
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
                <small><p align="center" style="color: green;" id="lbl_show_msg">
                        <?php
                        if (isset($_SESSION["err"])) {
                            echo $_SESSION["err"];
                            unset($_SESSION["err"]);
                        }
                        ?>
                    </p></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Quản lý hóa đơn</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- general form elements --><!-- /.box -->
                    <!--            </div>-->
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dữ liệu bảng hóa đơn</h3>
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
                                    <th>Tên khách hàng</th>
                                    <th>Nơi nhận</th>
                                    <th>Ngày lập</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th>Chi tiết</th>
                                    <th>Hủy</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php $stt = 1; ?>
                                    <?php
                                    $order=quanlyhoadon();
                                    while($row_order=mysqli_fetch_array($order)){
                                    ?>
                                    <td><?php echo $stt; ?></td>
                                    <td><?php echo $row_order['cName']; ?></td>
                                    <td><?php echo $row_order['cAdd']; ?></td>
                                    <td><?php echo $row_order['oDate']; ?></td>
                                    <td><?php echo $row_order['tStatus'] ?></td>
                                    <td><?php echo number_format($row_order['oPay']); ?> VNĐ</td>
                                    <td class="text-red"><a href="qlchitiethd.php?oID=<?php echo $row_order["oID"];?>"><span class="text-red">Chi tiết hóa đơn</span></a></td>
                                    <td class="text-red"><a onclick="return huyDdh()" href="qlorder_xoa.php?oID=<?php echo $row_order["oID"];?>"><span class="text-red">Hủy đơn hàng</span></a></td>
                                </tr>
                                <?php $stt++; } ?>
                                </tbody>
                                <tfoot>
                                <tr class="info">
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Nơi nhận</th>
                                    <th>Ngày lập</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th>Chi tiết</th>
                                    <th>Hủy</th>

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