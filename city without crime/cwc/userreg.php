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
          <h1><a href="cwc.php">INDIAN POLICE</a></h1>
          <h2><b>A patriot Shows his patroitism by his Actions....</b></h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.php">Home</a></li>
          <li class="selected"><a href="userpage.php">User login</a></li>
          <li><a href="stationpage.php">Station Login</a></li>
          <li><a href="adminpage.php">Admin Login</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3><font color='red'>Emergency News</font></h3>
            <ul>
                <?php
                include_once("cwcblogic.php");
                $select="select * from emergency";
                $r=blogic::executequery($select);
                if($r)
                {
                  while($rs=mysql_fetch_array($r,MYSQL_NUM))           
                  {
                    ?>
                  <li><?php echo "$rs[1]";?></li>  
                  <?php
                  }                 
                }
                ?>
            </ul>
            </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          
        </div>
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <center>
            <form method="post">
            <table cellspacing="10px">
            <tr><th align='left'>Username(Email)</th><td><input type="mail" name="umail"/></td></tr>
            <tr><th align='left'>Password</th><td><input type="password" name="pass" /></td></tr>
            <tr><th align='left'>Mobile</th><td><input type="text" name="mob" maxlength="10" /></td></tr>
            <tr><th align='left'>Full Name</th><td><input type="text" name="fname"/></td></tr>
            <tr><th align='left'>Address</th><td><textarea rows="2" cols="30" name="add"></textarea></td></tr>
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
                        session_start();
                        if(isset($_REQUEST['sub']))
                        {
                                $umail=$_POST['umail'];
                                $pass=$_POST['pass'];
                                $mob=$_POST['mob'];
                                $fname=$_POST['fname'];
                                $add=$_POST['add'];
                                if($_REQUEST['cap']==$_SESSION['str'])
                                {
                                    $bit=1;
                                    if(!empty($umail) && !empty($pass) && !empty($mob) &&!empty($fname) && !empty($add))
                                    {
                                      $forinsert="insert into login_master values('$umail','$pass','$mob','$fname','$add',$bit)";
                                      if(blogic::executequery($forinsert))
                                      {
                                        header("location:userpage.php?msg=1");
                                      }
                                    }
                                    else
                                    {
                                       echo "<font color='white'>Please provide all information</font>";
                                    }  
                                }
                                else
                                {
                                    echo "<font color='red'>wrong captcha</font>";
                                }
                        }
            ?>
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        </center>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
    <p>Copyright &copy; MTA-INDIA</p>
    </div>
  </div>
</body>
</html>