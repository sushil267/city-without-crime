<!DOCTYPE HTML>
<html>

<head>
  <title>City without Crime</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body >
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="cwc.php">INDIAN POLICE </a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="stationlogin.php">Home</a></li>
          <li><a href="criminallist.php">See Criminals list</a></li>
          <li class="selected"><a href="stationedit.php">Edit station details</a></li>
          <li><a href="addcriminal.php">Add new criminal</a></li>
          <li><a href="stationlogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
	  <div id="sidebar_container">
        <div class="sidebar"></div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h2>Useful Links</h2>
            <ul>
              <li><a href="list.php">List of police stations</a></li>
              <li><a href="r2f.php">Right to Information</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
    </div>
      <div id="content">
        <!-- insert the page content here -->
        <center>
        <?php
        session_start();
        if(isset($_SESSION['id']))
        {
            include_once("cwcblogic.php");
            $rs=$_SESSION['id'];
            $copy=$_SESSION['id'];
            $select = "select * from police_station_master where pstation_id='$rs'";
            if($r=blogic::executequery($select))
            {
                if($row = mysql_fetch_row($r))
                {
                ?>
        <form method="post">
        <table cellspacing="10px" width=''>
        <tr><th align='left'>Station ID</th><td><input type="text" name="pid" maxlength="5" value="<?php echo "$row[0]";?>"/></td></tr>
        <tr><th align='left'>Station Name</th><td><input type="text" name="pname" value="<?php echo "$row[1]";?>" /></td></tr>
        <tr><th align='left'>Address</th><td><textarea rows="2" cols="30" name="padd"><?php echo "$row[2]";?></textarea></td></tr>
        <tr><th align='left'>Phone</th><td><input type="text" name="pphn" maxlength="10" value="<?php echo "$row[3]";?>" /></td></tr>
        <tr><th align='left'>Mobile</th><td><input type="text" name="pmob" maxlength="10" value="<?php echo "$row[4]";?>" /></td></tr>
        <tr><th align='left'>Station Head</th><td><input type="text" name="phead" value="<?php echo "$row[5]";?>" /></td></tr>
        <tr><th align='left'>Password</th><td><input type="password" name="ppass" value="<?php echo "$row[6]";?>" /></td></tr>
        <tr><th>Captcha</th><td>
        <img src="captcha.php" width="120px" height="70px"/><br /><br />
        <input type="text" name="cap" />
        </td></tr>
        </table>
        <!--<input type="submit" name="sub" value="Check it now" />-->
        <input type="submit" name="sub" value="Update" />        
        </body>
        </form>
        <?php
        }
        }
        if(isset($_REQUEST['sub']))
        {
            $id=$_POST['pid'];
            $name=$_POST['pname'];
            $add=$_POST['padd'];
            $mob=$_POST['pmob'];
            $phn=$_POST['pphn'];
            $head=$_POST['phead'];
            $pass=$_POST['ppass'];
        
            if($_REQUEST['cap']==$_SESSION['str'])
            {
                if(!empty($id) && !empty($name) && !empty($add) &&!empty($mob) && !empty($phn) && !empty($head) &&!empty($pass))
                {
                    $update="update police_station_master set pstation_id='$id',pstation_name='$name',address='$add',phone='$phn',mobile='$mob',pstation_head='$head',password='$pass' where pstation_id='$copy'";
                    if(blogic::executequery($update))
                      {
                        echo "<font color='black'>updated successfully</font><br /><br />";
                      }
                }
                else
                {
                   echo "<font color='black'>Please provide all information</font>";
                }  
            }
            else
            {
                echo "<font color='black'>wrong captcha</font>";
            }
        }
        if(isset($_REQUEST['back']))
        {
            header("location:stationlogin.php");
        }
        }
        else
        {
            header("location:stationpage.php");
        }
        ?>
                
        </center>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
        <p>Copyright &copy; Sushil Jain&TRADE;</p>
    </div>
  </div>
</body>
</html>