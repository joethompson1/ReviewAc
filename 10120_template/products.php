<!DOCTYPE html>
<html>
<head>
<title>Products</title>
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
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'><!--//fonts-->
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>
<script src="js/simpleCart.min.js"> </script>
</head>
<body>

<?php
   session_start();
?>

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
			
				<div class="search-box">
					<div id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
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
						<p><a href="../AccountSettings/"><?php if (isset($_SESSION["user"])) {echo $_SESSION["user"];} else echo "login"; ?></a></p>

						<p><a href=<?php if (isset($_SESSION["user"])) {echo "\"../AccountSettings/\">" . $_SESSION["user"];} else echo "\"../LoginPage/\">login"; ?></a></p>

					</div>
				</div>
					<div class="clearfix"> </div>
			</div>
				
		</div>
		</div>
		<div class="container">
			<div class="head-top">
				<div class="logo">
					<h1><a href="index.html">ReviewAc</a></h1>
				</div>
		  <div class=" h_menu4">
				<ul class="memenu skyblue">


			    </li>
			    <li><a class="color4" href="../HomePage/">Home</a></li>
			    <li><a class="color4" href="../Accomadation/">Accomadation</a></li>
			    <li><a class="color4" href="../Forum/">Forum</a></li>
				<li><a class="color4" href="../LoginPage/">Login</a></li>				
				<li><a class="color6" href="../AccountSettings/">Settings</a></li>
			  </ul> 
			</div>
				
				<div class="clearfix"> </div>
		</div>
		</div>
	</div>
<!-- products -->
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Halls</h2>
		</div>
	</div>
	<!-- grow -->
	<div class="pro-du">
		<div class="container">
			<div class="col-md-9 product1">
				<div class=" bottom-product">
				
				<?php
				  require_once('./config.inc.php');
                  $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

                  // Check for errors before doing anything else
                  if($conn -> connect_error) {
                    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
                  }

                  $sql = "SELECT HallName, Occupancy, Services, Facilities_Arounding, Facilities_Inside FROM AccInfo";
                  $res = $conn->query($sql);

				  $previousHall = 'none';

                  while($row = $res->fetch_assoc())
				  {
                    if( $row['HallName'] != $previousHall)
                    {
					  echo "<div class=\"col-md-6 bottom-cd simpleCart_shelfItem\">";
					  echo "<div class=\"product-at \">";
					  echo "<a href=\"../AccomadationPage/index.php?hall=" . $row['HallName'] . "\"><img class=\"img-responsive\" src=\"../Images/" . $row['HallName'] . " Thumbnail.jpg\" alt=\"\">";
				      echo "<div class=\"pro-grid\">";
					  echo "<span class=\"buy-in\">View Now!</span>";
					  echo "</div>";
					  echo "</a>";
					  echo "</div>";
					  echo "<p class=\"tun\"><span>" . $row['HallName'] . "</span><br>Description</p>";
					  echo "<div class=\"ca-rt\">";
					  echo "<a href=\"#\" class=\"item_add\"><p class=\"number item_price\"><i> </i>ppw?</p></a>";
					  echo "</div>";
					  echo "<div class=\"clearfix\"></div>";
					  echo "</div>";
					}
					$previousHall = $row['HallName'];
				  }
				  $conn -> close();
                ?>
				  
					
				
				</div>
			<div class="col-md-3 prod-rgt">
				<div class=" pro-tp">
					<div class="pl-lft">
						<a href="single.html"><img class="img-responsive" src="images/l2.jpg" alt=""></a>
					</div>
					<div class="pl-rgt">
						<h6><a href="single.html">TRIBECA LIVING</a></h6>
						<p><a href="single.html">450$</a></p>
					</div>
						<div class="clearfix"></div>
				</div>
				<div class=" pro-tp">
					<div class="pl-lft">
						<a href="single.html"><img class="img-responsive" src="images/l3.jpg" alt=""></a>
					</div>
					<div class="pl-rgt">
						<h6><a href="single.html">TRIBECA LIVING</a></h6>
						<p><a href="single.html">450$</a></p>
					</div>
						<div class="clearfix"></div>
				</div>
				<div class=" pro-tp">
					<div class="pl-lft">
						<a href="single.html"><img class="img-responsive" src="images/l1.jpg" alt=""></a>
					</div>
					<div class="pl-rgt">
						<h6><a href="single.html">TRIBECA LIVING</a></h6>
						<p><a href="single.html">450$</a></p>
					</div>
						<div class="clearfix"></div>
				</div>
				<div class="pr-btm">
				<h4>What Our Client Say</h4>
					<img class="img-responsive" src="images/pi.jpg" alt="">
					<h6>John</h6>
					<p>Lorem Ipsum is simply dummy text of the printing industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
				</div>
			</div>
				<div class="clearfix"></div>
		</div>
	</div>
<!-- products -->
<div class="footer">
				<div class="container">
			<div class="footer-top-at">
			
				<div class="col-md-3 amet-sed">
				<h4>MORE INFO</h4>
				<ul class="nav-bottom">
						<li><a href="#">How to order</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="contact.html">Location</a></li>
						<li><a href="#">Shipping</a></li>
						<li><a href="#">Membership</a></li>	
					</ul>	
				</div>
				<div class="col-md-3 amet-sed">
					<h4>CATEGORIES</h4>
					<ul class="nav-bottom">
						<li><a href="#">Bed linen</a></li>
						<li><a href="#">Cushions</a></li>
						<li><a href="#">Duvets</a></li>
						<li><a href="#">Pillows</a></li>
						<li><a href="#">Protectors</a></li>	
					</ul>
					
				</div>
				<div class="col-md-3 amet-sed">
					<h4>NEWSLETTER</h4>
					<div class="stay">
						<div class="stay-left">
							<form>
								<input type="text" placeholder="Enter your email " required="">
							</form>
						</div>
						<div class="btn-1">
							<form>
								<input type="submit" value="Subscribe">
							</form>
						</div>
							<div class="clearfix"> </div>
			</div>
					
				</div>
				<div class="col-md-3 amet-sed ">
				<h4>CONTACT US</h4>
					<p>Contrary to popular belief</p>
					<p>The standard chunk</p>
					<p>office :  +12 34 995 0792</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-class">
		<p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
		</div>
		</div>
</body>
</html>
			