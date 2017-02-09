<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-08
 * Time: 10:14 CH
 */
require '../../Models/CQLOrder.php';
$oID=$_GET['oID'];
if(isset($_POST['btnLuu']))
{
    $tinh_trang=$_POST['slc_tinhtrang'];
    $uid=$_POST['slc_uid'];
    if($tinh_trang==3 && $uid=''){
        $err="Bạn phải chọn nhân viên giao hàng";
    }
    else {
        $r = "update order_lbl set tID='$tinh_trang',uID='$uid' WHERE oID='$oID'";
        mysqli_query(connectDB(), $r);
        $_SESSION['err'] = "Lưu thành công";
        header('location:qlorder_view.php');
    }
    //Cập nhật lại số lượng bảng phone_lbl và bảng sản phẩm bán
    if($tinh_trang==2){
        $updatesp=hoadon($oID);
        while($rowSpb=mysqli_fetch_array($updatesp)){
            $id_spb=$rowSpb['pIMEI'];
            $SPBan[$id_spb]=$rowSpb['pQuantity'];
        }
        foreach($SPBan as $id_spb => $soLuong){
            $soLuongBan=$soLuong;
            $sqlCheckIdSpb="SELECT * FROM sanpham_daban_lbl WHERE pIMEI='$id_spb'";
            $sqlQueryCheckId=mysqli_query(connectDB(),$sqlCheckIdSpb);
            $num_row=mysqli_num_rows($sqlQueryCheckId);
            $row=mysqli_fetch_array($sqlQueryCheckId);
            if($num_row==1){
                $id_sp_ban=$row['pIDB'];
                $soLuong+=$row['pQuantity1'];
                $sqlUpSpb="UPDATE sanpham_daban_lbl SET pQuantity1='$soLuong' WHERE pIDB='$id_sp_ban' ";
                $sqlQueryUpSpb=mysqli_query(connectDB(),$sqlUpSpb);
            }
            else{
                $sqlInsSpb="INSERT INTO sanpham_daban_lbl(pIMEI,pQuantity1) VALUES('$id_spb','$soLuong')";
                $sqlQueryInsSpb=mysqli_query(connectDB(),$sqlInsSpb);
            }

            /*Cập nhật lại số lượng sản phẩm */
            $sqlCheckIdSp="SELECT * FROM phone_lbl WHERE pIMEI='$id_spb'";
            $sqlQueryCheckIdSp=mysqli_query(connectDB(),$sqlCheckIdSp);
            $rowSp=mysqli_fetch_array($sqlQueryCheckIdSp);
            $so_luong_sp=$rowSp['pNumber']-$soLuongBan;
            $sqlUpSp="UPDATE phone_lbl SET pNumber='$so_luong_sp' WHERE pIMEI='$id_spb'";
            $sqlQueryUpSp=mysqli_query(connectDB(),$sqlUpSp);
        }

    }
}