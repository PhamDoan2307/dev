<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-08
 * Time: 7:26 CH
 */
require('connectDB.php');
function quanlyldt()
{
    $strquery="select * from typephone_lbl";
    return mysqli_query(connectDB(),$strquery);
}
function quanlydt()
{
    $strquery="select * from phone_lbl,typephone_lbl WHERE typephone_lbl.pID=phone_lbl.pID ORDER  BY pIMEI DESC ";
    return mysqli_query(connectDB(),$strquery);
}
function update_phone($pIMEI)
{
    $strquery="select * from phone_lbl where pIMEI='$pIMEI'";
    $query=mysqli_query(connectDB(),$strquery);
    return mysqli_fetch_array($query);
}
?>