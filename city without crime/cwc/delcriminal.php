<?php
session_start();
if(isset($_SESSION['name']))
{
    include_once("cwcblogic.php");
    $id=$_REQUEST['id'];
    $delete="delete from criminal_master where criminal_id='$id'";
    if($r=blogic::executequery($delete))
    {
        header("location:editcriminal.php");   
    }
}
else
{
    header("location:adminpage.php");
}
?>