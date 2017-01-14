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
          $r=$_SESSION['station name'];
          echo $r;
          ?></b>
          </h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="stationlogin.php">Home</a></li>
          <li><a href="criminallist.php">See Criminals list</a></li>
          <li><a href="stationedit.php">Edit station details</a></li>
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
              <li><a href="stationlist.php">List of police stations</a></li>
              <li><a href="stationr2f.php">Right to Information</a></li>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
    </div>
      <div id="content">
        <center>
        <?php
        //session_start();
        if(isset($_SESSION['id']))
        {
        include_once("cwcblogic.php");
        $view="select * from police_station_master";
        $r=blogic::executequery($view);
        if($r)
        {
            echo"<center><table cellspacing='0' cellpadding='9px' border='1px' width='100%' height='100%' >";
            echo"<tr><th>Station ID</th><th>Station Name</th><th>Address</th><th>Phone</th><th>Mobile</th><th>Police Station Head</th></tr>";
            while($rs=mysql_fetch_array($r,MYSQL_NUM))            
            {
                echo "<tr><td>$rs[0]</td><td>$rs[1]</td><td>$rs[2]</td><td>$rs[3]</td><td>$rs[4]</td><td>$rs[5]</td>";
            }
        
        }
        }
        else
        {
            header("location:stationpage.php");
        }
        ?>
        <br /><br /><br /><br /><br /><br /><br /><br />
        </center>
      </div>
    </div>
    
  </div>
</body>
</html>