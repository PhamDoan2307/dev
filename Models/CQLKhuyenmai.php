<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-23
 * Time: 12:15 CH
 */
require 'connectDB.php';
function getAllKM()
{
    $r="select * from khuyenmai_lbl";
    return mysqli_query(connectDB(),$r);
}
function updateKM($kID)
{
    $r="select * from khuyenmai_lbl WHERE kID=$kID";
    $query= mysqli_query(connectDB(),$r);
    return mysqli_fetch_array($query);
}