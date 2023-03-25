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
        <div class="header-left">

          <div data-ajax="false" class="search-box">
            <div id="sb-search" class="sb-search">

            
              <form data-ajax="false" action="../AccomadationPage/index.php" method = 'GET'>
                <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="hall" id="hall">
                <input class="sb-search-submit" type="submit" value="">
                <span class="sb-icon-search"> </span>
              </form>
            </div>
          </div>


          <!-- search-scripts -->
          <script src="js/classie.js"></script>
          <script src="js/uisearch.js"></script>
          <script>
            new UISearch( document.getElementById( 'sb-search' ) );
          </script>
          <!-- //search-scripts -->
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
            <li><a rel="external" class="color4" href="../AccomadationPage/list.php">Accommodation</a></li>
            <li><a rel="external" class="color4" href="../Forum/list.php">Forum</a></li>
            <?php if (isset($_SESSION["user"])) {echo "<li><a rel=\"external\" class=\"color4\" href=\"../Logout.php\">Log Out</a></li>";} else {echo "<li><a rel=\"external\" class=\"color4\" href=\"../LoginPage/\">login</a></li>";} ?>
          </ul>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>