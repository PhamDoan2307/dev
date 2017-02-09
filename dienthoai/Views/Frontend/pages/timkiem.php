<!-- Main Content -->
<?php
$tukhoa=$_POST['tukhoa'];

?>
<div class="row content">
    <!-- Main Content -->
    <!--    main 2-->
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="breadcrumbs">
            <p><a href="#">Trang chủ</a> <i class="icons icon-right-dir"></i><strong>Tìm được <?php $timkiem1=timkiem($tukhoa); $r1=mysqli_num_rows($timkiem1); echo $r1 ?> sản phẩm  "<?php echo $tukhoa?>"</strong></p>
        </div>
    </div>

    <!-- Main Content -->
    <section class="main-content col-lg-9 col-md-9 col-sm-9">
        <div class="row">
            <!-- Heading -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="carousel-heading">
                    <h4>Điện thoại</h4>
                </div>
            </div>
            <!-- /Heading -->
        </div>
        <div class="row">
            <!-- Product Item -->
            <?php
            $timkiem=timkiem($tukhoa);
            $r=mysqli_num_rows($timkiem);
            while($rows=mysqli_fetch_array($timkiem)){
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 product">
                    <div class="product-image">
                        <img src="images/<?php echo $rows['pImage'] ?>" height="300px" alt="<?php echo $rows['pName'] ?>">
                        <a href="index.php?p=chitietsp&pIMEI=<?php echo  $rows['pIMEI'] ?>" class="product-hover">
                            <i class="icons icon-eye-1"></i> Xem nhanh
                        </a>
                    </div>

                    <div class="product-info">
                        <h5><a href="index.php?p=chitietsp&pIMEI=<?php echo  $rows['pIMEI'] ?>"><?php echo $rows['pName'] ?></a></h5>
                        <span class="price"><?php echo number_format($rows['pPrice']) ?> VNĐ</span>
                        <div class="rating readonly-rating" data-score="4"></div>
                    </div>

                    <div class="product-actions">
                                                <span class="add-to-favorites">
													<span class="action-wrapper">
														<i class="icons icon-heart-empty"></i>
                                                        <a href="index.php?p=chitietsp&pIMEI=<?php echo $rows['pIMEI'] ?>">
														<span class="action-name">
                                                            Xem chi tiết
                                                        </span></a>
													</span>
												</span>
												<span class="add-to-cart">
													<span class="action-wrapper">
														<i class="icons icon-basket-2"></i>
														<span class="action-name">Thêm giỏ hàng</span>
													</span >
												</span>

                    </div>

                </div>
            <?php } ?>

            <!-- Product Item -->
        </div>
    </section>