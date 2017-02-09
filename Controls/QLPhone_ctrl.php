<?php
session_start();
require('../../Models/CQLPhone.php');
//them moi dt
if(isset($_POST['btnThem'])) {
    $status = $_POST['rd_status'];
    $banchay = $_POST['rd_banchay'];
        $number = $_POST['txt_number'];
        $name = $_POST['txt_name'];
        $price = $_POST['txt_price'];
        $info = $_POST['txt_info'];
        $content = $_POST['txt_content'];
        $pid = $_POST['slc_pID'];
    $rate=$_POST['slc_rate'];
    $khuyenmai=$_POST['txt_khuyenmai'];
        $image = $_FILES['pImage']['name'];
        $image_path = $_FILES["pImage"]["tmp_name"];
        $new_image_path = "uploads/".$image;
        $image_upload = move_uploaded_file($image_path, $new_image_path);

        $strquery = "insert into phone_lbl(pName,pID,pPrice,pInfo,pCauhinh,pNumber,pImage,pStatus1,pKhuyenMai,pRate) VALUES ('$name','$pid','$price','$info','$content','$number','$image','$status','$khuyenmai','$rate')";
        $query = mysqli_query(connectDB(), $strquery);
        $_SESSION['err']="Thêm mới thành công!";
}
//Sua dien thoai
$pIMEI=$_GET['pIMEI'];
if(isset($_POST['btnSua'])){
    $name=$_POST['txt_name'];
    $pid=$_POST['slc_pID'];
    $price=$_POST['txt_price'];
    $info=$_POST['txt_info'];
    $content=$_POST['txt_content'];
    $number=$_POST['txt_number'];
    $banchay=$_POST['rd_banchay'];
    $status=$_POST['rd_status'];
    $rate=$_POST['slc_rate'];
    if($_FILES["image_upload"]["name"]){
        $image_name = $_FILES["image_upload"]["name"];
        $image_path = $_FILES["image_upload"]["tmp_name"];
        $new_image_path = "uploads/".$image_name;
        $image_upload = move_uploaded_file($image_path, $new_image_path);
    }
    else{
        $image_name = $_POST["anh_mo_ta"];
    }
    $khuyenmai=$_POST['txt_khuyenmai'];
    $strquery="update phone_lbl set pName='$name',pID='$pid',pPrice='$price',pInfo='$info',pCauhinh='$content',pNumber='$number',pKhuyenMai='$khuyenmai',pImage='$image_name',pStatus1='$status',pRate='$rate' WHERE pIMEI='$pIMEI'";
    $query=mysqli_query(connectDB(),$strquery);
    $_SESSION['err']="Cap nhat thanh cong";
    header('location:qlphone_view.php');
}
?>