 
<?php
require_once ('./config.inc.php');

// Connect to the group database

$conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

// Check for errors before doing anything else

if ($conn->connect_error)
{
  die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
else
{
  if (isset($_POST['submit']))
  {
    $userNameErr = null;
    $userName = null;
    $hallName = $_POST['hallName'];
    $hallNameErr = null;
    $review = $_POST['comment'];
    $date = date("Y-m-d");
    $cleanliness = $_POST['cleanliness'];
    if ($cleanliness == 0)
    {
      $cleanliness = null;
    }

    $social = $_POST['social'];
    if ($social == 0)
    {
      $social = null;
    }

    $security = $_POST['security'];
    if ($security == 0)
    {
      $security = null;
    }

    $maintenance = $_POST['maintenance'];
    if ($maintenance == 0)
    {
      $maintenance = null;
    }

    $location = $_POST['location'];
    if ($location == 0)
    {
      $location = null;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if (empty($_POST["userName"]))
      {
        $userNameErr = "User name is required";
        echo $userNameErr;
      }
      else
      {
        $userName = $_POST["userName"];
      }
    } //if
    if ($userNameErr != null || $hallNameErr != null)
    {
      echo "Failed to created data";
    }
    else
    {


      //insert ratings into DB. delete this user's old ratings for this hall. Delete their review too, if they left no comment.

      $sql = "UPDATE `Review List` SET `Cleanliness` = NULL, `Social` = NULL, `Maintenance` = NULL, `Location` = NULL, `Security` = NULL WHERE `Hall Name` = '$hallName' and `Author` = '$userName'";
      if (mysqli_query($conn, $sql))
      {
		$sql = "DELETE FROM `Review List` WHERE `Cleanliness` IS NULL AND  `Comments` = ''";
		if (mysqli_query($conn, $sql))
      	{
		  $sql = "INSERT INTO `Review List`(`Hall Name`, `Author`, `Comments`, `Add_time`, `Cleanliness`, `Social`, `Maintenance`, `Location`, `Security`) VALUES ('$hallName','$userName','$review', '$date', '$cleanliness', '$social', '$maintenance', '$location', '$security')";
		  if ($conn->query($sql) === TRUE)
		  {

			// echo "Comments uploaded successfully";

			echo "<script language=\"JavaScript\">\r\n";
			echo " alert(\"Comments uploaded successfully\");\r\n";
			echo " location.replace(\"../AccomadationPage/index.php?hall=" . $hallName . "\");\r\n";
			echo "</script>";
          }
		  else
          {
            echo "Error: " . $sql . "<br />" . $conn->error;
          }   
        }
        else
        {
          echo "Error: " . $sql . "<br />" . $conn->error;
        }
	  }
	  else
      {
        echo "Error: " . $sql . "<br />" . $conn->error;
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
<link rel="stylesheet" type="text/css" href="starability-minified/starability-all.min.css"/>

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
				  <form action="" method='POST'>
					<?php if (isset($_SESSION["user"]))
							  {
									$username = $_SESSION["user"];
									$hallName = $_GET['hall'];
									echo "<input type='text' name='userName' value = '$username' readonly>";
								}
								else
								{
                  echo "<script language=\"JavaScript\">\r\n";
                  echo " alert(\"Please login first to write review!\");\r\n";
                  echo " location.replace(\"../LoginPage/\");\r\n";
                  echo "</script>";
								}
								echo "<input type=\"text\" name=\"hallName\" value = '$hallName' readonly>";
						?>
						
						<textarea name = "comment" cols="77" rows="6" placeholder = "say something about the accommodation ..."></textarea>

							<!-- Cleanliness ratings -->
              <fieldset class="starability-grow">
                <legend>Cleanliness:</legend>
                <input type="submit" id="no-rate" class="input-no-rate" name="cleanliness" value="0" checked aria-label="No rating." />

                <input type="radio" id="clean1" name="cleanliness" value="1" />
                <label for="clean1">1 star.</label>

                <input type="radio" id="clean2" name="cleanliness" value="2" />
                <label for="clean2">2 stars.</label>

                <input type="radio" id="clean3" name="cleanliness" value="3" />
                <label for="clean3">3 stars.</label>

                <input type="radio" id="clean4" name="cleanliness" value="4" />
                <label for="clean4">4 stars.</label>

                <input type="radio" id="clean5" name="cleanliness" value="5" checked/>
                <label for="clean5">5 stars.</label>

                <span class="starability-focus-ring"></span>
              </fieldset>

							<br><br>

							<!-- Social Ratings -->
              <fieldset class="starability-grow">
                <legend>Social:</legend>
                <input type="submit" id="no-rate" class="input-no-rate" name="social" value="0" checked aria-label="No rating." />

                <input type="radio" id="social1" name="social" value="1" />
                <label for="social1">1 star.</label>

                <input type="radio" id="social2" name="social" value="2" />
                <label for="social2">2 stars.</label>

                <input type="radio" id="social3" name="social" value="3" />
                <label for="social3">3 stars.</label>

                <input type="radio" id="social4" name="social" value="4" />
                <label for="social4">4 stars.</label>

                <input type="radio" id="social5" name="social" value="5" checked/>
                <label for="social5">5 stars.</label>

                <span class="starability-focus-ring"></span>
              </fieldset>

							<br><br>

							<!-- Maintenance Ratings -->
              <fieldset class="starability-grow">
                <legend>Maintenance:</legend>
                <input type="submit" id="no-rate" class="input-no-rate" name="maintenance" value="0" checked aria-label="No rating." />

                <input type="radio" id="maintenance1" name="maintenance" value="1" />
                <label for="maintenance1">1 star.</label>

                <input type="radio" id="maintenance2" name="maintenance" value="2" />
                <label for="maintenance2">2 stars.</label>

                <input type="radio" id="maintenance3" name="maintenance" value="3" />
                <label for="maintenance3">3 stars.</label>

                <input type="radio" id="maintenance4" name="maintenance" value="4" />
                <label for="maintenance4">4 stars.</label>

                <input type="radio" id="maintenance5" name="maintenance" value="5" checked/>
                <label for="maintenance5">5 stars.</label>

                <span class="starability-focus-ring"></span>
              </fieldset>

							<br><br>

							<!-- Security Ratings -->
              <fieldset class="starability-grow">
                <legend>Security:</legend>
                <input type="submit" id="no-rate" class="input-no-rate" name="security" value="0" checked aria-label="No rating." />

                <input type="radio" id="security1" name="security" value="1" />
                <label for="security1">1 star.</label>

                <input type="radio" id="security2" name="security" value="2" />
                <label for="security2">2 stars.</label>

                <input type="radio" id="security3" name="security" value="3" />
                <label for="security3">3 stars.</label>

                <input type="radio" id="security4" name="security" value="4" />
                <label for="security4">4 stars.</label>

                <input type="radio" id="security5" name="security" value="5" checked/>
                <label for="security5">5 stars.</label>

                <span class="starability-focus-ring"></span>
              </fieldset>

							<br><br>

							<!-- Location Ratings -->
              <fieldset class="starability-grow">
                <legend>Location:</legend>
                <input type="submit" id="no-rate" class="input-no-rate" name="location" value="0" checked aria-label="No rating." />

                <input type="radio" id="location1" name="location" value="1" />
                <label for="location1">1 star.</label>

                <input type="radio" id="location2" name="location" value="2" />
                <label for="location2">2 stars.</label>

                <input type="radio" id="location3" name="location" value="3" />
                <label for="location3">3 stars.</label>

                <input type="radio" id="location4" name="location" value="4" />
                <label for="location4">4 stars.</label>

                <input type="radio" id="location5" name="location" value="5" checked/>
                <label for="location5">5 stars.</label>

                <span class="starability-focus-ring"></span>
              </fieldset>
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
