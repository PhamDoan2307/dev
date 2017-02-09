<?php
$pID=$_GET['pID'];

?>
<?php $ldt=getloaisp_theoid($pID);
$row_ldt=mysqli_fetch_array($ldt);?>
<!-- Main Content -->
<div class="row content">
    <!-- Main Content -->
<!--    main 2-->
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="breadcrumbs">
            <p><a href="#">Trang chủ</a> <i class="icons icon-right-dir"></i><?php echo $row_ldt['pTypephone'] ?></p>
        </div>
    </div>

    <!-- Main Content -->
    <section class="main-content col-lg-9 col-md-9 col-sm-9">
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12 col-sm-12">-->
<!--                <div class="category-heading">-->
<!--                    <select class="chosen-select">-->
<!--                        <option>Khoảng giá</option>-->
<!--                        <option>Product name</option>-->
<!--                        <option>Product name</option>-->
<!--                        <option>Product name</option>-->
<!--                    </select>-->
<!--                    <select class="chosen-select">-->
<!--                        <option>Select manufacturer</option>-->
<!--                        <option>Product name</option>-->
<!--                        <option>Product name</option>-->
<!--                        <option>Product name</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="row">
            <!-- Heading -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="carousel-heading">
                    <h4>Điện thoại <?php echo $row_ldt['pTypephone']?></h4>
                </div>
            </div>
            <!-- /Heading -->
        </div>
        <div class="row">
            <!-- Product Item -->
            <?php
            $sotin1trang=6;
            if(isset($_GET['trang']))
            {
                $trang=$_GET['trang'];
            }
            else
            {
                $trang=1;
            }
            $tu=($trang-1)*$sotin1trang;
            $dt_theoldt_phantrang= dt_theoldt_phantrang($pID,$tu,$sotin1trang);
            while($row_theotungloaidt=mysqli_fetch_array($dt_theoldt_phantrang)){
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 product">
                    <div class="product-image">
                        <img src="images/<?php echo $row_theotungloaidt['pImage'] ?>" height="300px" alt="<?php echo $row_theotungloaidt['pName'] ?>">
                        <a href="index.php?p=chitietsp&pIMEI=<?php echo  $row_theotungloaidt['pIMEI'] ?>" class="product-hover">
                            <i class="icons icon-eye-1"></i> Xem nhanh
                        </a>
                    </div>

                    <div class="product-info">
                        <h5><a href="index.php?p=chitietsp&pIMEI=<?php echo  $row_theotungloaidt['pIMEI'] ?>"><?php echo $row_theotungloaidt['pName'] ?></a></h5>
                        <span class="price"><?php echo number_format($row_theotungloaidt['pPrice']) ?> VNĐ</span>
                        <div class="rating readonly-rating" data-score="<?php echo $row_theotungloaidt['pRate'] ?>"></div>
                    </div>

                    <div class="product-actions">
                                                <span class="add-to-favorites">
													<span class="action-wrapper">
														<i class="icons icon-heart-empty"></i>
                                                        <a href="index.php?p=chitietsp&pIMEI=<?php echo $row_theotungloaidt['pIMEI'] ?>">
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
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="category-results">
                <p>Kết quả 1-6 of 6</p>
                <p>Show
                    <select class="chosen-select">
                        <option>1</option>
                        <option>2</option>
                        <option>6</option>
                        <option>P10</option>
                    </select>
                    per page
                </p>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="pagination">

                <?php
                $sotin=getsp_theoloaisp($pID);
                $tong_sotin=mysqli_num_rows($sotin);
                $tongsotrang=ceil($tong_sotin/$sotin1trang);
                if ($trang > 1 && $tongsotrang > 1){
                    echo '<a href="index.php?p=danhsachsp&pID='.($pID).'&trang='.($trang-1).'"><div class="previous"><i class="icons icon-left-dir"></i></div></a>';
                }
                for($i=1;$i<=$tongsotrang;$i++)
                {
                    ?>
                <a <?php if($i==$trang) echo "style='background-color:red'";?> href="index.php?p=danhsachsp&pID=<?php echo $pID?>&trang=<?php echo $i ?>"><div <?php if($i==$trang) echo "style='background-color:blue'"?> class="page-button"><?php echo $i?></div></a>
                    <?php
                }
                if($trang < $tongsotrang && $tongsotrang > 1) {
                     echo '<a href="index.php?p=danhsachsp&pID='.($pID).'&trang='.($trang+1).'"><div class="next" ><i class="icons icon-right-dir" ></i ></div ></a >';
                }
                ?>

            </div>
        </div>
    </section>