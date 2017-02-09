<?php error_reporting(E_ALL & ~ E_NOTICE);
?>
<?php
require_once "../../Shareds/Utils.php";
require('../../Controls/QLKhuyenmai_ctrl.php');
Utils::check_login();

?>
<?php
$kID=$_GET['kID'];
$strquery="DELETE FROM khuyenmai_lbl WHERE kID='".$kID."'";
mysqli_query(connectDB(),$strquery);
$_SESSION['err']="Xóa thành công";
header('location:qlkhuyenmai_view.php');
?>