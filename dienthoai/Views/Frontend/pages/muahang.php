<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="breadcrumbs">
        <p><a href="#">Trang chủ</a> <i class="icons icon-right-dir"></i> Thông tin hóa đơn</p>
    </div>
</div>
<script type="text/javascript">
    function sub_muahang() {
        if (document.frmMuaHang.txt_ten.value=="") {
            alert('Bạn chưa nhập Họ tên');
            document.frmMuaHang.txt_ten.focus();
            return false;
        }
        if (document.frmMuaHang.txt_mail.value=="") {
            alert('Bạn chưa nhập Mail');
            document.frmMuaHang.txt_mail.focus();
            return false;
        }
        if (document.frmMuaHang.txt_dt.value=="") {
            alert('Bạn chưa nhập Điện thoại');
            document.frmMuaHang.txt_dt.focus();
            return false;
        }
        if (document.frmMuaHang.txt_diachi.value=="") {
            alert('Bạn chưa nhập Địa chỉ nhận');
            document.frmMuaHang.txt_diachi.focus();
            return false;
        }
        if (!checkMail(document.frmMuaHang.txt_mail.value)) {
            alert('Mail bạn nhập không đúng định dạng');
            document.frmMuaHang.txt_mail.focus();
            return false;
        }
        return true;
    }
</script>

<?php
error_reporting(E_ERROR);
ob_start();
session_start();
$arrayId = array();
foreach ($_SESSION['giohang'] as $pIMEI => $so_luong)
    $arrayId[]=$pIMEI;
$strId=implode(",",$arrayId); //Tạo chuỗi $strId từ mảng $arrayId
$sql="SELECT * FROM phone_lbl WHERE pIMEI IN($strId)";
$query=mysqli_query(connectDB(),$sql);
$sqlSelectId="SELECT max(cID) as Max FROM customer";
$querySelectId=mysqli_query(connectDB(),$sqlSelectId);
$rowId=mysqli_fetch_array($querySelectId);
$cID=$rowId['Max']+1;
$totalPriceAll=0;
?>

<!-- Main Content -->

<section class="main-content col-lg-9 col-md-9 col-sm-9">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="carousel-heading">
                <h4>Thông tin khách hàng</h4>
            </div>
        </div>
        <form action="" name="frmMuaHang" method="post">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <table class="orderinfo-table">
                <tr>
                    <th>Tên của bạn<span>(*)</span></th>
                    <td><input type="text" name="txt_ten" placeholder="Tên.."></td>
                </tr>
                <tr>
                    <th>Số điện thoại</th>
                    <td><input type="text" name="txt_dt" placeholder="Số điện thoại.."></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><input type="email" name="txt_mail" placeholder="Email.."></td>
                </tr>
            </table>

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <table class="orderinfo-table">

                <tr>
                    <th>Địa chỉ<span>(*)</span></th>
                    <td><input type="text" name="txt_diachi" placeholder="Địa chỉ.."></td>
                </tr>

                <tr>
                    <th>Số tài khoản</th>
                    <td><input type="text" name="txt_stk" placeholder="Số tài khoản.."></td>
                </tr>
            </table>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="tabs">
                <div class="tab-heading margin-heading">
                    <a class="button big">Thông tin hóa đơn</a>
                </div>
                <div class="tab-content no-padding">
                    <div>
                        <table class="orderinfo-table">

                            <tr>
                                <th colspan="2">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            <?php while ($rows=mysqli_fetch_array($query)) { ?>
                                <?php
                                $gia=$rows['pPrice'];
                                $pIMEI=$rows['pIMEI'];
                                $so_luong_mua=$_SESSION['giohang'][$pIMEI];
                                $totalPrice=$so_luong_mua*$gia;
                                $chi_tiet[$pIMEI][$pIMEI]=$pIMEI;
                                $chi_tiet[$pIMEI]['totalPrice']=$gia;
                                $chi_tiet[$pIMEI]['pQuantity']=$so_luong_mua;

                                ?>
                                <tr>
                                    <td class="image-column" ><img height="50px" width="100px" src="images/<?php echo $rows['pImage']; ?>" /></td>
                                    <td ><?php echo $rows['pName']; ?></td>
                                    <td ><?php echo number_format($gia); ?>VNĐ</td>
                                    <td ><?php echo $so_luong_mua; ?></td>
                                    <td><?php echo number_format($totalPrice); ?> VNĐ</td>
                                </tr>
                                <?php
                                $totalPriceAll += $totalPrice;
                            }
                            ?>
                            <tr>
                                <td class="align-right" colspan="4"><span class="price big">Tổng</span></td>
                                <td><span class="price big"><?php echo number_format($totalPriceAll)?> VNĐ</span></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div align="right" class="checkout-form">
                            <input type="submit" name="submit" onclick="return sub_muahang()" class="red huge" value="Gửi đơn hàng">

                    </div></form>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php
    if(isset($_POST['submit'])){
        $ten_kh=$_POST['txt_ten'];
        $dien_thoai=$_POST['txt_dt'];
        $mail=$_POST['txt_mail'];
        $dc_nhan=$_POST['txt_diachi'];
        $stk=$_POST['txt_stk'];
        if(isset($ten_kh)&&isset($dien_thoai)&&isset($mail)&&isset($dc_nhan)){
            $sqlInsCusm="INSERT INTO customer(cName,cPhone,cAdd, cMail,cStk) VALUES('$ten_kh','$dien_thoai','$dc_nhan','$mail','$stk')";
            $queryInCusm=mysqli_query(connectDB(),$sqlInsCusm);
        }
// Insert thông tin vào bảng đơn đặt hàng
        $sqlInsHd="INSERT INTO order_lbl(cID,tID,oPay,cAdd)
            VALUES('$cID','1','$totalPriceAll','$dc_nhan')";
        $queryInsHd=mysqli_query(connectDB(),$sqlInsHd);

        $sqlSelectIdHd="SELECT max(oID) as Max FROM order_lbl";
        $querySelectIdHd=mysqli_query(connectDB(),$sqlSelectIdHd);
        $rowIdHd=mysqli_fetch_array($querySelectIdHd);
        $id_hd_max=$rowIdHd['Max'];
        foreach ($chi_tiet as $pIMEI => $array) {
            $arrayValue= array();
            foreach ($chi_tiet[$pIMEI] as $value) {
                $arrayValue[]=$value;
            }
            $sqlInsCtHd="INSERT INTO order_detail_lbl(oID,pIMEI,pPrice1,pQuantity)
            VALUES('$id_hd_max','$arrayValue[0]','$arrayValue[1]','$arrayValue[2]')";
            $sqlQueryCtHd=mysqli_query(connectDB(),$sqlInsCtHd);
            $number=$arrayValue[2];
            $r="Update phone_lbl set pNumber='$number' WHERE pIMEI=$pIMEI";
        }
    }
    ?>


<!-- /Main Content -->