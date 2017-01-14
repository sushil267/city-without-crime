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
          <li><a href="userpage.php">User login</a></li>
          <li><a href="stationpage.php">Station Login</a></li>
          <li class="selected"><a href="adminpage.php">Admin Login</a></li>
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
            </ul>          </div>
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
        <tr><th>Enter username</th></tr><tr><td><input type="text" name="name" /></td></tr>
        <tr><th>Enter password</th></tr><tr><td><input type="password" name="pass" /></td></tr>
        </table>
        <input type="submit" value="Login" name="sub" />
        </form>
        <?php
            if(isset($_REQUEST['sub']))
            {
                include_once('cwcblogic.php');
                $name=$_REQUEST['name'];
                $pass=$_REQUEST['pass'];
                $select="select * from admin where username='$name' and password='$pass'";
                $r=blogic::executequery($select);
                if(mysql_affected_rows()>0)
                {    
                    if($row=mysql_fetch_row($r))
                    {
                        session_start();
                        $_SESSION['name']=$row[0];
                        header("location:adminlogin.php?"); 
                    }
                 }
                 else
                 {
                    echo "<font color='red'><b>Please enter valid username and password</b></font>";
                 }       
            }?>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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