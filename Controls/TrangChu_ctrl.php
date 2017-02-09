<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-20
 * Time: 11:44 SA
 */
require '../../Models/Ctrangchu.php';
//mua hàng
    if(isset($_POST['submit'])){
//        $ten_kh=$_POST['txt_ten'];
//        $dien_thoai=$_POST['txt_dt'];
//        $mail=$_POST['txt_mail'];
//        $dc_nhan=$_POST['txt_diachi'];
//        $stk=$_POST['txt_stk'];
//        if(isset($ten_kh)&&isset($dien_thoai)&&isset($mail)&&isset($dc_nhan)){
//            $sqlInsCusm="INSERT INTO customer(cName,cPhone,cAdd, cMail,cStk) VALUES('$ten_kh','$dien_thoai','$dc_nhan','$mail','$stk')";
//            $queryInCusm=mysqli_query(connectDB(),$sqlInsCusm);
//        }
//// Insert thông tin vào bảng đơn đặt hàng
//        $sqlInsHd="INSERT INTO order_lbl(cID,tID,oPay,cAdd)
//            VALUES('$cID','1','$totalPriceAll','$dc_nhan')";
//        $queryInsHd=mysqli_query(connectDB(),$sqlInsHd);
//
//        $sqlSelectIdHd="SELECT max(oID) as Max FROM order_lbl";
//        $querySelectIdHd=mysqli_query(connectDB(),$sqlSelectIdHd);
//        $rowIdHd=mysqli_fetch_array($querySelectIdHd);
//        $id_hd_max=$rowIdHd['Max'];
//        foreach ($chi_tiet as $pIMEI => $array) {
//            $arrayValue= array();
//            foreach ($chi_tiet[$pIMEI] as $value) {
//                $arrayValue[]=$value;
//            }
//            $sqlInsCtHd="INSERT INTO order_detail_lbl(oID,pIMEI,pPrice1,pQuantity)
//            VALUES('$id_hd_max','$arrayValue[0]','$arrayValue[1]','$arrayValue[2]')";
//            $sqlQueryCtHd=mysqli_query(connectDB(),$sqlInsCtHd);
//        }
        header('location:index.php?p=thongbao');
    }
    ?>