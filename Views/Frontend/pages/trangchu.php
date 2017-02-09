<section class="main-content col-lg-9 col-md-9 col-sm-9">
    <div class="products-row row">

    <!-- Carousel Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="carousel-heading">
            <h4>Sản phẩm nổi bật</h4>
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
            <?php
            $sp_hot=sanphamhot();
            while($row_spHot=mysqli_fetch_array($sp_hot)){
            ?>
            <!-- Slide -->
            <div>
                <!-- Carousel Item -->
                <div class="product">
                    <div class="product-image">
                        <img src="images/<?php echo $row_spHot['pImage'] ?>" height="300px" alt="<?php echo $row_spHot['pName'] ?>">
                        <a href="index.php?p=chitietsp&pIMEI=<?php echo $row_spHot['pIMEI'] ?>" class="product-hover">
                            <i class="icons icon-eye-1"></i> Xem nhanh
                        </a>
                    </div>
                    <div class="product-info">
                        <h5><a href="index.php?p=chitietsp&pIMEI=<?php echo $row_spHot['pIMEI'] ?>"><?php echo $row_spHot['pName'] ?></a></h5>
                        <span class="price"><?php echo number_format($row_spHot['pPrice'])?> VNĐ</span>
                        <div class="rating readonly-rating" data-score="4"></div>
                    </div>
                    <div class="product-actions">

												<span class="add-to-favorites">
                                                     <a href="index.php?p=chitietsp&pIMEI=<?php echo $row_spHot['pIMEI'] ?>" >
													<span class="action-wrapper">
														<i class="icons icon-heart-empty"></i>
														<span class="action-name">Xem chi tiết</span>
													</span>
                                                     </a>
												</span>

                                                <span class="add-to-cart">
                                                    <a href="pages/themhang.php?pIMEI=<?php echo $row_spHot['pIMEI'] ?>">
													<span class="action-wrapper">
														<i class="icons icon-basket-2"></i>
														<span class="action-name">Thêm giỏ hàng</span>
													</span >
                                                    </a>
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
<!-- /Featured Products -->




<!-- New Collection -->
<div class="products-row row">

    <!-- Carousel Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="carousel-heading">
            <h4>Các sản phẩm mới</h4>
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
<!--            các sản phẩm mới nhập-->
            <?php $sp_moi=sau_dtmoinhat();
            while($row_spMoi=mysqli_fetch_array($sp_moi)){
            ?>
            <!-- Slide -->
            <div>
                <!-- Carousel Item -->
                <div class="product">
                    <div class="product-image">
                        <span class="product-tag">Giảm giá</span>
                        <img src="images/<?php echo $row_spMoi['pImage'] ?>" height="300px" alt="<?php echo $row_spMoi['pName'] ?>">
                        <a href="index.php?p=chitietsp&pIMEI=<?php echo  $row_spMoi['pIMEI'] ?>" class="product-hover">
                            <i class="icons icon-eye-1"></i> Xem nhanh
                        </a>
                    </div>

                    <div class="product-info">
                        <h5><a href="index.php?p=chitietsp&pIMEI=<?php echo  $row_spMoi['pIMEI'] ?>"><?php echo $row_spMoi['pName'] ?></a></h5>
                        <span class="price"><?php echo number_format($row_spMoi['pPrice']) ?> VNĐ</span>
                        <div class="rating readonly-rating" data-score="4"></div>
                    </div>

                    <div class="product-actions">
                                                <span class="add-to-favorites">
													<span class="action-wrapper">
														<i class="icons icon-heart-empty"></i>
                                                        <a href="index.php?p=chitietsp&pIMEI=<?php echo $row_spMoi['pIMEI'] ?>">
														<span class="action-name">
                                                            Xem chi tiết
                                                        </span></a>
													</span>
												</span>
												<span class="add-to-cart">
                                                     <a href="pages/themhang.php?pIMEI=<?php echo $row_spMoi['pIMEI'] ?>">
													<span class="action-wrapper">
														<i class="icons icon-basket-2"></i>
														<span class="action-name">Thêm giỏ hàng</span>
													</span >
                                                         </a>
												</span>
                    </div>

                </div>
                <!-- /Carousel Item -->
            </div>
            <?php } ?>
            </div>
            <!-- /Slide -->


        </div>
    </div>
<!-- /New Collection -->





<!-- Random Products -->
<div class="products-row row">

    <!-- Carousel Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="carousel-heading">
            <h4>Đề xuất cho bạn</h4>
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

            <!-- Slide -->
            <?php $random=random_sp();
            while($row_random=mysqli_fetch_array($random)){
            ?>
            <div>
                <!-- Carousel Item -->

                <div class="product">
                    <div class="product-image">
                        <img src="images/<?php echo $row_random['pImage'] ?>" alt="<?php echo $row_random['pName'] ?>" height="300px">
                        <a href="index.php?p=chitietsp&pIMEI=<?php echo $row_random['pIMEI'] ?>" class="product-hover">
                            <i class="icons icon-eye-1"></i> Xem nhanh
                        </a>
                    </div>

                    <div class="product-info">
                        <h5><a href="index.php?p=chitietsp&pIMEI=<?php echo $row_random['pIMEI'] ?>"><?php echo $row_random['pName'] ?></a></h5>
                        <span class="price"><?php echo number_format($row_random['pPrice']) ?> VNĐ</span>
                        <div class="rating readonly-rating" data-score="4"></div>
                    </div>

                    <div class="product-actions">
                                                <span class="add-to-favorites">
													<span class="action-wrapper">
														<i class="icons icon-heart-empty"></i>
                                                        <a href=" index.php?p=chitietsp&pIMEI=<?php echo $row_random['pIMEI'] ?>">
														<span class="action-name">Xem chi tiết</span></a>
													</span>
												</span>
												<span class="add-to-cart">
                                                     <a href="pages/themhang.php?pIMEI=<?php echo $row_random['pIMEI'] ?>">
													<span class="action-wrapper">
														<i class="icons icon-basket-2"></i>
														<span class="action-name">Thêm vào giỏ</span>
													</span >
                                                         </a>
												</span>

                    </div>

                </div>

                <!-- /Carousel Item -->
            </div>
            <?php  } ?>
        </div>
    </div>
    <!-- /Carousel -->

</div>
<!-- /Random Products ->
<!-- Product Brands -->
<div class="products-row row">

    <!-- Carousel Heading -->
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="carousel-heading">
            <h4>Các công ty liên kết</h4>
            <div class="carousel-arrows">
                <i class="icons icon-left-dir"></i>
                <i class="icons icon-right-dir"></i>
            </div>
        </div>

    </div>
    <!-- /Carousel Heading -->

    <!-- Carousel -->
    <div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">

        <div class="owl-carousel" data-max-items="5">

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

            <!-- Slide -->
            <div>
                <div class="product">
                    <a href="#"><img src="img/brands/sample.jpg" alt="Brand1"></a>
                </div>
            </div>
            <!-- /Slide -->

        </div>

    </div>
    <!-- /Carousel -->

</div>
<!-- /Product Brands -->
    </section>