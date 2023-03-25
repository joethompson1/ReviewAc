<?php
  //$msg = "";
  // Load the configuration file containing your database credentials
    require_once('./config.inc.php');

    // Connect to the group database
    $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

    // Check for errors before doing anything else
    if($conn -> connect_error) {
        die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
    }
    else{
      if(isset($_POST['upload'])){
        //$target = "images/".basename($_FILES['image']['name']);
        $image = $_FILES['image']['name'];
        //$filetmpname = $_FILES['image']['tmp_name'];
        $HallName = $_POST['HallName'];
        //$folder = 'images/';
    
        //move_uploaded_file($filetmpname, $folder.$image);

        //if ($HallName = NULL){
        // echo "Failed to created data";}

        // else {
        $sql = "INSERT INTO `AccImages`(`HallName`, `Image`) VALUES ('$HallName', '$image')";


        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        }   else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }

    //now move the uploaded file into the folder.
   // if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
     // $msg = "Image uploaded successfully";
   // }
    //else {
    //  $mag = "Errors occur";
        
        
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
					<h4>Please upload hall pictures here</h4>
				  </br>
    <form method = "post" action="index.php" enctype = "multipart/form-data">
      <input type="hidden" name="size" value="1000000000000000000">
      <div>
        <input type="file" name="image">
      </div>
      <div>
        <input type="text" name="HallName">
      </div>
      <div>
        <input type="submit" name="upload" value="upload image">
      </div>
    </form>

  </div>
</div>
</div>
    <?php include("../footer.php"); ?>
  </body>
</html>
