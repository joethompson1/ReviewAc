<!DOCTYPE html>
<html>
  <head>
  
  <?php
      session_start();
  ?>


    <link href='css/sidebar.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
      $(document).on('mobileinit', function () {
          $.mobile.ignoreContentEnabled = true;
      });
    </script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='css/override.css' rel='stylesheet'>
    <title>Halls</title>
  <body>

      <!-- Include the Header without the search bar. -->

      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mattress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!--//fonts-->
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/simpleCart.min.js"> </script>
</head>
<body>
  <!--header-->
  <div class="header">
    <div class="header-top">
      <div class="container">
        <div class="social">
          <ul>
            <li><a href="#"><i class="facebok"> </i></a></li>
            <li><a href="#"><i class="twiter"> </i></a></li>
            <li><a href="#"><i class="inst"> </i></a></li>
            <li><a href="#"><i class="goog"> </i></a></li>
            <div class="clearfix"></div>
          </ul>
        </div>
        
    <div class="ca-r">
            <div class="cart box_1">
              </a>
			  <div data-enhance="false">
              <?php if (isset($_SESSION["user"])) {echo "<p><a rel=\"external\" href=\"../AccountSettings/\"> {$_SESSION["user"]} </a></p>";} else echo "<p><a rel=\"external\" href=\"../LoginPage/\">login</a></p>"; ?>
			  </div>
            </div>
          </div>
          <div class="clearfix"> </div>


      </div>
    </div>
    <div data-enhance="false" class="container">
      <div class="head-top">
        <div class="logo">
          <h1><a rel="external" href="../HomePage/">ReviewAc</a></h1>
        </div>
        <div class=" h_menu4">
          <ul class="memenu skyblue">
            </li>
            <li><a rel="external" class="color4" href="../HomePage/">Home</a></li>
            <li><a rel="external" class="color4" href="../AccomadationPage/list.php">Accomadation</a></li>
            <li><a rel="external" class="color4" href="../Forum/list.php">Forum</a></li>
            <?php if (isset($_SESSION["user"])) {echo "<li><a rel=\"external\" class=\"color4\" href=\"../Logout.php\">Log Out</a></li>";} else {echo "<li><a rel=\"external\" class=\"color4\" href=\"../LoginPage/\">login</a></li>";} ?>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
 
     
      <?php
      $catering = '%';
      if (isset($_GET['catering'])) {$catering = $_GET['catering'];}

      $type = '%';
      if (isset($_GET['type'])) {$type = $_GET['type'];}


      if (isset($_GET['minPrice'])) {$minPrice = $_GET['minPrice'];} else {$minPrice = 0;}
      if (isset($_GET['maxPrice'])) {$maxPrice = $_GET['maxPrice'];} else {$maxPrice = 250;}

      if (isset($_GET['undergraduate'])) {$undergraduate = 1;} else {$undergraduate = 0;}
      if (isset($_GET['postgraduate'])) {$postgraduate = 1;} else {$postgraduate = 0;}
      if ($undergraduate == 0 and $postgraduate == 0) {$undergraduate = '%'; $postgraduate = '%';}
      
      ?>
    <!-- products -->
    <!-- grow -->
    <div class="grow">
      <div class="container">
        <h2>Halls</h2>
      </div>
    </div>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <div data-role="main" class="ui-content">
      
        <form data-ajax="false" action="" method="GET">
          <div data-role="rangeslider">
            <label for="minPrice">Price:</label>
            <input type="range" name="minPrice" id="minPrice" value=<?php echo "\"" . $minPrice . "\""; ?> min="50" max="250">
            <label for="maxPrice">Price:</label>
            <input type="range" name="maxPrice" id="maxPrice" value=<?php echo "\"" . $maxPrice . "\""; ?> min="50" max="250">
          </div>
          <p style="font-size: 16px;"> Catering </p>
          <label class="sidebarContainer">Catered/Self Catered
            <input type="radio" name="catering" value = '%' checked>
            <span class="checkmark"></span>
          </label>
          <label class="sidebarContainer">Catered
            <input type="radio" name="catering" value = 'Catered'>
            <span class="checkmark"></span>
          </label>
          <label class="sidebarContainer">Self Catered
            <input type="radio" name="catering" value = 'Self Catered'>
            <span class="checkmark"></span>
          </label>
          <p style="font-size: 16px;"> Student Type </p>
          <label class="sidebarContainer">Undergraduate
            <input type="checkbox" name="undergraduate" value = '1' <?php if (isset($_GET['undergraduate'])) {echo "checked";} ?>>
            <span class="checkmark"></span>
          </label>
          <label class="sidebarContainer">Postgraduate
            <input type="checkbox" name="postgraduate" value = '1' <?php if (isset($_GET['postgraduate'])) {echo "checked";} ?>>
            <span class="checkmark"></span>
          </label>
          <p style="font-size: 16px;"> Type </p>
          <label class="sidebarContainer">University/Private
            <input type="radio" name="type" value = '%' checked>
            <span class="checkmark"></span>
          </label>
          <label class="sidebarContainer">University
            <input type="radio" name="type" value = 'university'>
            <span class="checkmark"></span>
          </label>
          <label class="sidebarContainer">Private
            <input type="radio" name="type" value = 'private'>
            <span class="checkmark"></span>
          </label>
          
          <input type="submit" value="Filter Results">
        </form>
        <script>
          function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
          }
          
          function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
          }
        </script>
      </div>
    </div>
    <!-- grow -->
    <div class="pro-du">
      <div class="container">
        <div class="col-md-9 product1">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Filters</span>
          <div class=" bottom-product">
            <?php
              require_once('./config.inc.php');
              
              
              
              $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);
              
              // Check for errors before doing anything else
              if($conn -> connect_error) {
              	die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
              }
              
              
              
              $sql = "SELECT HallName, Catering, Postgraduate, Undergraduate FROM AccInfo WHERE (`Price` BETWEEN '$minPrice' AND '$maxPrice') AND (`Postgraduate` LIKE '$postgraduate') AND (`Undergraduate` LIKE '$undergraduate') AND (`Catering` LIKE '$catering') AND (`Type` LIKE '$type')";
              $res = $conn->query($sql);
              
              $previousHall = 'none';
              
              while($row = $res->fetch_assoc())
              {
              	if( $row['HallName'] != $previousHall)
              	{
                  $currentHall = $row['HallName'];
                  $sql2 = "SELECT Price FROM AccInfo WHERE HallName = '$currentHall'";
                  $res2 = $conn->query($sql2);

                  $lowPrice = "300";
                  $highPrice = "0";
                  while($row2 = $res2->fetch_assoc())
                  {
                    if($row2['Price'] < $lowPrice) {$lowPrice = $row2['Price'];}
                    if($row2['Price'] > $highPrice) {$highPrice = $row2['Price'];}
                  }

                  if ($row['Undergraduate'] == 1 and $row['Undergraduate'] == 1)
                  {
                    $studentType = "Undergraduate <br> Postgraduate";
                  }
                  elseif ($row['Undergraduate'] == 1)
                  {
                    $studentType = "Undergraduate";
                  }
                  else
                  {
                    $studentType = "Postgraduate";
                  }

                  echo "<div class=\"col-md-6 bottom-cd simpleCart_shelfItem\">";
                  echo "<div class=\"product-at \">";
                  echo "<a href=\"../AccomadationPage/index.php?hall=" . $row['HallName'] . "\" rel=\"external\"><img class=\"img-responsive\" src=\"../Images/" . $row['HallName'] . " Thumbnail.jpg\" alt=\"\">";
                  echo "<div class=\"pro-grid\">";
                  echo "<span class=\"buy-in\">View Now!</span>";
                  echo "</div>";
                  echo "</a>";
                  echo "</div>";
                  echo "<p style=\"line-height: 1.5em; padding: 2.6em 0 2em;\" class=\"tun\"><span>" . $row['HallName'] . "</span></p><br>";
                  echo "<p class=\"number item_price\">£". $lowPrice . " - £" . $highPrice .
                        "<br>" . $studentType . "<br>" . $row['Catering'] . "</p>";
                  echo "<div class=\"clearfix\"></div>";
                  echo "</div>";
              	}
              	$previousHall = $row['HallName'];
              }
              $conn -> close();
              ?>
          </div>
          <div class="col-md-3 prod-rgt">
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <!-- products -->
      <?php include("../footer.php"); ?>
  </body>
</html>