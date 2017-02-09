<?php
require('../../Controls/QLPhone_ctrl.php');
require ('../../Shareds/Utils.php');
Utils::check_login();

?>
<?php
$pIMEI=$_GET['pIMEI'];
    $strquery="delete from phone_lbl WHERE pIMEI='$pIMEI'";
     mysqli_query(connectDB(),$strquery);
    $_SESSION['err']="Xóa thành công";
    header("location:qlphone_view.php");
?>
<?php error_reporting(E_ALL & ~ E_NOTICE);
?>