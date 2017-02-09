<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-08
 * Time: 7:26 CH
 */
require('connectDB.php');
function layhoadon()
{
    $strquery="select * from order_lbl";
    return mysqli_query(connectDB(),$strquery);
}

function chitiethd($oID)
{
    $strquery="select * from order_detail_lbl,phone_lbl WHERE phone_lbl.pIMEI=order_detail_lbl.pIMEI AND oID='$oID'";
    return mysqli_query(connectDB(),$strquery);

}
?>