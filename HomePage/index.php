<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<?php
   session_start();
   include("../Header.php");
?>



<div class="banner">
		<div class="container">
			  <script src="js/responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
			<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider">
			    <li>

						<div class="banner-text">
							<h3>Welcome to your residence</h3>
						<p>and find your home and your way of life.</p>

						</div>

				</li>
				<li>

						<div class="banner-text">
							<h3>Happiness is finding where you belong</h3>
						<p>and make yourself comfortable.</p>


						</div>

				</li>
				
			</ul>
		</div>

	</div>
	</div>

<div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
<!--content-->
<div class="container">
	<div class="cont">
		<div class="content">
			<div class="content-top-bottom">
				<h2>University accommodations</h2>
		  <div class="col-md-6 men">
					<a href="../AccomadationPage/index.php?hall=Denmark Road" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/Denmark.jpg" alt="">
						<div class="b-wrapper">
											<h3 class="b-animate b-from-top top-in   b-delay03 ">
												<span>Denmark Road</span>	
											</h3>
										</div>
					</a>
					
					
				</div>
				<div class="col-md-6">
					<div class="col-md1 ">
						<a href="../AccomadationPage/index.php?hall=George Kenyon Hall" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/George Kenyon.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-top top-in1   b-delay03 ">
												<span>George Kenyon Hall</span>	
											</h3>
										</div>
						</a>
						
					</div>
					<div class="col-md2">
						<div class="col-md-6 men1">
							<a href="../AccomadationPage/index.php?hall=Liberty Point" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/Liberty Point.jpg" alt="">
									<div class="b-wrapper">
											<h3 class="b-animate b-from-top top-in2   b-delay03 ">
												<span>Liberty Point</span>	
											</h3>
										</div>
							</a>
							
						</div>
						<div class="col-md-6 men2">
							<a href="../AccomadationPage/index.php?hall=Manchester Gardens" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/Manchester Garden.jpg" alt="">
									<div class="b-wrapper">
											<h3 class="b-animate b-from-top top-in2   b-delay03 ">
												<span>Manchester Gardens</span>	
											</h3>
										</div>
							</a>
							
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="content-top">
				<h1>PRIVATE HALLS</h1>
				<div class="grid-in">
					<div class="col-md-3 grid-top">
						<a href="../AccomadationPage/index.php?hall=Kincardine Court" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/Kincardine Court Thumbnail.jpg" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-left    b-delay03 ">
									<span>Kincardine Court</span>
									
								</h3>
							</div>
						</a>
				


					<a href="#" class="item_add"></a>
					</div>
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="../AccomadationPage/index.php?hall=New Medlock House" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/New Medlock House Thumbnail.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>New Medlock House</span>	
											</h3>
										</div>
						</a>
					<a href="#" class="item_add"></a>
					</div>
					<div class="col-md-3 grid-top simpleCart_shelfItem">
						<a href="../AccomadationPage/index.php?hall=Parkway Gate" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/Parkway Gate Thumbnail.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>Parkway Gate</span>	
											</h3>
										</div>
						</a>
					<a href="#" class="item_add"></a>
					</div>
					<div class="col-md-3 grid-top">
						<a href="../AccomadationPage/index.php?hall=Piccadilly Point" class="b-link-stripe b-animate-go  thickbox"><img class="img-responsive" src="images/Piccadilly Point Thumbnail.jpg" alt="">
							<div class="b-wrapper">
											<h3 class="b-animate b-from-left    b-delay03 ">
												<span>Piccadilly Point</span>	
											</h3>
										</div>
						</a>
					<a href="#" class="item_add"></a>
					</div>
							<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	<!----->
	</div>
	<!---->
</div>
<?php include("../footer.php"); ?>
</body>
</html>
			