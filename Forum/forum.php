<?php
    session_start();
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
           $userName = $_SESSION["user"];
           $title = $_POST['questionTitle'];
           $forumQuestion =  $_POST['comment'];
           $date = date("Y-m-d");


           if ($userNameErr != null){
             echo "Failed to created data";}

           else{
             $sql = "INSERT INTO ForumList (Title ,Author, QuestionMade, AddTime) VALUES ('$title' ,'$userName','$forumQuestion', '$date')";
               if ($conn->query($sql) === TRUE) {

                 echo "Question uploaded successfully";
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
<title>Forum</title>

<?php
  include("../Header.php");
?>
 <!-- grow -->
 <div class="grow">
   <div class="container">
     <h2>Forum</h2>
   </div>
 </div>
 <!-- grow -->
<!--content-->
<div class="contact">

     <div class="container">
     <div class="contact-form">

        <div class="row">
    <div class="col-xs-12 article-wrapper">
      <article>
        <a href="#" class="more">more</a>
        <div class="img-wrapper"><img src="http://lorempixel.com/150/150/fashion" alt="" /></div>
        <h1>Lorem ipsum dolor.</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet ducimus totam quasi nam porro sed.</p>
      </article>
    </div>
    </div>
    </div>

       <div class="col-md-8 contact-grid">
         <h4>Please leave your question here</h4>
         </br>
         <form action="forum.php" method='POST'>
         <?php if (isset($_SESSION["user"]))
               {
                 $usernmae = $_SESSION["user"];
                 echo "<input type='text' name='userName' value = '$usernmae' readonly>";
               }
           ?>
           <input type="text" name="questionTitle" placeholder = "Question Title">
           <textarea name = "comment" cols="25" rows="6" placeholder = "Details ..."></textarea>
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
