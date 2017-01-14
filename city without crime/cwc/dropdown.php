<form method="post">
police station id:
<select name="id">
<?php 
include_once("cwcblogic.php");
            $select="select * from police_station_master";
            $r=blogic::executequery($select);
            if(mysql_affected_rows())
            {
                while($rs=mysql_fetch_array($r,MYSQL_NUM))            
                {
            ?>
<option value="<?php echo "$rs[0]"?>"><?php echo "$rs[1]" ?></option>
<?php }}?>
</select>
</form>