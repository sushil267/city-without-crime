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
      <div id="sidebar_container">
        <div class="sidebar">
          </div>
        <div class="sidebar">
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
            $rs=$_REQUEST['id'];
            $copy=$_REQUEST['id'];
            $select = "select * from criminal_master where criminal_id='$rs'";
            if($r=blogic::executequery($select))
            {
                if($row = mysql_fetch_row($r))
                {
                ?>
            <form method="post" enctype="multipart/form-data">
            <table>
            <tr><th align='left'>Enter Criminal ID</th><td><input type="text" name="id" value="<?php echo "$row[0]";?>"/></td></tr>
            <tr><th align='left'>Name</th><td><input type="text" name="name" value="<?php echo "$row[1]";?>"/></td></tr>
            <tr><th align='left'>Gender</th><td><?php
            if($row[2]=="male")
            { 
            ?>
            <input type="radio" name="gen" value="male" checked="" />Male &nbsp;&nbsp;&nbsp;<input type="radio" name="gen" value="female" />Female </td></tr>
            <?php
            }
            if($row[2]=="female")
            {
            ?>
            <input type="radio" name="gen" value="male" />Male &nbsp;&nbsp;&nbsp;<input type="radio" name="gen" value="female" checked="" />Female </td></tr>
            <?php
            }
            ?>  
            <tr><th align='left'>Height(in cms)</th><td><input type="text" name="height" value="<?php echo "$row[3]";?>"/></td></tr>
            <tr><th align='left'>Weight(in kgs)</th><td><input type="text" name="weight" value="<?php echo "$row[4]";?>"/></td></tr>
            <tr><th align='left'>Police Station ID</th><td><input type="text" name="pid" value="<?php echo "$row[5]";?>"/></td></tr>
            <tr><th align='left'>Crime Level</th><td><input type="text" name="crime" value="<?php echo "$row[6]";?>"/></td></tr>
            <tr><th align='left'>Status</th><td><input type="text" name="status" value="<?php echo "$row[7]";?>"/></td></tr>
            <tr><th align='left'>Criminal piture</th><td>Cannot be changed</td></tr>
            </table>
            <input type="submit" name="sub" value="Update" /><br /><br />
            <!--<input type="submit"  name="register" value="Register"  /><br /><br />-->
            </form>
            <?php
            }
            }
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
                    $update="update criminal_master set criminal_id='$id',name='$name',gender='$gen',height='$height',weight='$weight',pstation_id='$pid',crime_level='$crime',status='$status' where criminal_id='$copy'";
                    if(blogic::executequery($update))
                    {
                        echo "<font color='green'><b>Updated successfully</b></font>";
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
    <p>Copyright &copy; MTA-INDIA</p>
    </div>
  </div>
</body>
</html>

