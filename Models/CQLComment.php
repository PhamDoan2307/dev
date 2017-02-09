<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-08
 * Time: 7:26 CH
 */
require('connectDB.php');
function quanlycomment()
{
    $strquery="select * from comment_lbl,phone_lbl where phone_lbl.pIMEI=comment_lbl.pIMEI ORDER BY cmID DESC ";
    return mysqli_query(connectDB(),$strquery);
}
function update_comment($cmID)
{
    $query="select * from comment_lbl where cmID='$cmID'";
    $q=mysqli_query(connectDB(),$query);
    return mysqli_fetch_array($q);
}
?>