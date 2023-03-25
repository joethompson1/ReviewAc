<html>
<body>

<meta charset="UTF-8">

<head>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/style.css">

  <title>Login</title>
</head>
  

<body>

<?php 
  session_start(); 
  include("../Header.php");
?>

<form action="index.php" method="post">

<div class="cont">
  <div class="form sign-in">
    <h2>Change your user settings below,</h2>
    <label>
        <span>Username<br></span>
        <span><?php echo $_SESSION["user"]; ?></span>
      </label>
      <label>
        <span>Email</span>
        <input type="email" name="email">
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="password">
      </label>
      <label>
        <span>Student ID</span>
        <span><?php echo $_SESSION["studentID"]; ?></span>
      </label>
    <button type="submit" class="submit">Save</button>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>Want to change a locked setting?</h2>
        <p>Contact us through our contact us page</p>
      </div>
    </div>
    </form>

    </div>
  </div>
</div>

<a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
  
  

    <script  src="js/index.js"></script>

<?php
ob_start();
//Database handling

// Load the configuration file containing your database credentials
require_once('./config.inc.php');
require_once('./GroupDBNames.php');

// Connect to the group database
$mysqli = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

// Check for errors before doing anything else
if($mysqli -> connect_error) 
{
  die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  // get fields
  $email = strtolower($_POST['email']);
  $password = $_POST['password'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $error = 0;
  $registerFail = 0;
  $user = $_SESSION["user"];

  $session["registerError"] = "error unknown";
  
    //check to see if record already exists, based on User Name, Student ID and email
  
    $sql = "SELECT UserName, StudentEmail, StudentID, Password FROM UserInfo";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) 
    {
      // search data of each row
      while($row = $result->fetch_assoc()) 
      {
        
        if ($row["StudentEmail"] == $email)
        {
          $session["registerError"] = "Email Taken";
          $registerFail = 1;
        }
      }
        
      
    }//end if ($result->num_rows > 0) 

    if ($registerFail == 0)
    {
      if ($email != "")
      {

        //write data to table
        $sql = "UPDATE UserInfo SET StudentEmail = '$email' WHERE UserName = '$user'";
      
        if ($mysqli->query($sql) === TRUE) 
        {
          echo '<script language="javascript">';
          echo 'alert("updated account successfully, please log in.")';
          echo '</script>';
          session_destroy(); 
          
          while (ob_get_status())
          {
            ob_end_clean();
          }
            
          header( "Location: ../HomePage/" );

        }//end if
         
        else 
        {
          $session["registerError"] = "SQL insert error";
          $registerFail = 1;
          
        }//end else ($mysqli->query($sql) === TRUE)  
        
      }
      
      if ($password != "")
      {
        //write data to table
        $sql = "UPDATE UserInfo SET Password = '$hashedPassword' WHERE UserName = '$user'";
      
        if ($mysqli->query($sql) === TRUE) 
        {
          echo '<script language="javascript">';
          echo 'alert("updated account successfully, please log in.")';
          echo '</script>';
          session_destroy(); 
          
          while (ob_get_status())
          {
            ob_end_clean();
          }
            
          header( "Location: ../HomePage/" );

        }//end if
         
        else 
        {
          $session["registerError"] = "SQL insert error";
          $registerFail = 1;
          
        }//end else ($mysqli->query($sql) === TRUE)  
      }

    }//end if ($registerFail == 0)
  
    //catch weird errors
    if ($registerFail == 1)
    {
      echo '<script language="javascript">';
      echo 'alert($session["registerError"])';
      echo '</script>';
    }//end else $error
  

}//end if ($_SERVER["REQUEST_METHOD"] == "POST") 
// Always close your connection to the database cleanly!

/*
  function updateTable($field, $data)
    {
      $sql = "UPDATE UserInfo SET '$field' = '$data' WHERE UserName = '$user'";
      
        if ($mysqli->query($sql) === TRUE) 
        {
          echo '<script language="javascript">';
          echo 'alert("Registration successful, please log in.")';
          echo '</script>';
        }//end if
         
        else 
        {
          $session["registerError"] = "SQL insert error";
          $registerFail = 1;
          
        }//end else ($mysqli->query($sql) === TRUE)  
    }
    
    */
    $mysqli -> close();
?>

</div>
</body>
</html>
