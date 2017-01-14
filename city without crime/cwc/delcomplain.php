<?php
session_start();
if(isset($_SESSION['name']))
{
    include_once("cwcblogic.php");
    $id=$_REQUEST['id'];
    $delete="delete from complaint where id=$id";
    if($r=blogic::executequery($delete))
    {
        header("location:recvcomplain.php");   
    }
}
else
{
    header("location:adminpage.php");
}
?>