<?php
        session_start();
        if(isset($_SESSION['name']))
        {
            include_once("cwcblogic.php");
            $rs=$_REQUEST['sn1'];
            $del="delete from emergency where sno=$rs";
            if(blogic::executequery($del))
                {
                    header("location:emergencynews.php");
                }
        }
        else
        {
            header("location:adminpage.php");
        }
?>
