<?php
require('cwcblogic.php');
if(isset($_GET['i']))
{
    if((int)$_GET['i']>0)
    {
        $select="select * from criminal_master where criminal_id=".$_GET['i'];
        $rs=blogic::executequery($select);
        if($row=mysql_fetch_array($rs,MYSQL_ASSOC))
        {
            $mime=$row['image_type'];
            header("Content-type:$mime");
            echo $row['criminal_picture'];
        }
    }
}


?>