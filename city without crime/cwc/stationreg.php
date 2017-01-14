<!DOCTYPE HTML>
<html>

<head>
  <title>City without Crime</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="#">INDIAN POLICE</a></h1>
          <h2>Welcomes Admin- <b>
          <?php 
          session_start();
          include_once("cwcblogic.php");
          $r=$_SESSION['name'];
          echo $r;
          ?></b>
          </h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="adminhome.php">Home</a></li>
          <li><a href="recvcomplain.php">Recieved Complains</a></li>
          <li><a href="admincriminal.php">Add New Criminal</a></li>
          <li><a href="editcriminal.php">Edit Criminal Records</a></li>
          <li><a href="adminlogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h2>Update Items</h2>
            <ul>
              <li><a href="emergencynews.php">Edit emergency news</a></li>
              <li><a href="stationreg.php">Register for new stations</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <?php
        //session_start();
        if(isset($_SESSION['name']))
        {?>

        <center>
        <form method="post">
        <table cellspacing="10px">
        <tr><th align='left'>Station ID</th><td><input type="text" name="pid" maxlength="5"/></td></tr>
        <tr><th align='left'>Station Name</th><td><input type="text" name="pname" /></td></tr>
        <tr><th align='left'>Address</th><td><textarea rows="2" cols="30" name="padd"></textarea></td></tr>
        <tr><th align='left'>Mobile</th><td><input type="text" name="pmob" maxlength="10" /></td></tr>
        <tr><th align='left'>Phone</th><td><input type="text" name="pphn" maxlength="10" /></td></tr>
        <tr><th align='left'>Station Head</th><td><input type="text" name="phead" /></td></tr>
        <tr><th align='left'>Password</th><td><input type="password" name="ppass" /></td></tr>
        <tr><th align='left'>Captcha</th><td>
        <img src="captcha.php" width="120px" height="70px"/><br /><br />
        <input type="text" name="cap" />
        </td></tr>
        </table>
        
        <!--<input type="submit" name="sub" value="Check it now" />-->
        <input type="submit" name="sub" value="Register" />
        </form>
        <?php
        include_once("cwcblogic.php");
        if(isset($_REQUEST['sub']))
        {
                $id=$_POST['pid'];
                $sname=$_POST['pname'];
                $add=$_POST['padd'];
                $mob=$_POST['pmob'];
                $phn=$_POST['pphn'];
                $head=$_POST['phead'];
                $pass=$_POST['ppass'];
        
                if($_REQUEST['cap']==$_SESSION['str'])
                {
                    if(!empty($id) && !empty($sname) && !empty($add) &&!empty($mob) && !empty($phn) && !empty($head) &&!empty($pass))
                    {
                      $check="select * from police_station_master where pstation_id='$id'";
                      $rs=blogic::executequery($check);
                      if(mysql_affected_rows())
                      {
                        echo "<br /><font color='red'><b>Police station ID already exists</b></font>";
                      }
                      else
                      {
                        $forinsert="insert into police_station_master values('$id','$sname','$add','$phn','$mob','$head','$pass')";
                        if(blogic::executequery($forinsert))
                          {
                            echo "<font color='red'>Registered successfully</font><br /><br />";
                          }
                        
                      }
                    }
                    else
                    {
                        echo "<font color='red'><b>Please provide all information</b></font>";
                    }
                }
                else
                {
                    echo "Wrong captcha";
                }
            }
            }
            else
            {
                header("location:adminpage.php");
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