<?php error_reporting(E_ALL & ~ E_NOTICE);
?>
<?php
require_once "../../Shareds/Utils.php";
require('../../Controls/QLTK_ctrl.php');
Utils::check_login();
?>
<?php
$uID=$_GET['uID'];
$strquery="DELETE FROM user_lbl WHERE uID='".$uID."'";
mysqli_query(connectDB(),$strquery);
$_SESSION['err']="Xóa thành công tài khoản";
header('location:qltk_view.php');?>
