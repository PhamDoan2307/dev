<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-05-29
 * Time: 9:10 CH
 */
error_reporting(E_ALL & ~ E_NOTICE);
?>
<?php
require_once "../../Shareds/Utils.php";
require('../../Controls/CQLComment_ctrl.php');
Utils::check_login();
?>
<?php
$cmID=$_GET['cmID'];
$query="delete from comment_lbl where cmID='$cmID'";
$rs= mysqli_query(connectDB(),$query);
$_SESSION['err']="xóa thành công";
header('location:qlcomment_view.php');
?>