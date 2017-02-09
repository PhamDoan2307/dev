<?php

require_once '../../Models/CUser.php';


$act = @$_REQUEST['act'];


if (isset($act)) {

    switch ($act) {
        case 'login':
            $tk = $_REQUEST["txt_tk"];
            $mk = $_REQUEST["txt_mk"];
            $user = new CUser();
            if ($user->login($tk, $mk)) {
                header("location:qlorder_view.php");
            } else {
                $_SESSION['err'] = "Đăng nhập thất bại!";
            }
            break;
    }
}

?>