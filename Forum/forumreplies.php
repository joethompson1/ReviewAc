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
           $userName = $_SESSION["user"];
           $forumReply =  $_POST['comment'];
           $number = $_POST['number'];
           $date = date("Y-m-d");


           if ($forumReply == null){
             echo "<script language=\"JavaScript\">\r\n";
			echo " alert(\"Please leave your question here\");\r\n";
			echo " location.replace(\"index.php\?Number=" . $number . "\");\r\n";
			echo "</script>";}

           else{
             $sql = "INSERT INTO `Forum Reply List` (`Question Number`, `Replier`, `Question Reply`, `Reply Time`) VALUES ('$number', '$userName','$forumReply', '$date')";
               if ($conn->query($sql) === TRUE) {

                 echo "Question uploaded successfully";
               }   else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
               }
             }
           }
       }



       $conn->close();
       echo "<script language=\"JavaScript\">\r\n";
       echo " location.replace(\"index.php\?Number=" . $number . "\");\r\n";
       echo "</script>";
       ?>
