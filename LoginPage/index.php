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
</body>
</html>
			