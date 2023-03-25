 <?php
     require_once('./config.inc.php');

        // Connect to the group database
        $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

        // Check for errors before doing anything else
        if($conn -> connect_error) {
            die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
        }
        else{
					if(isset($_POST['submit'])){
            $userNameErr = null;
						$userName = null;
						$hallNameErr = null;
						$hallName = null;
            $review =  $_POST['comment'];
            $date = date("Y-m-d");

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["userName"])) {
                $userNameErr = "User name is required";
                echo $userNameErr;
              } else {
                $userName = $_POST["userName"];
              }

              if (empty($_POST["hallName"])) {
                $hallNameErr = "Hall Name is required";
                echo $hallNameErr;
              } else {
                $hallName = $_POST["hallName"];
              }
            }//if

            if ($userNameErr != null || $hallNameErr != null){
              echo "Failed to created data";}

            else{
              $sql = "INSERT INTO `Review List`(`Hall Name`, `Author`, `Comments`, `Add_time`) VALUES ('$hallName','$userName','$review', '$date')";
                if ($conn->query($sql) === TRUE) {

                  echo "Comments uploaded successfully";
                }   else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
              }
            }
				}



        $conn->close();
        ?>




<!DOCTYPE html>
<html>
<head>
<title>Review</title>

<?php
   session_start();
   include("../Header.php");
?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Review Accommodation</h2>
		</div>
	</div>
	<!-- grow -->
<!--content-->
<div class="contact">

			<div class="container">
			<div class="contact-form">

				<div class="col-md-8 contact-grid">
					<h4>Please leave your comment here</h4>
				  </br>
				  <form action="review.php" method='POST'>
					<?php if (isset($_SESSION["user"]))
							  {
									$usernmae = $_SESSION["user"];
									//$usernmae = urlencode($usernmae);
									//$usernmae = urldecode($usernmae);
									echo "<input type='text' name='userName' value = '$usernmae' readonly>";
								}
						?>
						<input type="text" name="hallName" placeholder = "Hall Name">
						<textarea name = "comment" cols="77" rows="6" placeholder = "say something about the accommodation ..."></textarea>
						<div class="send">
							<input type="submit" name = "submit" value="Send">
						</div>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

	</div>
<!--//content-->
				<div class="col-md-8 contact-grid">
				<div class="clearfix"> </div>
			</div>
		</div>

	</div>
<!--//content-->
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
