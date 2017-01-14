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
    <div id="banner" ></div>
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
              <li><a href="adminreg.php">Admin Registration</a></li>
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
        if(isset($_SESSION['name']))
        {
           ?>
        <form method="post">
        <table>
        <tr><th>Enter username</th></tr><tr><td><input type="text" name="name" /></td></tr>
        <tr><th>Enter password</th></tr><tr><td><input type="password" name="pass" /></td></tr>
        </table>
        <input type="submit" value="Register" name="sub" />
        </form>
        <?php
            if(isset($_REQUEST['sub']))
            {
                include_once('cwcblogic.php');
                $name=$_REQUEST['name'];
                $pass=$_REQUEST['pass'];
                $insert="insert into admin values('$name','$pass')";
                $r=blogic::executequery($insert);
                if($r)
                {
                    //header("location:adminreg.php");
                    echo "<font color='green'>Registered Successfully</font>";
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