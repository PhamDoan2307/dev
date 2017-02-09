<?php
session_start();
require('../../Models/CQLTK.php');
            if (isset($_POST['btnThem'])) {
                $user = $_POST['txt_user'];
                $pass = $_POST['txt_pass'];
                $name = $_POST['txt_name'];
                $phone = $_POST['txt_phone'];
                $add = $_POST['txt_add'];
                $mail = $_POST['txt_mail'];
                $status = $_POST['rd_status'];
                $admin = $_POST['rd_admin'];
                $strquery = "insert into user_lbl(uUser,uPass,uName,uPhone,uAdd,uMail,uStatus,uAdmin) VALUES ('$user','$pass','$name','$phone','$add','$mail','$status','$admin')";
                $query = mysqli_query(connectDB(), $strquery);
                $_SESSION['err'] = "Thêm mới thành công tài khoản";
}
            $uID=$_GET['uID'];
            if(isset($_POST['btnSua'])){
                $user=$_POST['txt_user'];
                $pass=$_POST['txt_pass'];
                $name=$_POST['txt_name'];
                $phone=$_POST['txt_phone'];
                $add=$_POST['txt_add'];
                $mail=$_POST['txt_mail'];
                $status=$_POST['rd_status'];
                $admin=$_POST['rd_admin'];
                $strquery="update user_lbl set uUser='$user',uPass='$pass',uName='$name',uPhone='$phone',uAdd='$add',uMail='$mail',uStatus='$status',uAdmin='$admin' WHERE uID='$uID'";
                $query=mysqli_query(connectDB(),$strquery);
                $_SESSION['err']="Cập nhật thành công tài khoản";
                header('location:qltk_view.php');
}
?>