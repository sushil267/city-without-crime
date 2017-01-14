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
          <h2>Welcomes <b>
          <?php 
          session_start();
          include_once("cwcblogic.php");
          $r=$_SESSION['Username'];
          echo $r;
          ?></b>
          </h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="userlogin.php">Home</a></li>
          <li><a href="usercomplains.php">User complaints</a></li>
          <li class="selected"><a href="useredit.php">Edit your details</a></li>
          <li><a href="userlogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
	  <div id="sidebar_container">
        <div class="sidebar"></div>
        <div class="sidebar">
          
        </div>
    </div>
      <div id="content">
        <!-- insert the page content here -->
        <center>
        <?php
        if(isset($_SESSION['Username']))
        {
            include_once("cwcblogic.php");
            $rs=$_SESSION['Username'];
            $copy=$_SESSION['Username'];
            $select = "select * from login_master where username='$rs'";
            if($r=blogic::executequery($select))
            {
                if($row = mysql_fetch_row($r))
                {
                ?>
        <form method="post">
        <table cellspacing="10px">
        <tr><th align='left'>Username(Email)</th><td><input type="mail" name="umail" value="<?php echo $row[0];?>" /></td></tr>
        <tr><th align='left'>Password</th><td><input type="password" name="pass" value="<?php echo $row[1];?>" /></td></tr>
        <tr><th align='left'>Mobile</th><td><input type="text" name="mob" maxlength="10" value="<?php echo $row[2];?>" /></td></tr>
        <tr><th align='left'>Full Name</th><td><input type="text" name="fname" value="<?php echo $row[3];?>"/></td></tr>
        <tr><th align='left'>Address</th><td><textarea rows="2" cols="30" name="add"><?php echo $row[4];?></textarea></td></tr>
        <tr><th align='left'>Captcha</th><td>
        <img src="captcha.php" width="120px" height="70px"/><br /><br />
        <input type="text" name="cap" />
        </td></tr>
        </table>
        <input type="submit" name="sub1" value="Update" />
        </form>
        <?php
        }
        }
        if(isset($_REQUEST['sub1']))
        {
            $umail=$_POST['umail'];
            $pass=$_POST['pass'];
            $mobile=$_POST['mob'];
            $fname=$_POST['fname'];
            $add=$_POST['add'];
            if($_REQUEST['cap']==$_SESSION['str'])
            {
                if(!empty($umail) && !empty($pass) && !empty($mobile) &&!empty($fname) && !empty($add))
                {
                  $update="update login_master set username='$umail',password='$pass',mobile='$mobile',full_name='$fname',address='$add' where username='$copy'";
                  if(blogic::executequery($update))
                  {
                    echo "<br /><font color='green'><b>Updated successfully</b></font>";
                  }
                }
                else
                {
                   echo "<font color='black'>Please provide all information</font>";
                }  
            }
            else
            {
                echo "<font color='red'><b>Wrong captcha</b></font>";
            }
        }
        }
        else
        {
            header("location:userpage.php");
        }
        ?>
        <br /><br /><br /><br />
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