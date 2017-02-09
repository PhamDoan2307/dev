<?php
require_once "../../Shareds/Utils.php";
Utils::check_login();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Trang Quản Trị Cửa Hàng</title>
        <link rel="stylesheet" href="file:///C|/xampp/htdocs/css/quanly.css">
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
</head>

<body class="hold-transition skin-blue sidebar-mini">
<header class="main-header">
    <!-- Logo -->
    <a href="quanly.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>VD</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Quản lý cửa hàng</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->

</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/USER_2.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="https://www.facebook.com/Rogers1.Steve"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

<div>
    <?php
    include "partial/menu_left.php";
    ?>
</div>
        </section>
    </aside>
<div class="content-wrapper">
    <td align="right" valign="top">
        <!-- Main Content -->
        <table width="1140px" id="main-content" border="0px" cellpadding="0px" cellspacing="0px">
            <tr id="main-navbar" height="36px">
                <td align="center">Giới thiệu cửa hàng điện thoại</td>
            </tr>
            <tr>
                <td align="justify" id="info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----------Chào mừng bạn đến với hệ thống quản trị website quản lý cửa hàng điện thoại --------<br> Đây là hệ thống giúp bạn quản lý tốt các thông tin về sản phẩm theo các tiêu chí như quản lý tài khoản,danh mục sản phẩm, theo sản phẩm,...<br> Ngoài ra hệ thống còn tích hợp công cụ soan thảo FCKEditor nhằm giúp người dùng thuận tiện trong việc soạn thảo bài mới và thục hiện công việc Upload hình ảnh. Ngoài ra, hệ thống còn dự định nâng cấp và hoàn thiện một số Module như Giỏ hàng, Thanh toán trực tuyến, So sánh sản phẩm, Nhận xét & đánh giá sản phẩm dạng sao,... trong các phiên bản kế tiếp.</td>
            </tr>
            <tr height="62px">
                <td id="footer" colspan="2" align="center" valign="middle">Copyright © 2016 <b>DaiHocXayDung</b>. All rights reserved.</td>
            </tr>
        </table>
        <!-- End Main Content -->
    </td>
</div>
</body>
</html>