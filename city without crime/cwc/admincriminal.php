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
          <li><a href="adminhome.php">Home</a></li>
          <li><a href="recvcomplain.php">Recieved Complains</a></li>
          <li class="selected"><a href="admincriminal.php">Add New Criminal</a></li>
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
 //           session_start();
            if(isset($_SESSION['name']))
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
                    $insert="insert into criminal_master values('$id','$name','$gen','$height','$weight','$pid','$crime','$status','$imgdata','$mime')";
                    if(blogic::executequery($insert))
                    {
                        echo "<font color='green'><b>Registered successfully</b></font>";
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
    <br /><br /><br /><br /><br /><br />
    <div id="content_footer"></div>
    <div id="footer">
    <p>Copyright &copy; Sushil Jain</p>
    </div>
  </div>
</body>
</html>

