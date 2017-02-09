<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-24
 * Time: 8:59 SA
 */
require_once "../../Shareds/Utils.php";
require '../../Models/connectDB.php';
if(isset($_GET['oID'])) {
    $oID = $_GET['oID'];
    $r = "delete from order_lbl WHERE oID='$oID'";
     mysqli_query(connectDB(), $r);
    $query="delete from order_detail_lbl where oID='$oID'";
    mysqli_query(connectDB(),$query);
    $_SESSION['err']="Xóa thành công hóa đơn";
    header('location:qlorder_view.php');
}
?>