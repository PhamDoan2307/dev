<?php
/**
 * Created by PhpStorm.
 * User: DoanPham
 * Date: 2016-06-16
 * Time: 12:05 CH
 */
require_once ('connectDB.php');
function get_all_KH()
{
    $r = "select * from customer ORDER BY cID DESC ";
    return mysqli_query(connectDB(), $r);

}