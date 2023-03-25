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


<?php
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
  $username = strtolower($_POST['username']);
  $email = strtolower($_POST['email']);
  $studentID = $_POST['studentID'];
  $password = $_POST['registerPassword'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $error = 0;
  $registerFail = 0;

  $session["registerError"] = "error unknown";
  
    //check to see if record already exists, based on User Name, Student ID and email
  
    $sql = "SELECT UserName, StudentEmail, StudentID, Password FROM UserInfo";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) 
    {
      // search data of each row
      while($row = $result->fetch_assoc()) 
      {
        if ($row["UserName"] == $username)
        {
          
        
          $session["registerError"] = "Username Taken";
          $registerFail = 1;
        }
        
        if ($row["StudentEmail"] == $email)
        {
          $session["registerError"] = "Email Taken";
          $registerFail = 1;
        }

        if ($studentID != "")
        {
          if ($row["StudentID"] == $studentID)
          {
            $session["registerError"] = "Student ID Taken";
            $registerFail = 1;
          }
        }
        
        
      }
        
      
    }//end if ($result->num_rows > 0) 

    //prepare to insert into table
    $sql = "INSERT INTO UserInfo (UserName, StudentEmail, StudentID, Password)
            VALUES ('$username', '$email', '$studentID', '$hashedPassword')";
    
    //if there's no errors, and it's a new user, insert new record into table
    if ($registerFail == 0)
    {
      //write data to table
        if ($mysqli->query($sql) === TRUE) 
        {
          echo "<script language=\"JavaScript\">\r\n";
                  echo " alert(\"Register Successful! Now log in!\");\r\n";
                  echo " location.replace(\"../LoginPage/\");\r\n";
                  echo "</script>";
        }//end if
         
        else 
        {
          $session["registerError"] = "SQL insert error";
          $registerFail = 1;
          
        }//end else ($mysqli->query($sql) === TRUE)

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
$mysqli -> close();
?>

</div>
</body>
</html>
