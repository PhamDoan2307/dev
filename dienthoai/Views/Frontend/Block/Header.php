<?php  error_reporting(E_WARNING & E_ALL &E_ERROR);
session_start();?>
<div class="col-lg-12 col-md-12 col-sm-12">
<!--    <!-- Top Header -->
<!--    <div id="top-header">-->
<!---->
<!--        <div class="row">-->
<!---->
<!--            <nav id="top-navigation" class="col-lg-7 col-md-7 col-sm-7">-->
<!--                <ul class="pull-left">-->
<!--                    <li><a href="index.php?p=giohang">Đơn hàng của bạn</a></li>-->
<!--                    <li><a href="index.php?p=muahang">Thanh toán</a></li>-->
<!--                    <li><a href="text_page.html">Liên hệ</a></li>-->
<!--                    <li><a href="contact.html">Dịch vụ</a></li>-->
<!--                </ul>-->
<!--            </nav>-->
<!--        </div>-->
<!---->
<!--    </div>-->
    <!-- /Top Header -->
    <!-- Main Header -->
    <div id="main-header">

        <div class="row">

            <div id="logo" class="col-lg-4 col-md-4 col-sm-4">
                <a href="index.php"><img src="img/logo.png" alt="Logo"></a>
            </div>

            <nav id="middle-navigation" class="col-lg-8 col-md-8 col-sm-8">
                <ul class="pull-right">
                    <li class="orange"><a href="index.php?p=giohang"><i class="icons icon-basket-2"></i>Giỏ hàng</a>
                        <ul id="cart-dropdown" class="box-dropdown parent-arrow">
                            <li>
                                <div class="box-wrapper parent-border">
                                    <?php
                                    if(isset($_SESSION['giohang'])){
                                   echo "<p>Giỏ hàng</p>";
                                    $arrayId = array();
                                    foreach ($_SESSION['giohang'] as $pIMEI => $so_luong)
                                        $arrayId[] = $pIMEI;
                                    $strId = implode(',', $arrayId);
                                    $sql = "SELECT * FROM phone_lbl WHERE pIMEI IN($strId)";
                                    $query = mysqli_query(connectDB(), $sql);
                                    ?>
                                    <table border="1" class="cart-table">
                                        <?php
                                        $totalPriceAll = 0;
                                        while ($row = mysqli_fetch_array($query)) {
                                            $gia = $row['pPrice'];
                                            $totalPrice = $gia * $_SESSION['giohang'][$row['pIMEI']];
                                            ?>
                                            <tr>
                                                <td><img src="images/<?php echo $row['pImage'] ?>"
                                                         alt="<?php echo $row['pName'] ?>"></td>
                                                <td>
                                                    <h6><?php echo $row['pName'] ?></h6>
                                                </td>
                                                <td>
                                                    <span class="quantity"><span
                                                            class="light"><?php echo $_SESSION['giohang'][$row['pIMEI']]; ?>
                                                            x </span><?php echo number_format($row['pPrice']) ?>
                                                        VNĐ</span>
                                                    <a href="pages/xoahang.php?pIMEI=<?php echo $row['pIMEI'] ?>" class="parent-color">Xóa</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $totalPriceAll += $totalPrice;

                                        } ?>
                                    </table>
                                    <br class="clearfix">
                                </div>



                                <div class="footer">
                                    <table class="checkout-table pull-right">

                                        <tr>
                                            <td class="align-right"><strong>Tổng tiền:</strong></td>
                                            <td><strong class="parent-color"><?php echo number_format($totalPriceAll)?> VNĐ</strong></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box-wrapper no-border">
                                    <a class="button pull-right parent-background" href="index.php?p=muahang">Thanh toán</a>
                                    <a class="button pull-right" href="index.php?p=giohang">Xem chi tiết</a>
                                </div>
                                <?php
                                }
                                else
                                    echo "";
                                ?>
                            </li>
                        </ul>
                    <li class="login-create purple">
                        <i class="icons icon-user"></i>
                        <p>Xin chào <?php if(isset($_SESSION['uUser'])){ echo $_SESSION['uUser'];} else echo "người dùng" ?>! <br><a href="../../Views/Backend/qlorder_view.php">Đăng nhập</a> hoặc <a href="../../Views/Backend/logout.php">Đăng xuất</a></p>
                        <form>
<!--                        <ul id="login-dropdown" class="box-dropdown">-->
<!--                            <li>-->
<!--                                <div class="box-wrapper">-->
<!--                                    <h4>LOGIN</h4>-->
<!--                                    <div class="iconic-input">-->
<!--                                        <input type="text" placeholder="Username">-->
<!--                                        <i class="icons icon-user-3"></i>-->
<!--                                    </div>-->
<!--                                    <div class="iconic-input">-->
<!--                                        <input type="text" placeholder="Password">-->
<!--                                        <i class="icons icon-lock"></i>-->
<!--                                    </div>-->
<!--                                    <input type="checkbox" id="loginremember"> <label for="loginremember">Remember me</label>-->
<!--                                    <br>-->
<!--                                    <br>-->
<!--                                    <div class="pull-left">-->
<!--                                        <input type="submit" class="orange" value="Login">-->
<!--                                    </div>-->
<!--                                    <div class="pull-right">-->
<!--                                        <a href="#">Forgot your password?</a>-->
<!--                                        <br>-->
<!--                                        <a href="#">Forgot your username?</a>-->
<!--                                        <br>-->
<!--                                    </div>-->
<!--                                    <br class="clearfix">-->
<!--                                </div>-->
<!--                                <div class="footer">-->
<!--                                    <h4 class="pull-left">NEW CUSTOMER?</h4>-->
<!--                                    <a class="button pull-right" href="create_an_account.html">Create an account</a>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
                        </form>
                    </li>
                    </li>

                </ul>
            </nav>
        </div>

    </div>
    <!-- /Main Header -->
    <!-- Main Navigation -->
    <nav id="main-navigation" class="style3">
        <ul>

            <li class="home-green current-item">
                <a href="index.php">
                    <span class="nav-caption">Trang chủ</span>
                </a>
            </li>
            <li class="blue active">
                <a href="#">
                    <span class="nav-caption">Điện thoại</span>
                </a>

                <ul class="wide-dropdown normalAniamtion">
                    <li>
                        <ul>
                            <li><span class="nav-caption">Hãng Sản Xuất</span></li>
                            <?php $ldt=getdanhmucsp();
                            while($row_ldt=mysqli_fetch_array($ldt)){
                            ?>
                            <li><a href="index.php?p=danhsachsp&pID=<?php echo $row_ldt['pID'] ?>"><i class="icons icon-right-dir"></i><?php echo $row_ldt['pTypephone'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><span class="nav-caption">Khoảng giá</span></li>
                            <li><a href="index.php?p=max2trieu"><i class="icons icon-right-dir"></i> Dưới 2 triệu</a></li>
                            <li><a href="index.php?p=max3trieu"><i class="icons icon-right-dir"></i> Dưới 3 triệu</a></li>
                            <li><a href="index.php?p=max5trieu"><i class="icons icon-right-dir"></i>Dưới 5 triệu</a></li>
                            <li><a href="index.php?p=max10trieu"><i class="icons icon-right-dir"></i> Dưới 10 triệu</a></li>
                            <li><a href="index.php?p=min10trieu"><i class="icons icon-right-dir"></i> Trên 10 triệu</a></li>
                        </ul>
                    </li>
                    <li>
                    </li>
                </ul>

            </li>

            <li class="blue">
                <a href="index.php?p=khuyenmai">
                    <span class="nav-caption">Khuyến mại</span>
                </a>
            </li>

            <li class="orange">
                <a href="index.php?p=muahangonline">
                    <span class="nav-caption">Mua hàng online</span>
                </a>
            </li>

            <li class="green">
                <a href="index.php?p=tragop">
                    <span class="nav-caption">Trả góp</span>
                </a>
            </li>

            <li class="purple">
                <a href="">
                    <span class="nav-caption">Dịch vụ</span>
                </a>
            </li>

            <li class="nav-search">
                <i class="icons icon-search-1"></i>
            </li>

        </ul>

        <div id="search-bar">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <table id="search-bar-table">
                    <tr>
                        <td class="search-column-1">
                            <p>
                                <span class="grey">Gợi ý :</span>
                                <a href="index.php?p=danhsachsp&pID=1">Iphone</a>,
                                <a href="index.php?p=danhsachsp&pID=2">SamSung</a>,
                                <a href="index.php?p=danhsachsp&pID=3">Sky</a>,
                                <a href="#">...</a></p>
                            <form action="index.php?p=timkiem" method="post">
                            <input type="text" name="tukhoa" placeholder="Nhập từ khóa tìm kiếm...">
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="search-button">
                <input type="submit" value="">
                <i class="icons icon-search-1"></i>
            </div>
        </div>
    </nav>
    <!-- /Main Navigation -->
</div>