<?php
    //Database handling

    // Load the configuration file containing your      database credentials
    require_once('./config.inc.php');
    require_once('./GroupDBNames.php');

    // Connect to the group database
    $mysqli = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

    // Check for errors before doing anything else
    if($mysqli -> connect_error) 
    {
    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
    }
    
    $user = null;
    $hashedUser = $_GET['user'];
    $sql = "SELECT UserName FROM UserInfo";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) 
    {
      // search data of each row
      while($row = $result->fetch_assoc()) 
      {
          if password_verify($row[UserName], $hashedUser)
          {
              $user = $row[UserName];
          }
        
      }
    }

    $sql = "UPDATE UserInfo SET Confirmed = 1 WHERE UserName = '$user'";
    if (mysqli_query($conn, $sql))
    {
        echo "<script language=\"JavaScript\">\r\n";
		echo " alert(\"Account Confirmed\");\r\n";
		echo " location.replace(\"../HomePage/\");\r\n";
		echo "</script>";
    }
    else
    {
        echo "Error: " . $sql . "<br />" . $conn->error;
    }   

    ?>