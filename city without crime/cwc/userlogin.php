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
          <h1><a href="#">INDIAN POLICE </a></h1>
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
          <li class="selected"><a href="userlogin.php">Home</a></li>
          <li><a href="usercomplains.php">User complaints</a></li>
          <li><a href="useredit.php">Edit your details</a></li>
          <li><a href="userlogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner" ></div>
	  <div id="sidebar_container">
        <div class="sidebar"></div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h2>Useful Links</h2>
            <ul>
              <li><a href="complain.php">Report a complain</a></li>
              <li><a href="list.php">List of police stations</a></li>
              <li><a href="r2f.php">Right to Information</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
    </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Here you can see your complain updates,as well you can edit your profile,you can get information of various police stations among their contact numbers.</h1>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
        <p>Copyright &copy; Sushil Jain&TRADE;</p>
    </div>
  </div>
</body>
</html>

<?php
if(isset($_SESSION['Username']))
{
    
}
else
{
    header("location:userpage.php");
}
?>