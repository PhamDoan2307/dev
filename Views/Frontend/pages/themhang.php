<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-07
 * Time: 8:54 SA
 */
error_reporting(E_ERROR & E_WARNING & E_ALL);
require('../../../Models/CTrangchu.php');
session_start();?>
<?php
$pIMEI=$_GET['pIMEI'];
if($pIMEI!="")
{
    $r="select pIMEI from phone_lbl where pIMEI='$pIMEI' ";
        $result=mysqli_query(connectDB(),$r);
    $num_row=mysqli_num_rows($result);
    if($num_row==1)
    {
        if(isset($_SESSION['giohang'][$pIMEI]))
        {
            $_SESSION['giohang'][$pIMEI] ++;
        }
        else
        {
            $_SESSION['giohang'][$pIMEI]=1;
        }
        header("location: ../index.php?p=giohang");
    }
    else
    {
        header("location: ../index.php");
    }
}
else
{
    header("location:../index.php");
}
?>
