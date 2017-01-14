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
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <center>
        <?php
        if(isset($_SESSION['name']))
        {
            $select="select * from emergency order by sno asc";
            $r=blogic::executequery($select);
            if($r)
            {
                echo"<table cellspacing='0' width='100%'>";
                echo"<tr><th>Complain no</th><th>Description</th><th>Edit</th></tr>";
                while($rs=mysql_fetch_array($r,MYSQL_NUM))            
                {
                    echo"<tr><td>$rs[0]</td><td>$rs[1]</td><td><a href='editnews.php?sn=$rs[0]'>Edit</a>/<a href='delnews.php?sn1=$rs[0]'>Delete</a></tr>";
                }
                echo "</table>";
            }
        if(isset($_GET['msg']))
             {
                echo "<font color='green'><b>Updated successfully</b></font>";
             } 
            
        ?>
        <button onclick="addnews()">Add News</button>      
        <br /><br />
        <form method="post">
        <div style="display:none" id="news">
        <table>
        <tr>
        <td><strong>Enter the Description</strong></td>
        <td><textarea name="desc" rows="3" cols="30"></textarea></td>
        </tr>
        </table>
        <input type="submit" value="Submit" name="sub" />
        
        <?php
        if(isset($_REQUEST['sub']))
        {
           $news=$_REQUEST['desc'];
           if(!empty($news))
           {
            $insert="insert into emergency values('','$news')";
            if(blogic::executequery($insert))
                {
                    header("location:emergencynews.php");
                }
           }
           else
            echo "Dont leave it blank";
        }?>
        </div>
        <?php
        }
        else
        {
            header("location:adminpage.php");
        }
        ?>
        </form>
        </center>
      </div>
    </div>
    <script>
    function addnews(){
        if(document.getElementById("news").style.display=="none")
            document.getElementById("news").style.display = "block";
        else
            document.getElementById("news").style.display = "none";
    }
    </script>
    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <div id="content_footer"></div>
    <div id="footer">
    <p>Copyright &copy; Sushil Jain</p>
    </div>
  </div>
</body>
</html>