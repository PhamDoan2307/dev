<?php
require('connectDB.php');
function quanlytaikhoan()
{
    $strquery="select * from user_lbl ORDER BY uID DESC ";
    return mysqli_query(connectDB(),$strquery);
}
function update_user($uID)
{
    $strquery="select * from user_lbl where uID='$uID'";
    $query= mysqli_query(connectDB(),$strquery);
    return mysqli_fetch_array($query);
}