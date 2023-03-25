<!DOCTYPE html>
<html>
<head>
<title><?php echo $_GET['Number']; ?></title>
<link rel="stylesheet" type="text/css" href="starability-minified/starability-all.min.css"/>
<?php
   session_start();
   include("../Header.php");
?>
	<!-- grow -->
	<div class="grow">
		<div class="container">
			<h2>Forum Question</h2>
		</div>
	</div>
	 <!-- grow -->
<!--content-->
<div class="contact">

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

              $sql = "SELECT `Question Number`, `Title`, `Author`, `QuestionMade`, `AddTime` FROM `ForumList` WHERE 1";
              $res = $conn->query($sql);
              $number = $_GET['Number'];

              while($row = $res->fetch_assoc())
              {
                $title = $row['Title'];
                $Author = $row['Author'];
                $AddTime = $row['AddTime'];
                $content = $row['QuestionMade'];
                if ($row['Question Number'] == $number)
                {
                  echo "<div class='col-xs-12 article-wrapper'>";
                  echo "<article>";
                  echo "<div class=\"img-wrapper\">";
                  echo "<img src= images/1.jpg  alt=\"\" /></div>";
                  echo "<h1 style='font-style: oblique;'>$title</h1>";
                  echo "<p style= 'font-style: italic; font-size: 25px '> $content </p>";
                }
              }

           ?>
           </div>
           </br>
           </br>
           </br>
           <h1 id="header" class="text-primary">Replies</h1>
            <div class="row">
                      <?php
                          require_once('./config.inc.php');



                          $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

                          // Check for errors before doing anything else
                          if($conn -> connect_error) {
                          	die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
                          }

                          $sql = "SELECT `Question Number`, `Replier`, `Question Reply`, `Reply Time` FROM `Forum Reply List` WHERE 1";
                          $res = $conn->query($sql);
                          $number = $_GET['Number'];
                          $boo = false;
                          while($row = $res->fetch_assoc())
                          {
                            $Author = $row['Replier'];
                            $AddTime = $row['Reply Time'];
                            $content = $row['Question Reply'];
                            if ($row['Question Number'] == $number)
                            {
                              echo "<div class=\"col-xs-12 article-wrapper\"><article>";
                              echo "<h1 style='font-style: italic; text-align: left; font-size: 20px'> $content </h1>";
                              echo "<p style='text-align: left'> $Author &nbsp &nbsp $AddTime </p>";
                              echo "</article></div>";
                              $boo = true;
                            }
                          }
                          if(!$boo)
                          {
                              echo "<div class=\"row\"><div class=\"col-xs-12 article-wrapper\"><article>";
                              echo "<h1 style='font-style: italic; text-align: left; font-size: 20px'> There aren't any replies yet - Be the first to write one! </h1>";
                              echo "<p style='text-align: left'>  </p></article></div>";
                              echo "</article></div>";
                              $boo = true;
                          }

                       ?>
                      </div>
                       <?php
          if (isset($_SESSION["user"]))
          {
            echo "<br>";
             echo"<h1 id='header' class='text-primary'>Please leave your replies here</h1>";
          }
        ?>
                       <div class="contact-form">
                       <div class="col-md-8 contact-grid">
                          <?php if (isset($_SESSION["user"]))
                                {
                                  echo "<div style=\"margin-left:200px;\"><form action=\"forumreplies.php\" method='POST'>";
                                  $usernmae = $_SESSION["user"];
                                  echo "<input type='text' name='userName' value = '$usernmae' readonly>";
                                  echo "<textarea name = \"comment\" cols=\"25\" rows=\"6\" placeholder = \"Your reply\"></textarea>";
                                  echo "<div class=\"send\">";
                                  echo "<input type=\"hidden\" name = \"number\" value=" . $number . ">";
                                  echo "<input type=\"submit\" name = \"submit\" value=\"send\">";
                                  echo "</div>";
                                }


                            ?>
          </form>
          </div>

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
        </div>
        </div>
        <!--//content-->
<?php include("../footer.php"); ?>
          </div>
        </div>
      </body>
    </html>