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
          <h2><b>A patriot Shows his patroitism by his Actions....</b></h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="cwc.php">Home</a></li>
          <li><a href="userpage.php">User login</a></li>
          <li><a href="stationpage.php">Station Login</a></li>
          <li><a href="adminpage.php">Admin Login</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner" ></div>
	  <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
            <h3><font color='red'>Emergency News</font></h3>
            <ul>
            <marquee direction="up" scrolldelay="150">
                <?php
                include_once("cwcblogic.php");
                $select="select * from emergency";
                $r=blogic::executequery($select);
                if($r)
                {
                  while($rs=mysql_fetch_array($r,MYSQL_NUM))           
                  {
                    ?>
                  <li><?php echo "$rs[1]";?></li>  
                  <?php
                  }                 
                }
                ?>
                </marquee>
            </ul>
          </div>
          <div class="sidebar_base"></div>
        </div>
        <div class="sidebar">
          </div>
        <div class="sidebar">
          </div>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1><b><font size="20px">Crime over time</font></b></h1>
        <p><b>A report published by the National Crime Records Bureau compared the crime rates of 1953 and 2006.
         The report noted that burglary (known as house-breaking in India) declined over a period of 53 years
         by 79.84% (from 147,379, a rate of 39.3/100,000 in 1953 to 91,666, a rate of 7.9/100,000 in 2006), 
         murder has increased by 7.39% (from 9,803, a rate of 2.61 in 1953 to 32,481, a rate of 2.81/100,000 in 2006).
         Kidnapping has increased by 47.80% (from 5,261, a rate of 1.40/100,000 in 1953 to 23,991, a rate of 2.07/100,000 in 2006),
         robbery has declined by 28.85% (from 8,407, rate of 2.24/100,000 in 1953 to 18,456, rate of 18,456 in 2006) 
         and riots have declined by 10.58% (from 20,529, a rate of 5.47/100,000 in 1953 to 56,641, a rate of 4.90/100,000 in 2006).
        In 2006, 5,102,460 cognisable crimes were committed including 1,878,293 Indian Penal Code (IPC) 
        crimes and 3,224,167 Special & Local Laws (SLL) crimes, with an increase of 1.5% over 2005 (50,26,337).
        IPC crime rate in 2006 was 167.7 compared to 165.3 in 2005 showing an increase of 1.5% in 2006 over 2005.
         SLL crime rate in 2006 was 287.9 compared to 290.5 in 2005 showing a decline of 0.9% in 2006 over 2005.</b></p>
        <p><img src="content.png" /></p>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
        <p>Copyright &copy; Sushil Jain&TRADE;</p>
    </div>
  </div>
</body>
</html>