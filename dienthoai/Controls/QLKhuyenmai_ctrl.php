<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-23
 * Time: 12:17 CH
 */
require '../../Models/CQLKhuyenmai.php';
//thêm km
if(isset($_POST['btnThem']))
{
    $title=$_POST['txt_title'];
    $content=$_POST['txt_content'];
    $datestart=$_POST['txt_datestart'];
    $dateend=$_POST['txt_dateend'];
    $status=$_POST['rd_status'];
    $r="insert into khuyenmai_lbl(kTitle,kContent,kDateStart,kDateEnd,kStatus) VALUES ('$title','$content','$datestart','$dateend','$status')";
    mysqli_query(connectDB(),$r);
    $_SESSION['err']="Thêm mới thành công dịch vụ khuyến mãi";
    header('location:qlkhuyenmai_view.php');
}
$kID=$_GET['kID'];
if(isset($_POST['btnSua']))
{
    $title=$_POST['txt_title'];
    $content=$_POST['txt_content'];
    $datestart=$_POST['txt_datestart'];
    $dateend=$_POST['txt_dateend'];
    $status=$_POST['rd_status'];
    $r="update khuyenmai_lbl set kTitle='$title',kContent='$content',kDateStart='$datestart',kDateEnd='$dateend',kStatus='$status' WHERE kID='$kID')";
    mysqli_query(connectDB(),$r);
    $_SESSION['err']="Sửa thành công dịch vụ khuyến mãi";
    header('location:qlkhuyenmai_view.php');
}
?>