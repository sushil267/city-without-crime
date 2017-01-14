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
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="stationlogin.php">Home</a></li>
          <li><a href="criminallist.php">See Criminals list</a></li>
          <li><a href="stationedit.php">Edit station details</a></li>
          <li class="selected"><a href="addcriminal.php">Add new criminal</a></li>
          <li><a href="stationlogout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <h2>Useful Links</h2>
            <ul>
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
            <form method="post" enctype="multipart/form-data">
            <table>
            <tr><th align='left'>Enter Criminal ID</th><td><input type="text" name="id"/></td></tr>
            <tr><th align='left'>Name</th><td><input type="text" name="name"/></td></tr>
            <tr><th align='left'>Gender</th><td><input type="radio" name="gen" value="male"/>Male&nbsp;&nbsp;<input type="radio" name="gen" value="female"/>Female</td></tr>
            <tr><th align='left'>Height(in cms)</th><td><input type="text" name="height"/></td></tr>
            <tr><th align='left'>Weight(in kgs)</th><td><input type="text" name="weight"/></td></tr>
            <tr><th align='left'>Police Station ID</th><td><input type="text" name="pid"/></td></tr>
            <tr><th align='left'>Crime Level</th><td><input type="text" name="crime"/></td></tr>
            <tr><th align='left'>Status</th><td><input type="text" name="status"/></td></tr>
            <tr><th align='left'>Criminal piture</th><td><input type="file" name="pic"/></td></tr>
            </table>
            <input type="submit" name="sub" value="Submit" /><br /><br />
            <!--<input type="submit"  name="register" value="Register"  /><br /><br />-->
            </form>
            <?php
        session_start();
        if(isset($_SESSION['id']))
        {
            include_once('cwcblogic.php');
            if(isset($_REQUEST['sub']))
            {
                $id=$_REQUEST['id'];
                $name=$_REQUEST['name'];
                $gen=$_REQUEST['gen'];
                $height=$_REQUEST['height'];
                $weight=$_REQUEST['weight'];
                $pid=$_REQUEST['pid'];
                $crime=$_REQUEST['crime'];
                $status=$_REQUEST['status'];
                $imgdata="";
                if($_FILES['pic']['error']==0)
                {
                    $tmpname=$_FILES['pic']['tmp_name'];
                }
                $handler=@fopen($tmpname,'r');
                $fread=@fread($handler,filesize($tmpname));
                $mime=$_FILES['pic']['type'];
                //echo $mime;
                if(!$imgdata=addslashes($fread))
                {
                    echo "file could not be read<br />";
                }
                $insert="insert into criminal_master values('$id','$name','$gen','$height','$weight','$pid','$crime','$status','$imgdata')";
                if(blogic::executequery($insert))
                {
                    echo "registered successfully";
                }
            }
        }
        else
        {
            header("location:stationpage.php");
        }
        
        ?>
        </center>
      </div>
    </div>
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div id="content_footer"></div>
    <div id="footer">
    <p>Copyright &copy; Sushil jain</p>
    </div>
  </div>
</body>
</html>
