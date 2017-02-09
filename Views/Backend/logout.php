<?php
session_start();
unset($_SESSION["uUser"]);
unset($_SESSION["uAdmin"]);
 header('location:Login_view.php')
?>