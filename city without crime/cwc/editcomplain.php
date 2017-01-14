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
          <li class="selected"><a href="usercomplains.php">User complaints</a></li>
          <li><a href="useredit.php">Edit your details</a></li>
          <li><a href="userlogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
	 <div id="content">
        <!-- insert the page content here -->
        <center>
        <?php
        if(isset($_SESSION['Username']))
        {   
            include_once("cwcblogic.php");
            $id=$_REQUEST['id'];
            $select = "select * from complaint where id='$id'";
            if($r=blogic::executequery($select))
            {
                if($row = mysql_fetch_row($r))
                {
                ?>
        <form method="post">
        <table cellspacing='10px'>
        <tr><th align='left'>Description</th><td><textarea rows="5" cols="30" name="desc"><?php echo $row[1];?></textarea></td></tr>
        <tr><th align='left'>Police Station ID</th><td><input type="text" name="pid" value="<?php echo $row[2];?>" /></td></tr>
        </table><br />
        <input type="submit" name="sub" value="Update" />
        </form>
        <?php
        }}
        //include_once("cwcblogic.php");
        if(isset($_REQUEST['sub']))
        {
            $des=$_POST['desc'];
            $id=$_POST['pid'];
            $s=$_REQUEST['id'];
            $update="update complaint set description='$des',pstation_id=$id where id=$s";  
            if($r=blogic::executequery($update))
            {
                header("location:usercomplains.php?msg=1");        
            }
        }
        
        }
        else
        {
            header("location:userpage.php");
        }
        
        ?>
        </center>      
      </div>
    </div>
    </div>
</body>
</html>