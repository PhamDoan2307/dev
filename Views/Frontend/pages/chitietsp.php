
<?php
session_start();
$pIMEI=$_GET['pIMEI'];
$chitietsp=chitiet_sp($pIMEI);
$row_chitietsp=mysqli_fetch_array($chitietsp);
?>
<?php
if(isset($_POST['btnThem'])) {
    $name = $_POST['txt_ten'];
    $content = $_POST['txt_content'];
    if (intval($_GET['pIMEI'])) {
        $r = "insert into comment_lbl(cmName,pIMEI,cmContent) VALUES ('$name','" . intval($_GET['pIMEI']) . "','$content')";
        mysqli_query(connectDB(), $r);
        $_SESSION['err']="Cám ơn bạn đã góp ý";
    }
}
?>
<div class="row content">


    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="breadcrumbs">
            <?php
            $ten=laytenlsp_sp($pIMEI);
            $row_ten=mysqli_fetch_array($ten);
            ?>
            <p><a href="index.php">Trang chủ</a>
                <i class="icons icon-right-dir"></i><a href="index.php?p=danhsachsp&pID=<?php echo $row_chitietsp['pID'] ?>">
                    <?php echo $row_ten['pTypephone'] ?></a> <i class="icons icon-right-dir"></i><?php echo $row_ten['pName'] ?></p>
            <p style="color: green" disabled=""><?php
                if(isset($_SESSION['err'])){
                    echo  $_SESSION['err'];
                    unset($_SESSION['err']);
                }
                ?></p>
        </div>
    </div>


    <!-- Main Content -->
    <section class="main-content col-lg-9 col-md-9 col-sm-9">


        <div id="product-single">

            <!-- Product -->
            <div class="product-single">

                <div class="row">

                    <!-- Product Images Carousel -->
                    <div class="col-lg-5 col-md-5 col-sm-5 product-single-image">
                        <div id="product-slider">
                            <ul class="slides">
                                <li>
                                    <img class="cloud-zoom" src="../Backend/uploads/<?php echo $row_chitietsp['pImage'] ?>" data-large="images/<?php echo $row_chitietsp['pImage'] ?>" alt="" />
                                    <a class="fullscreen-button" href="images/<?php echo $row_chitietsp['pImage'] ?>">
                                        <div class="product-fullscreen">
                                            <i class="icons icon-resize-full-1"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /Product Images Carousel -->
                    <div class="col-lg-7 col-md-7 col-sm-7 product-single-info">

                        <h2><?php echo $row_chitietsp['pName'] ?></h2>
                        <div class="rating-box">
                            <div class="rating readonly-rating" data-score="<?php echo $row_chitietsp['pRate'] ?>"></div>
                            <h1><strong><?php if($row_chitietsp['pStatus1']==1)echo "Còn hàng"; else echo "Hết hàng" ?></strong>
                        </div>
                        <table>
                            <?php echo $row_chitietsp['pKhuyenMai'] ?>
                        </table>
                        <span class="price"><?php echo number_format($row_chitietsp['pPrice'])?> VNĐ</span>

                        <table class="product-actions-single">
                            <tr>
                                <td>
                                    <a href="pages/themhang.php?pIMEI=<?php echo $row_chitietsp['pIMEI']; ?>">
													<span class="add-to-cart">
														<span class="action-wrapper">
															<i class="icons icon-basket-2"></i>
															<span class="action-name">Thêm vào giỏ hàng</span>
														</span >
													</span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /Product -->


            <!-- Product Tabs -->
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="tabs">

                        <div class="tab-heading">
                            <a href="#tab1" class="button big">Chi tiết cấu hình</a>
                            <a href="#tab2" class="button big">Trải nghiệm sản phẩm</a>
                            <a href="#tab3" class="button big">Bình luận</a>
                        </div>

                        <div class="page-content tab-content">

                            <div id="tab1">
                                <?php echo $row_chitietsp['pCauhinh'] ?>
                            </div>

                            <div id="tab2">

                               <?php echo $row_chitietsp['pInfo'] ?>
                            </div>

                            <div id="tab3">
                                <ul class="comments">
                                    <?php $comment=binhluan_by_pIMEI($pIMEI);
                                    while($row_comment=mysqli_fetch_array($comment)){
                                    ?>
                                    <li>
                                        <p><strong><a href="#"><?php echo $row_comment['cmName'] ?></a></strong></p>
                                        <span class="date"><?php echo $row_comment['cmDate'] ?></span>
                                        <i class="icons icon-reply"></i>
                                        <p><?php echo $row_comment['cmContent'] ?></p>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <br/><br/>
                                <div class="row">
                                    <form action="" name="frmThem" method="post">
                                    <div class="col-lg-6 col-md-6 col-sm-8">
                                        <h3>Thêm bình luận</h3>
                                        <label>Tên (required)</label>
                                        <input type="text" name="txt_ten">
                                        <br><br>
                                        <label>E-mail (required, but will not display)</label>
                                        <input type="text" name="txt_mail">
                                        <br><br>
                                        <label>Website (required)</label>
                                        <input type="text">
                                        <br><br>
                                        <label>Nội dung (required)</label>
                                        <textarea name="txt_content"></textarea>
                                        <br><br>
                                        <input id="comments-checkbox" type="checkbox"><label for="comments-checkbox">Notify me of follow-up comments</label>
                                        <br><br>
                                        <img src="img/captcha.jpg" alt="">
                                        <br><br>
                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label><a href="#">Refresh</a></label>
                                                <input type="text">
                                            </div>

                                        </div>
                                        <br>
                                        <input type="submit"  name="btnThem" value="Gửi bình luận" class="dark-blue big">
                                    </div>
                                    </form>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- /Product Tabs -->
<!-- New Collection -->
<div class="products-row row">
    <!-- Carousel Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="carousel-heading">
            <h4>Sản phẩm cùng loại</h4>
            <div class="carousel-arrows">
                <i class="icons icon-left-dir"></i>
                <i class="icons icon-right-dir"></i>
            </div>
        </div>

    </div>
    <!-- /Carousel Heading -->

    <!-- Carousel -->
    <div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">

        <div class="owl-carousel" data-max-items="3">
            <?php $spcungloai=spcungloai($pIMEI,$row_chitietsp['pID']);
            while($row_cungloai=mysqli_fetch_array($spcungloai)){
                ?>
            <!-- Slide -->
            <div>
                <!-- Carousel Item -->

                <div class="product">

                    <div class="product-image">
                        <img src="../Backend/uploads/<?php echo $row_cungloai['pImage'] ?>" width="250px" height="300px" alt="<?php echo $row_cungloai['pName'] ?>">
                        <a href="index.php?p=chitietsp&pIMEI=<?php echo $row_cungloai['pIMEI']?>" class="product-hover">
                            <i class="icons icon-eye-1"></i>Chi tiết
                        </a>
                    </div>

                    <div class="product-info">
                        <h5><a href="index.php?p=chitietsp&pIMEI=<?php echo $row_cungloai['pIMEI']?>"><?php echo $row_cungloai['pName'] ?></a></h5>
                        <span class="price"><?php echo number_format($row_cungloai['pPrice'])?> VNĐ</span>
                        <div class="rating readonly-rating" data-score="4"></div>
                    </div>

                    <div class="product-actions">
                        <span class="add-to-favorites">
													<span class="action-wrapper">
                                                        <a href="index.php?p=chitietsp&pIMEI=<?php echo $row_cungloai['pIMEI'] ?>"
														<i class="icons icon-heart-empty"></i>
														<span class="action-name">Xem chi tiết</span>
                                                        </a>
													</span>
												</span>
												<span class="add-to-cart">

													<span class="action-wrapper">
                                                        <a href="pages/themhang.php?pIMEI=<?php echo $row_cungloai['pIMEI'] ?>"
														<i class="icons icon-basket-2"></i>
														<span class="action-name">Thêm vào giỏ</span>
                                                        </a>
													</span >
												</span>

                    </div>

                </div>

                <!-- /Carousel Item -->
            </div>

            <?php } ?>
        </div>
    </div>
    <!-- /Carousel -->

</div>
</section>
