<?php
require_once('cwcconfig.php');
class blogic
{
    function getconection()
    {
        $link=mysql_connect(HOST,USER,PASSWORD);
        if($link)
        {
            return $link;
        }
        else
        {
            return false;
        }
    }
    function getdatabase()
    {
        if(mysql_select_db(DATABASE))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function executequery($qr)
    {
        self::getconection();
        self::getdatabase();
        $num=mysql_query($qr);
        return $num;
    }
}
?>