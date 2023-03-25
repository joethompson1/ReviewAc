<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset = "utf-8" />
    <title>Welcome Page</title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
  </head>

<body>
<div><h1>WELCOME</h1></div>
<div><?php

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

?>

  <br />
  <br />
  <!-- link to the implementaion page -->
  <div><a style="color:#993300;font-size:14px;" href="ImplementationPage.html">Visit Implementation Page</a></div>
<div><a style="color:#993300;font-size:14px;" href="HelloWebsite.html">Visit Login Page</a></div>
  </body>
</html>
