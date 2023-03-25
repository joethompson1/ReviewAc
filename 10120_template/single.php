<!DOCTYPE html>
<html>
  <head>
    <title>Accommodation</title>
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
    <!-- grow -->
    <div class="product">
      <div class="container">
        <div class="product-price1">
          <div class="top-sing">
            <div class="col-md-7 single-top">
              <div class="flexslider">
                <ul class="slides">
                <?php
                  $boo = FALSE;
                  require_once('./config.inc.php');
                  $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

                  // Check for errors before doing anything else
                  if($conn -> connect_error) {
                    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
                  }

                  $hallName = $_POST['hall'];
                  $sql = "SELECT HallName, Image FROM AccImages";
                  $res = $conn->query($sql);
                  while($row = $res->fetch_assoc()){
                    $image = $row['Image'];
                     if( $row['HallName'] == $hallName)
                     {
                        echo "$image";
                        echo "<li data-thumb='hallpictures/$image'>";
                        echo "<div class='thumb-image'>";
                        echo "<img src='hallpictures/$image' data-imagezoom='true' class='img-responsive'>";
                        echo "</div></li>";
                        $boo = TRUE;
                     }
                   }//while
                   
                   if(!$boo){
                       echo "<h4> SORRY THERE IS NO SUCH STUDENT ACCOMMODATION!</h4>";
                   }
                ?>
                </ul>
              </div>
              <div class="clearfix"> </div>
              <!-- slide -->
              <!-- FlexSlider -->
              <script defer src="js/jquery.flexslider.js"></script>
              <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
              <script>
                // Can also be used with $(document).ready()
                $(window).load(function() {
                  $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                  });
                });
              </script>
            </div>
            <div class="col-md-5 single-top-in simpleCart_shelfItem">
              <div class="single-para ">
              <?php
                  $boo = FALSE;
                  require_once('./config.inc.php');
                  $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

                  // Check for errors before doing anything else
                 if($conn -> connect_error) {
                    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
                 }
                 $hallName = $_POST['hall'];
                 $sql = "SELECT HallName FROM AccInfo ";
                 $res = $conn->query($sql);
                 
                 while($row = $res->fetch_assoc()){
                     if ($row['HallName'] == $hallName){
                         $boo = TRUE;
                     }
                 }//while
                 if ($boo){
                     echo"<h4>$hallName</h4>";
                 }//if
              ?>
              </br>
                <div class="available">
                  <ul>
                    <li>
                <?php
                  $boo = FALSE;
                  require_once('./config.inc.php');
                  $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

                  // Check for errors before doing anything else
                 if($conn -> connect_error) {
                    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
                 }
                 $hallName = $_POST['hall'];
                 $sql = "SELECT HallName, Occupancy, Services, Facilities_Arounding, Facilities_Inside FROM AccInfo";
                 $res = $conn->query($sql);
                 echo"<table width='550' height='250'>";
                 echo"<tr><th colspan='2' scope='row'>FACT SHEET</th></tr>";

                  while($row = $res->fetch_assoc()){
                    $occupancy = $row['Occupancy'];
                    $services = preg_split("/\r\n|\n|\r/", $row['Services']);
                    $facilitiesOut = preg_split("/\r\n|\n|\r/", $row['Facilities_Arounding']);
                    $facilitiesIn = preg_split("/\r\n|\n|\r/", $row['Facilities_Inside']);
                    if( $row['HallName'] == $hallName && $row['Occupancy'] != '')
                    {
                        echo "<tr><th width='120' scope='row'>Occupancy</th><td width='243'>$occupancy</td></tr><td bgcolor=\"#FFFFFF\" style=\"line-height:10px;\" colspan=3>&nbsp;</td>";
                        echo "<tr><th scope='row'>Services</th>"; foreach ($services as $service){echo "<td>" . $service . "</td></tr><td></td>"; } echo "<td bgcolor=\"#FFFFFF\" style=\"line-height:10px;\" colspan=3>&nbsp;</td>";
                        echo "<tr><th scope='row'>Facilities Arounding</th>"; foreach ($facilitiesOut as $facility){echo "<td>" . $facility . "</td></tr><td></td>"; } echo "<td bgcolor=\"#FFFFFF\" style=\"line-height:10px;\" colspan=3>&nbsp;</td>";
                        echo "<tr><th scope='row'>Facilities inside</th>"; foreach ($facilitiesIn as $facility){echo "<td>" . $facility . "</td></tr><td></td>";} echo "<td bgcolor=\"#FFFFFF\" style=\"line-height:10px;\" colspan=3>&nbsp;</td>";
                        $boo = TRUE;
                    }
                   }//while
                   
                   if(!$boo){
                       echo "<tr><th scope='row'>  </th><td>SORRY THERE IS NO SUCH STUDENT ACCOMMODATION!</td></tr>";
                   }
                echo"</table>";
                ?>

                      </br>
                      <?php
                          $boo = FALSE;
                          require_once('./config.inc.php');
                          $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

                          // Check for errors before doing anything else
                          if($conn -> connect_error) {
                              die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
                          }

                              $hallName = $_POST['hall'];
                              $sql = "SELECT HallName, RoomType, Weeks, Total_Price, Price FROM AccInfo ";
                              $res = $conn->query($sql);


                              echo"<table width='700' height='250' border: 1px solid #F5F5F5; text-align: left; style='background-color:#F5F5F5;'> <tr>";
                              echo"<th>RoomType</th>";
                              echo"<th>Weeks</th>";
                              echo"<th>Weekly Rent &pound;</th>";
                              echo"<th>Annual Rent &pound;</th>";
                              echo"</tr>";
                              
                              while($row = $res->fetch_assoc()){
                                echo"<tr>";
                                    $weeks = $row['Weeks'];
                                    $roomType = $row['RoomType'];
                                    $price = $row['Price'];
                                    $totalPrice = $row['Total_Price'];
                                if( $row['HallName'] == $hallName)
                                {
                                    echo "<tr><td> $roomType </td>";
                                    echo "<td> $weeks </td>";
                                    echo "<td> $totalPrice </td>";
                                    echo "<td> $price </td>";
                                    echo"</tr>";
                                    $boo = TRUE;
                                } 
                                
                              }//while
                            if(!$boo){
                                echo "<td> SORRY THERE IS NO SUCH STUDENT ACCOMMODATION!</td>";
                            }
                            echo"</table>";
                     ?>
                    </li>
                    <li class="size-in"></li>
                    <div class="clearfix"></div>
                  </ul>
                </div>
              </div>
            </div>
            <div class="clearfix"> </div>
            <p style='font-size: 30px'>Customer Reviews </P>
            </br>
            <?php
              $boo = FALSE;
              require_once('./config.inc.php');
              $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

              // Check for errors before doing anything else
              if($conn -> connect_error) {
                die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
              }

              $hallName = $_POST['hall'];
              $sql = "SELECT `Hall Name`, `Author`, `Comments`, `Add_time` FROM `Review List`";
              //WHERE `Hall Name` LIKE 'Denmark Road' ";
              $res = $conn->query($sql);
  
                while($row = $res->fetch_assoc()){
                  $Author = $row['Author'];
                  $date = $row['Add_time'];
                  $Comments = $row['Comments'];
                  if( $row['Hall Name'] == $hallName) 
                  {
                    echo "<h4 style='font-style: italic; font-size: 25px'> $Author </h4>";
                    echo "<p> $date </p>";
                    echo "<p style='background-color:#F5F5F5; font-size: 20px'> $Comments </p></br>";
                    $boo = TRUE;
                  } 
                 }//while
                 
            if (!$boo){
                echo"<h4 style='font-style: italic; font-size: 25px'> OPPPPPPPPS! THERE IS NO COMMENTS RIGHT NOW ! </h4></br>";
            }
            ?>
            <div class="star-on">
              <div class="btn-1">
                <form action="review.php">
                  <input type="submit" style="width:180px;height:80px;" value="Write review">
                </form>
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
    <div class="footer">
      <div class="container">
        <div class="footer-top-at">
          <div class="col-md-3 amet-sed">
            <h4>MORE INFO</h4>
            <ul class="nav-bottom">
              <li><a href="#">How to order</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="contact.html">Location</a></li>
              <li><a href="#">Shipping</a></li>
              <li><a href="#">Membership</a></li>
            </ul>
          </div>
          <div class="col-md-3 amet-sed">
            <h4>CATEGORIES</h4>
            <ul class="nav-bottom">
              <li><a href="#">Bed linen</a></li>
              <li><a href="#">Cushions</a></li>
              <li><a href="#">Duvets</a></li>
              <li><a href="#">Pillows</a></li>
              <li><a href="#">Protectors</a></li>
            </ul>
          </div>
          <div class="col-md-3 amet-sed">
            <h4>NEWSLETTER</h4>
            <div class="stay">
              <div class="stay-left">
                <form>
                  <input type="text" placeholder="Enter your email " required="">
                </form>
              </div>
              <div class="btn-1">
                <form>
                  <input type="submit" value="Subscribe">
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-3 amet-sed ">
            <h4>CONTACT US</h4>
            <p>Contrary to popular belief</p>
            <p>The standard chunk</p>
            <p>office :  +12 34 995 0792</p>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="footer-class">
        <p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
      </div>
    </div>
  </body>
</html>
