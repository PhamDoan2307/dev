<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-24
 * Time: 7:50 CH
 */
session_start();
if(isset($_GET['pIMEI']))
{
    $pIMEI=$_GET['pIMEI'];
    unset($_SESSION['giohang'][$pIMEI]);
    header('location:../index.php?p=giohang');
}
