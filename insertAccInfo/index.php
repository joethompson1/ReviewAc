<?php
if (isset($_POST['submit'])) {
$nameErr = "";
$HallName = "";
$PostCode = $_POST['PostCode'];
$Occupancy = $_POST['Occupancy'];
$RoomType = $_POST['RoomType'];
$Weeks = $_POST['Weeks'];
$StudentType = $_POST['StudentType'];
$Price = $_POST['Price'];
$totalPrice = $_POST['totalPrice'];
$Services = $_POST['Services'];
$FacilitiesArounding = $_POST['FacilitiesArounding'];
$FacilitiesInside = $_POST['FacilitiesInside'];



if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["HallName"]))
  {
    $nameErr = "Hall Name is required";
    echo $nameErr;
  }
  else
  {
    $HallName = test_input($_POST["HallName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$HallName))
    {
      $nameErr = "Only letters and white space allowed";
      echo $nameErr;
    }
  }
  if (empty($_POST['Occupancy']))
    $Occupancy = NULL;
  else
    $Occupancy = $_POST['Occupancy'];


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//conect to my database.
//this is the copied code'
// Load the configuration file containing your database credentials
require_once('./config.inc.php');

// Connect to the group database
$conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

// Check for errors before doing anything else
if($conn -> connect_error) {
    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
}

if ($nameErr != NULL){
 echo "Failed to created data";}

else {
  $sql = "INSERT INTO AccInfo(HallName, PostCode, Occupancy, RoomType,
                              Weeks, Student_Type, Price, Total_Price,
                              Services, Facilities_Arounding, Facilities_Inside)
  VALUES ('$HallName', '$PostCode', '$Occupancy', '$RoomType',
          '$Weeks', '$StudentType', '$Price', '$totalPrice', '$Services',
          '$FacilitiesArounding', '$FacilitiesInside')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  }   else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
}

?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="starability-minified/starability-all.min.css"/>
    <?php
    session_start();
    include("../Header.php");
    ?>


    <!-- grow -->
    <div class="grow">
      <div class="container">
        <h2>University Accommodation</h2>
      </div>
    </div>
  <body>
  <div class="contact">

			<div class="container">
			<div class="contact-form">

				<div class="col-md-8 contact-grid">
					<h4>Please Enter Hall Information Here</h4>
				  </br>
				  <form action="" method='POST'>
  HallName: <input type="text" name="HallName"><br>
  PostCode : <input type="text" name="PostCode"><br>
  Occupancy : <input type="text" name="Occupancy"><br>
  RoomType : <input type="text" name="RoomType"><br>
  Weeks: <input type="number" name="Weeks"><br>
  Student Type : <input type="text" name="StudentType"><br>
  Price : <input type="number" step="1" name="Price"><br>
  Total Price : <input type="number" name="totalPrice"><br>
  Services : <input type="text" name="Services"><br>
  Facilities Arounding : <input type="text" name="FacilitiesArounding"><br>
  Facilities Inside : <input type="text" name="FacilitiesInside"><br>
  <input type="submit">
  </form></div>
  <br />
  <br />
  <br />
</div>
</div>
</div>
    <?php include("../footer.php"); ?>
  </body>
</html>
