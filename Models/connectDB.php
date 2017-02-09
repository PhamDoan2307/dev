<?php
/**
 * Created by PhpStorm.
 * User: ThaoNhi
 * Date: 3/12/2016
 * Time: 12:52 PM
 */

    function connectDB ()
    {
        $conn  = mysqli_connect("localhost","root",""); // or die (mysqli_error());
        mysqli_select_db($conn,"quanlydienthoai"); // or die (mysqli_error());
        mysqli_query($conn, "SET NAMES 'utf8'");
        return $conn;
    }

?>