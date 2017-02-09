<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-08
 * Time: 7:26 CH
 */
require('connectDB.php');
function quanlyloaidt()
{
    $strquery="select * from typephone_lbl ORDER BY pID DESC ";
    return mysqli_query(connectDB(),$strquery);
}
function update_typephone($pID)
{
    $strquery = "select * from typephone_lbl where pID='$pID'";
    $query = mysqli_query(connectDB(), $strquery);
    return mysqli_fetch_array($query);
}
?>