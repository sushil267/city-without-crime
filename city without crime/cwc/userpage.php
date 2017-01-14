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
          <li><a href="cwc.php">Home</a></li>
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
            <table>
            <tr><th align='left'>Enter Username</th></tr><td><input type="text" name="uname"/></td></tr>
            <tr><th align='left'>Password</th></tr><td><input type="password" name="pass"/></td></tr>
            </table>
            <input type="submit" name="login" value="Sign in" /><br /><br />
            <input type="submit"  name="register" value="Register"  /><br /><br />
            </form>
            <?php
            if(isset($_REQUEST['login']))
            {
                include_once('cwcblogic.php');
                $uname=$_REQUEST['uname'];
                $pass=$_REQUEST['pass'];
                $select="select * from login_master where username='$uname' and password='$pass'";
                $r=blogic::executequery($select);
                //echo $r;
                if(mysql_affected_rows()>0)
                {    
                    if($row=mysql_fetch_row($r))
                    {
                        session_start();
                        $_SESSION['Username']=$row[0];
                        header("location:userlogin.php?"); 
                    }
                 }
                 else
                 {
                    echo "<font color='red'><b>Please enter valid username and password</b></font>";
                 }       
            }
            if(isset($_REQUEST['register']))
            {
                header("location:userreg.php");
            }
            if(isset($_GET['msg']))
            {
                echo "Registered successfully";
            }
            ?>
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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