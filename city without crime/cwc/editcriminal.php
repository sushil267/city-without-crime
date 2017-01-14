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
          <li><a href="adminlogin.php">Home</a></li>
          <li><a href="recvcomplain.php">Recieved Complains</a></li>
          <li><a href="admincriminal.php">Add New Criminal</a></li>
          <li class="selected"><a href="editcriminal.php">Edit Criminal Records</a></li>
          <li><a href="adminlogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="content">
        <!-- insert the page content here -->
        <center>
        <?php
//        session_start();
        if(isset($_SESSION['name']))
        {
            include_once("cwcblogic.php");
            $select = "select * from criminal_master";
            if($r=blogic::executequery($select))
            {
                echo"<table cellspacing='0' cellpadding='1px' border='1px' width='600px' >";
                echo"<tr><th>Criminal ID</th><th>Name</th><th>Gender</th><th>Height</th><th>Weight</th><th>Police Station ID</th><th>Crime Level</th><th>Status</th><th>Picture</th><th>Action</th></tr>";
                while($rs=mysql_fetch_array($r,MYSQL_NUM))            
                {
                    echo"<tr><td>$rs[0]</td><td>$rs[1]</td><td>$rs[2]</td><td>$rs[3]</td><td>$rs[4]</td><td>$rs[5]</td><td>$rs[6]</td><td>$rs[7]</td><td><img src='criminalpic.php?i=$rs[0]' width='100px' height='100px'/></td><td><a href='editcriminal1.php?id=$rs[0]'>Edit</a>|<a href='delcriminal.php?id=$rs[0]'>Delete</a></td></tr>";
                }
                echo "</table>";
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

