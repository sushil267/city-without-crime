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
          <h2>Welcome Admin.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="adminlogin.php">Home</a></li>
          <li class="selected"><a href="recvcomplain.php">Recieved Complains</a></li>
          <li><a href="admincriminal.php">Add New Criminal</a></li>
          <li><a href="editcriminal.php">Edit Criminal Records</a></li>
          <li><a href="adminlogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="sidebar_container"></div>
      <div id="content">
        <!-- insert the page content here -->
        <center>
        <?php
        session_start();
        if(isset($_SESSION['name']))
        { $v="solved";$b="unsolved";
        
            include_once("cwcblogic.php");
            $select="select * from complaint ";
            $r=blogic::executequery($select);
            if($r)
            {
                echo"<table cellspacing='0' cellpadding='1px' border='1px' width='600px' >";
                echo"<tr><th width='30px'>Complain ID</th><th width='300px'>Complains</th><th width='180px'>Police station ID</th><th>User ID</th><th>Action</th><th>Status</th></tr>";
                while($rs=mysql_fetch_array($r,MYSQL_NUM))            
                { 
                    echo"<tr><td>$rs[0]</td><td>$rs[1]</td><td>$rs[2]</td><td>$rs[4]</td><td><a href='delcomplain.php?id=$rs[0]'>Delete</a></td><td><a href='solved.php?id=$rs[0]&st=$v'>solved</a>/<a href='unsolved.php?id=$rs[0]&st=$b'>unsolved</a></td></tr>";
                   
                }
                
                echo "</table>";
            }
            else
            {
                echo "No complains found";
            }
            
           @$v=$_REQUEST['st'];
            $id=$_REQUEST['id'];
            $select="update complaint set status='$v' where id='$id'";
            if(blogic::executequery($select))
            {
                ?>
                <center><font color='green'>Information Updated!!!</font></center>
                <?php
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
      </div>
</body>
</html>

