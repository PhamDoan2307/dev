<!DOCTYPE html>
<?php
error_reporting(E_ALL & E_WARNING);
require_once '../../Controls/TrangChu_ctrl.php';
if(isset($_GET['p'])){
	$p=$_GET['p'];
}
else
{
	$p="";
}
?>
<html>
    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Title -->
        <title>Cửa hàng điện thoại</title>
        
		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,900,700italic,500italic' rel='stylesheet' type='text/css'>
		
        <!-- Stylesheets -->
<!--		<link href="css/tragop.css" rel="stylesheet">-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/perfect-scrollbar.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/fontello.css">
   		<link rel="stylesheet" href="css/animation.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/owl.theme.css">
		<link rel="stylesheet" href="css/chosen.css">
        
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<link rel="stylesheet" href="css/ie.css">
        <![endif]-->
		<!--[if IE 7]>
			<link rel="stylesheet" href="css/fontello-ie7.css">
		<![endif]-->
	</head>
    <body>
		<!-- Container -->
		<div class="container">
			
			<!-- Header -->
			<header class="row">
				<?php
				require ('Block/Header.php');
				?>
			</header>
			<!-- /Header -->
			
			<!-- Content -->
			<div class="row content">
				
                
                <!-- Slider -->
<!--                <section class="slider col-lg-12 col-md-12 col-sm-12">-->
<!--                    <div class="flexslider flexsliderBig">-->
<!--                        <ul class="slides">-->
<!--							--><?php
//							$banner=banner();
//							while($row_banner=mysqli_fetch_array($banner)){
//							?>
<!--                            <li id="slide1">-->
<!--								<div class = "text">-->
<!--									-->
<!--									<div class = "bg"></div>-->
<!--									-->
<!--									<div class = "title">-->
<!--										<h2><strong>--><?php //echo $row_banner['pName'] ?><!--</strong></h2>-->
<!--									</div>-->
<!--									-->
<!--									<div class = "desc">-->
<!--										<h3>--><?php //echo $row_banner['pInfo'] ?><!--</h3>-->
<!--										<span>Chỉ từ <span class="price">--><?php //echo number_format($row_banner['pPrice']) ?><!-- VNĐ</span></span>-->
<!--									</div>-->
<!--									-->
<!--									<div class = "button">-->
<!--										<a class="button big red" href="#">Xem chi tiết</a>-->
<!--									</div>-->
<!---->
<!--								</div>-->
<!--                            </li>-->
<!--							--><?php //} ?>
<!--                        </ul>-->
<!--                    </div>-->
<!--                </section>-->
                <!-- /Slider -->
                <!-- Banner -->
				<section class="banner col-lg-12 col-md-12 col-sm-12">
					
					<div class="left-side-banner banner-item icon-on-right gray">
						<h4>0166 871 8567</h4>
						<p>Thứ 2 - Thứ 7: 8h - 17h </p>
						<i class="icons icon-phone-outline"></i>
					</div>
					
					<a href="#">
					<div class="middle-banner banner-item icon-on-left light-blue">
						<h4>Miễn phí ship</h4>
						<p>cho đơn hàng trên 10 triệu</p>
						<span class="button">Chi tiết</span>
						<i class="icons icon-truck-1"></i>
					</div>
					</a>
					
					<a href="#">
					<div class="right-side-banner banner-item orange">
						<h4>Luôn cập nhật sản phẩm</h4>
						<p>Tha hồ chọn lựa</p>
					</div>
					</a>
					
				</section>
				<!-- /Banner -->
                
                
                
				<!-- Main Content -->
					<!-- Featured Products -->

					<?php
					switch($p){
						case 'chitietsp':
							require 'pages/chitietsp.php';
							break;
						case 'danhsachsp':
							require 'pages/danhsachsanpham.php';
							break;
						case 'giohang':
							require 'pages/giohang.php';
							break;
						case 'muahang' :
							require 'pages/muahang.php';
							break;
						case 'timkiem':
							require 'pages/timkiem.php';
							break;
						case 'thongbao':
							require 'pages/thongbao.php';
							break;
						case 'max2trieu':
							require 'pages/max2trieu.php';
							break;
						case 'max3trieu':
							require 'pages/max3trieu.php';
							break;
						case 'max4trieu':
							require 'pages/max4trieu.php';
							break;
						case 'max5trieu':
							require 'pages/max5trieu.php';
							break;
						case 'max10trieu':
							require 'pages/max10trieu.php';
							break;
						case 'min10trieu':
							require 'pages/min10trieu.php';
							break;
						case 'muahangonline':
							require 'pages/muahangonline.php';
							break;
						case 'tragop':
							require 'pages/tragop.php';
							break;
						case 'khuyenmai':
							require 'pages/khuyenmai.php';
							break;
						default :
							require 'pages/trangchu.php';
							break;
					}

					?>
				<!-- /Main Content -->

				<!-- Sidebar -->
				<aside class="sidebar right-sidebar col-lg-3 col-md-3 col-sm-3">
<!--					menu_phải-->
					<?php require 'Block/cot_phai.php'?>
				</aside>
				<!-- /Sidebar -->
				
			</div>
			<!-- /Content -->
			<!-- Footer -->
			<footer id="footer" class="row">
				
				
				
				<!-- Main Footer -->
				<?php require 'Block/footer.php'?>
				<!-- /Main Footer -->
			</footer>
			<!-- Footer -->
			
            
            <div id="back-to-top">
            	<i class="icon-up-dir"></i>
            </div>
            
		</div>
    	<!-- Container -->
		
		
		
		<!-- JavaScript -->
		<script src="js/modernizr.min.js"></script>
		<script src="js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.raty.min.js"></script>
		
		<!-- Scroll Bar -->
		<script src="js/perfect-scrollbar.min.js"></script>
		
		<!-- Cloud Zoom -->
		<script src="js/zoomsl-3.0.min.js"></script>
		
		<!-- FancyBox -->
		<script src="js/jquery.fancybox.pack.js"></script>
		
		<!-- jQuery REVOLUTION Slider  -->
		<script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
		<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

		<!-- FlexSlider -->
		<script defer src="js/flexslider.min.js"></script>
		
		<!-- IOS Slider -->
		<script src = "js/jquery.iosslider.min.js"></script>
		
		<!-- noUi Slider -->
		<script src="js/jquery.nouislider.min.js"></script>
		
		<!-- Owl Carousel -->
		<script src="js/owl.carousel.min.js"></script>
		
		<!-- Cloud Zoom -->
		<script src="js/zoomsl-3.0.min.js"></script>
		
		<!-- SelectJS -->
        <script src="js/chosen.jquery.min.js" type="text/javascript"></script>
        
        <!-- Main JS -->
        <script defer src="js/bootstrap.min.js"></script>
        <script src="js/main-script.js"></script>
        

		
    </body>
    
</html>