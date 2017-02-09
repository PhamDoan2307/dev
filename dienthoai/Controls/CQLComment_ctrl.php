<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-08
 * Time: 10:13 CH
 */
require ('../../Models/CQLComment.php');
$cmID=$_GET['cmID'];
if(isset($_POST['btnSua'])) {
    $status=$_POST['rd_status'];
    $strquery = "update comment_lbl set cmStatus='$status' WHERE cmID=$cmID";
    $query = mysqli_query(connectDB(), $strquery);
    $_SESSION['err']="Sửa thành công!";
    header('location:qlcomment_view.php');
}
?>