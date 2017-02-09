<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-08
 * Time: 7:26 CH
 */
require('connectDB.php');
//hóa đơn
function quanlyhoadon()
{
    $query="select * from order_lbl,customer,tinhtranghoadon_lbl WHERE tinhtranghoadon_lbl.tID=order_lbl.tID AND customer.cID=order_lbl.cID ORDER  BY oID DESC ";
    return mysqli_query(connectDB(),$query);
}
//chi tiết hóa đơn
function thongtinkh_by_chitiethd($oID)
{
    $query="select * from order_lbl,customer WHERE customer.cID=order_lbl.cID and oID='$oID' ORDER  BY oID DESC ";
    return mysqli_query(connectDB(),$query);
}
function layhoadon()
{
    $strquery="select * from order_lbl";
    return mysqli_query(connectDB(),$strquery);
}
function hoadon($oID)
{
    $sqlSp = "SELECT * FROM order_lbl
                    INNER JOIN order_detail_lbl ON order_lbl.oID=order_detail_lbl.oID
                    INNER JOIN phone_lbl ON phone_lbl.pIMEI=order_detail_lbl.pIMEI
                    WHERE order_lbl.oID='$oID'";
     return mysqli_query(connectDB(), $sqlSp);
}
function tinhtrang()
{
    $r="select * from tinhtranghoadon_lbl";
    return mysqli_query(connectDB(),$r);
}
function nhanvien()
{
    $r="select * from user_lbl";
    return mysqli_query(connectDB(),$r);
}
?>