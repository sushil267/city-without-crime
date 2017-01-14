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
      <div id="sidebar_container">
        <div class="sidebar">
        </div>
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h2>Update Items</h2>
            <ul>
              <li><a href="emergencynews.php">Edit emergency news</a></li>
              <li><a href="#">Register for new stations</a></li>
              <li><a href="#">List of police stations</a></li>
              <li><a href="#">Right to Information</a></li>
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
            include_once("cwcblogic.php");
            $rs=$_REQUEST['sn'];
            $select = "select * from emergency where sno=$rs";
            if($r=blogic::executequery($select))
            {
                if($row = mysql_fetch_row($r))
                {
                ?>
                <form method="post">
                <table cellspacing="0" width="100%">
                <tr><th>Complain no</th><th>Description</th></tr>
                <tr><td><?php echo "$row[0]";?></td><td><textarea rows="1" cols="65" name="des"><?php echo "$row[1]";?></textarea></td></tr>";
                </table>
                <input type="submit" value="Update" name="sub" />
                </form>
            <?php
                }
            }
            if(isset($_REQUEST['sub']))
            {
                $des=$_REQUEST['des'];
                $update="update emergency set description='$des' where sno=$rs";
                if(blogic::executequery($update))
                {
                    header("location:emergencynews.php?msg=1");
                }
                else
                {
                    echo "sorry";
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
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div id="content_footer"></div>
    <div id="footer">
    <p>Copyright &copy; Sushil Jain</p>
    </div>
  </div>
</body>
</html>