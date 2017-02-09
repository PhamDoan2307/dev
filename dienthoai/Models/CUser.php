<?php
session_start();
require_once 'connectDB.php';
class CUser
{
//    var $taikhoan;
//    var $matkhau;

    function login($tk, $mk)
    {
        $strquery = "select * from user_lbl where uUser='" . $tk . "' and uPass='" . $mk ."'";
        $rs = mysqli_query(connectDB(),$strquery);
        if (mysqli_num_rows($rs) > 0)
        {
            //trường hợp login thành công
            $obj = mysqli_fetch_assoc($rs);
            $_SESSION['uID'] = $obj['uID'];
            $_SESSION['uUser'] = $obj['uUser'];
            $_SESSION['uAdmin'] = $obj['uAdmin'];
            return true;
        }
        else
        {
            //trường hợp login thất bại
            return false;
        }
    }
}

?>