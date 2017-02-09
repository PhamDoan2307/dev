<!-- Categories -->
<div class="row sidebar-box purple">

    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="sidebar-box-heading">
            <i class="icons icon-folder-open-empty"></i>
            <h4>Điện thoại</h4>
        </div>

        <div class="sidebar-box-content">
            <ul>
                <?php
                $ldt=getdanhmucsp();
                while($row_ldt=mysqli_fetch_array($ldt)){
                    $pID=$row_ldt['pID'];
                ?>
                <li><a href="index.php?p=danhsachsp&pID=<?php echo $row_ldt['pID'] ?>"><?php echo $row_ldt['pTypephone'] ?><i class="icons icon-right-dir"></i></a>

                    <ul class="sidebar-dropdown">
                        <li>

                            <ul>

                                <li><?php
                                    $dt_theo_ldt=getsp_theoloaisp($pID);
                                    while($row_theoldt=mysqli_fetch_array($dt_theo_ldt)){
                                    ?><a href="#"><?php echo $row_theoldt['pName'] ?></a><?php } ?></li>

                            </ul>

                        </li>

                    </ul>
                </li>
                <?php } ?>
                <li><a class="purple" href="#">Tất cả sản phẩm</a></li>
            </ul>
        </div>

    </div>

</div>
<!-- /Categories -->
<!-- Carousel -->
<div class="row sidebar-box">

    <div class="col-lg-12 col-md-12 col-sm-12 sidebar-carousel">

        <!-- Slider -->
        <section class="sidebar-slider">
            <div class="sidebar-flexslider">
                <ul class="slides">
                    <li>
                        <a href="#"><img src="img/sidebar-slide1.jpg" alt="Slide1"/></a>
                    </li>
                    <li>
                        <a href="#"><img src="img/sidebar-slide2.jpg" alt="Slide1"/></a>
                    </li>
                    <li>
                        <a href="#"><img src="img/sidebar-slide3.jpg" alt="Slide1"/></a>
                    </li>
                </ul>
            </div>
            <div class="slider-nav"></div>
        </section>
        <!-- /Slider -->

    </div>

</div>
<!-- /Carousel -->


<!-- Bestsellers -->
<div class="row sidebar-box red">

    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="sidebar-box-heading">
            <i class="icons icon-award-2"></i>
            <h4>Sản phẩm hot</h4>
        </div>
        <div class="sidebar-box-content">
            <table class="bestsellers-table">
                <?php
                $sphot=sanphamhot();
                while($row_sphot=mysqli_fetch_array($sphot)){
                ?>
                <tr>
                    <td class="product-thumbnail"><a href="index.php?p=chitietsp&pIMEI=<?php echo $row_sphot['pIMEI'] ?>"><img src="images/<?php echo $row_sphot['pImage'] ?>" alt="<?php echo $row_sphot['pName'] ?>"></a></td>
                    <td class="product-info">
                        <p><a href="index.php?p=chitietsp&pIMEI=<?php echo $row_sphot['pIMEI'] ?>"><?php echo $row_sphot['pName'] ?></a></p>
                        <span class="price"><?php echo number_format($row_sphot['pPrice'])?> VNĐ</span>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

    </div>

</div>
<!-- /Bestsellers -->


<!-- Tag Cloud -->
<div class="row sidebar-box green">

    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="sidebar-box-heading">
            <i class="icons icon-tag-6"></i>
            <h4>Tag sản phẩm</h4>
        </div>

        <div class="sidebar-box-content sidebar-padding-box">
            <a href="index.php?p=danhsachsp&pID=1" class="tag-item">IPhone</a>
            <a href="index.php?p=danhsachsp&pID=3" class="tag-item">Sky</a>
            <a href="#" class="tag-item">HTC</a>
            <a href="#" class="tag-item">LGD</a>
            <a href="index.php?p=danhsachsp&pID=2" class="tag-item">SAMSUNG</a>
            <a href="#" class="tag-item">Asus</a>
        </div>

    </div>

</div>
<!-- /Tag Cloud -->