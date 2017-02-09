<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-08
 * Time: 10:13 CH
 */
require ('../../Models/CQLTypephone.php');
//Them loai dt
if(($_POST['btnThem'])) {
    $status = $_POST["rd_status"];
        $typephone = $_POST["txt_typephone"];
        $describe = $_POST["txt_describe"];
        $nsx=$_POST['txt_nsx'];
        $strquery = "insert into typephone_lbl(pTypephone,pNSX,pStatus,pDescribe) VALUES ('$typephone','$nsx','$status','$describe')";
        $query = mysqli_query(connectDB(), $strquery);
        $_SESSION['err']="Thêm mới thành công";
}

//sua loai dt
$pID=$_GET['pID'];
if(isset($_POST['btnSua'])){
    $typephone=$_POST['txt_typephone'];
    $nsx=$_POST['txt_nsx'];
    $status=$_POST['rd_status'];
    $describe=$_POST['txt_describe'];
    $strquery="update typephone_lbl set pTypephone='$typephone',pNSX='$nsx',pStatus='$status',pDescribe='$describe' WHERE pID='$pID'";
    $query=mysqli_query(connectDB(),$strquery);
    $_SESSION['err']="Cập nhật thành công";
    header('location:qltypephone_view.php');
}

?>