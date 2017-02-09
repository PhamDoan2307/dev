<?php
session_start();
class Utils
{
    static function check_login()
    {
        if(isset($_SESSION['uUser']) && $_SESSION['uAdmin']==1)
        {

        }
        else
        {
            header("location:../../Views/Frontend/index.php");
        }
    }
    static function check_user()
    {
        if(isset($_SESSION['uUser']))
        {
        }
        else
        {
            header("location:index.php");
        }
    }
}
?>