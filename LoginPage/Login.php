<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

      <link rel="stylesheet" href="css/style.css">

<?php
  session_start();
  include("../Header.php");
?>





	<form action="Login.php" method="post">

<div class="cont">
  <div class="form sign-in">
    <h2>Welcome back,</h2>
    <label>
      <span>Email</span>
      <input type="text" name="user">
    </label>
    <label>
      <span>Password</span>
      <input type="password" name="password">
    </label>
    <p class="forgot-pass">Forgot password?</p>
    <button type="submit" class="submit">Sign In</button>
    <button type="button" class="fb-btn">Connect with <span>facebook</span></button>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>
    </form>
    <form action="Register.php" method="post">
    <div class="form sign-up">
      <h2>Time to feel like home,</h2>
      <label>
        <span>Username</span>
        <input type="text" name="username">
      </label>
      <label>
        <span>Email</span>
        <input type="email" name="email">
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="registerPassword">
      </label>
      <label>
        <span>Student ID</span>
        <input type="text" name="studentID">
      </label>
      <button type="submit" class="submit">Sign Up</button>
      <button type="button" class="fb-btn">Join with <span>facebook</span></button>
    </div>
  </div>
</div>
    <script  src="js/index.js"></script>



<!-- Code adapted and learnt from www.w3schools.com -->

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
  $user = $_POST['user'];
  $password = $_POST['password'];
  $error = 0;
  $LoginSuccess = 0;
  
  
    //check to see if record already exists, based on full name  and email
  
    $sql = "SELECT UserName, StudentEmail, StudentID, Password FROM UserInfo";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) 
    {
      // search data of each row
      while($row = $result->fetch_assoc()) 
      {
        if ((($row["UserName"] == strtolower($user))
        or ($row["StudentEmail"] == strtolower($user))) 
        and (password_verify ($password, $row["Password"])))
        {
          
          //set session variables
          session_start();
          $_SESSION["user"] = $row["UserName"];
          $_SESSION["email"] = $row["StudentEmail"];
          $_SESSION["studentID"] = $row["StudentID"];
          
          // Separate email by @ characters (there should be only one)
          $parts = explode('@', $_SESSION["email"]);
          // Remove and return the last part, which should be the domain
          $domain = array_pop($parts);
          // Check if using the student domain
          if (in_array($domain, 'student.manchester.ac.uk'))
          {  
            $_SESSION["userType"] = "student";
          }
          else
          {
            $_SESSION["userType"] = "default";
          }
            
            
            
          while (ob_get_status())
          {
            ob_end_clean();
          }
            
          #header( "Location: ../HomePage/" );
            
            
          echo "<script language=\"JavaScript\">\r\n";
          echo " history.go(-2);\r\n";
          echo "</script>";
          $LoginSuccess = 1;
        }//end password_verify
      } //end while
      
      if ($LoginSuccess == 0)
      {
        echo '<script language="javascript">';
        echo 'alert("username or password incorrect")';
        echo '</script>';
      }
      
    }//end if ($result->num_rows > 0) 
}//end if ($_SERVER["REQUEST_METHOD"] == "POST") 
// Always close your connection to the database cleanly!
$mysqli -> close();
?>

</div>
</body>
</html>
