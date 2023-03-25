<!DOCTYPE html>
<html>
<head>
<title>Forum</title>

<?php
  session_start();
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
     <h1 id="header" class="text-primary">Forum Questions</h1>
     <div class="container">
     <div class="contact-form">

        <div class="row">
   

    
     
          <?php
              require_once('./config.inc.php');



              $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

              // Check for errors before doing anything else
              if($conn -> connect_error) {
              	die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
              }

              else{
         if(isset($_POST['submit'])){
           $userName = $_SESSION["user"];
           $title = $_POST['questionTitle'];
           $forumQuestion =  $_POST['comment'];
           $date = date("Y-m-d");


           if ($forumQuestion == null || $title == null){
             echo "<script language=\"JavaScript\">\r\n";
			echo " alert(\"Please leave your question here\");\r\n";
			echo " location.replace(\"./list.php\");\r\n";
			echo "</script>";}

           else{
             $sql = "INSERT INTO ForumList (Title ,Author, QuestionMade, AddTime) VALUES ('$title' ,'$userName','$forumQuestion', '$date')";
               if ($conn->query($sql) === TRUE) {

                 echo "<script language=\"JavaScript\">\r\n";
			          echo " alert(\"Comments uploaded successfully\");\r\n";
		          	echo " location.replace(\"./list.php\");\r\n";
		          	echo "</script>";
               }   else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
               }
             }
           }
       }
     ?>         
 <?php
              require_once('./config.inc.php');



              $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

              // Check for errors before doing anything else
              if($conn -> connect_error) {
              	die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
              }

              $sql = "SELECT `Question Number`, `Title`, `Author`, `AddTime` FROM `ForumList`";
              $res = $conn->query($sql);

              while($row = $res->fetch_assoc())
              {
                $number = $row['Question Number'];
                $title = $row['Title'];
                $Author = $row['Author'];
                $AddTime = $row['AddTime'];
                if ($number != 0 && $title != '' && $Author != '')
                {
                  echo "<div class='col-xs-12 article-wrapper'>";
                  echo "<article>";
                  echo "<a href=\" ./index.php?Number=" . $number . "\" rel=\"external\" class=\"more\">more</a>";
                  echo "<div class=\"img-wrapper\">";
                  echo "<img src= images/1.jpg  alt=\"\" /></div>";
                  echo "<h1 style='font-style: oblique;'>$title</h1>";
                  echo "<p style='font-style: italic; text-align: left; font-size: 20px'> $Author </p>";
                  echo "<p style='text-align: right'> $AddTime </p></article></div>";
                }
              }
           ?>
           </div>
        <?php
          if (isset($_SESSION["user"]))
          {
            echo "<br>";
            echo"<h1 id='header' class='text-primary'>Please leave your question here</h1>";
          }
        ?>
        
         <div class="contact-form">

       <div class="col-md-8 contact-grid">
         
         <?php if (isset($_SESSION["user"]))
               {
                  echo "<div style=\"margin-left:200px;\"><form action=\"list.php\" method='POST'>";
                 $usernmae = $_SESSION["user"];
                 echo "<input style=\"left: 25%;\" type='text' name='userName' value = '$usernmae' readonly>";
                 echo "<input type=\"text\" name=\"questionTitle\" placeholder = \"Question Title\">";
                 echo "<textarea name = \"comment\" cols=\"25\" rows=\"6\" placeholder = \"Details ...\"></textarea>";
                 echo "<div class=\"send\">";
                 echo "<input type=\"submit\" name = \"submit\" value=\"Send\">";
                 echo "</div>";
               }
               
               
           ?>

           
         </form> </div>

           <div class="clearfix"> </div>
                  </div>
                </div>
              </div>
              <!---->
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        </div>
        <!--//content-->
<?php include("../footer.php"); ?>
          </div>
        </div>
      </body>
    </html>
