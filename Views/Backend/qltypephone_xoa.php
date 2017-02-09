<?php error_reporting(E_ALL & ~ E_NOTICE);
?>
<?php
require_once "../../Shareds/Utils.php";
require('../../Models/CQLTypephone.php');
Utils::check_login();

?>
<?php
$pID=$_GET['pID'];
$strquery="DELETE FROM typephone_lbl WHERE pID='".$pID."'";
mysqli_query(connectDB(),$strquery);
$_SESSION['err']="Xóa thành công";
header('location:qltypephone_view.php');
?>