<?php
include_once("cwcblogic.php");
session_start();
if(isset($_SESSION['id']))
{
    unset($_SESSION['id']);
    session_destroy();
    header("location:stationpage.php");
}
else
{
    header("location:stationpage.php");
}
?>