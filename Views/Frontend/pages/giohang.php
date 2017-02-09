<script type="text/javascript" src="js/stuHover.js"></script>
<script type="text/javascript">
    function xoaSP(){
        var conf=confirm("Bạn có thực sự muốn xóa?");
        return conf;
    }
</script>
<?php
error_reporting(E_WARNING & E_ALL &E_ERROR);
session_start();
if(isset($_SESSION['giohang'])) {
    if (isset($_POST['muatiep']))
        header('location:index.php');

    if (isset($_POST['muahang']))
        header('location:muahang.php');

    if (isset($_POST['capnhat'])) {
        if (isset($_POST['soluong_post'])) {
            foreach ($_POST['soluong_post'] as $pIMEI => $soluong) {
                if ($soluong == 0) unset($_SESSION['giohang'][$pIMEI]);
                else if ($soluong > 0) $_SESSION['giohang'][$pIMEI] = $soluong;
            }
        }
    }
    $arrayId = array();
    foreach ($_SESSION['giohang'] as $pIMEI => $so_luong)
        $arrayId[] = $pIMEI;
    $strId = implode(',', $arrayId);
    $sql = "SELECT * FROM phone_lbl WHERE pIMEI IN($strId)";
    $query = mysqli_query(connectDB(), $sql);
    ?>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="breadcrumbs">
            <p><a href="#">Trang chủ</a> <i class="icons icon-right-dir"></i> Giỏ hàng</p>
        </div>
    </div>
    <!-- Main Content -->
    <section class="main-content col-lg-9 col-md-9 col-sm-9">
        <div class="row">
            <!--            Giỏ hàng-->

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="carousel-heading">
                    <h4>Chi tiết giỏ hàng</h4>
                </div>
                <table class="shopping-table">
                    <tr>
                        <th>STT</th>
                        <th colspan="2">Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                    <?php
                    $stt = 1;
                    $totalPriceAll = 0;
                    while ($row = mysqli_fetch_array($query)){
                    $gia = $row['pPrice'];
                    $totalPrice = $gia * $_SESSION['giohang'][$row['pIMEI']];

                    ?>
                    <form action="" method="post">
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td class="image-column"><a href="#"><img height=""
                                                                      src="images/<?php echo $row['pImage'] ?>" alt=""></a>
                            </td>
                            <td><p>
                                    <a href="index.php?p=chitietsp&pIMEI=<?php echo $row['pIMEI'] ?>"><?php echo $row['pName'] ?></a>
                                </p></td>
                            <td><p><?php echo number_format($row['pPrice']) ?> VNĐ</p></td>
                            <td class="quantity">
                                <input type="text" id="soluong_post" name="soluong_post[<?php echo $row['pIMEI'] ?>]"
                                       value="<?php echo $_SESSION['giohang'][$row['pIMEI']]; ?>"/>
                                <a onclick="return xoaSP()" href="pages/xoahang.php?pIMEI=<?php echo $row['pIMEI'] ?>"
                                   class="red-hover"><i class="icons icon-cancel-3"></i> Xóa</a>
                            </td>
                            <td><p><?php echo number_format($totalPrice) ?> VNĐ</p></td>
                        </tr>
                        <?php
                        $totalPriceAll += $totalPrice;
                        $stt++;
                        } ?>
                        <tr>
                            <td class="align-right" colspan="3">
                            </td>
                            <td class="align-right" colspan="2"><input type="submit" value="Cập nhật" name="capnhat"/>
                                <a onclick="return xoaSP()" href="pages/xoahang.php" class="red-hover"><i
                                        class="icons icon-cancel-3"></i> Xóa hết</a>
                            </td>
                            <td><strong><?php echo number_format($totalPriceAll) ?> VNĐ</strong></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="checkout-form">
                    <input type="checkbox" id="termscheckbox"><label for="termscheckbox">Xác nhận đơn hàng trước khi
                        thanh toán</label>
                    <br><br>
                    <a href="index.php?p=muahang">
                        <input type="submit" name="muahang" class="red huge" value="Thanh toán"></a>
                </div>

            </div>

        </div>
        <?php
        }
        else
            echo '<script> alert("Hiện không có sản phẩm nào trong giỏ hàng");</script>';

        ?>
    </section>

    <!-- /Main Content -->
