<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $_GET['hall']; ?></title>
    <link rel="stylesheet" type="text/css" href="starability-minified/starability-all.min.css"/>
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

                  $hallName = $_GET['hall'];
                  $sql = "SELECT HallName, Image FROM AccImages";
                  $res = $conn->query($sql);
                  while($row = $res->fetch_assoc())
                  {
                     if( $row['HallName'] == $hallName)
                     {
                        $image = $row['Image'];
                        echo "<li data-thumb='../Images/" . $image. "'>";
                        echo "<div class='thumb-image'>";
                        echo "<img src=\"../Images/" . $image . "\" data-imagezoom='true' class='img-responsive'>";
                        echo "</div></li>";
                        $boo = TRUE;
                     }
                   }//while
                   
                   if(!$boo){
                       echo '<script language="javascript">';
                       //echo 'alert("There seems no such ");';
                       echo 'window.location.replace("../Error404")';
                       echo '</script>';
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
                 $hallName = $_GET['hall'];
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
                 $hallName = $_GET['hall'];
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

                              $hallName = $_GET['hall'];
                              $sql = "SELECT HallName, RoomType, Weeks, Total_Price, Price FROM AccInfo ";
                              $res = $conn->query($sql);


                              echo"<table width='700' height='250' border: 1px solid #F5F5F5; text-align: left; style='background-color:#F5F5F5;'> <tr>";
                              echo"<th>RoomType</th>";
                              echo"<th>Weeks</th>";
                              echo"<th>Annual Rent &pound;</th>";
                              echo"<th>Weekly Rent &pound;</th>";
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
            <!--Embedded google maps using API-->
            <!--Displays route from chosen accommodation to university place-->
             <?php
                          require_once('./config.inc.php');
                          $conn = new mysqli($database_host, $database_user, $database_pass, $group_dbnames[0]);

                          // Check for errors before doing anything else
                          if($conn -> connect_error) {
                              die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
                          }

                              $hallName = $_GET['hall'];
                              $sql = "SELECT HallName,Position FROM AccInfo ";
                              $res = $conn->query($sql);
                          while($row = $res->fetch_assoc()){
                            $id = $row['Position'];
                            if( $row['HallName'] == $hallName && $id != '')
                            {
                              //embeds google maps into an iframe. map mode is set to directions
                              //origin and destinations are queried by using place_id
                              //mode=walking specifies mode of transport
                              //API key is shown, but low risk as no billing occurs regarding this specific key
                              echo" <iframe width='120%' height='400' frameborder='0' style='border:0' src=\"https://www.google.com/maps/embed/v1/directions?origin=place_id:" .$id. "&destination=place_id:ChIJkWlTho2xe0gRDsjpV3HnzFw&mode=walking&key=AIzaSyAqVGv_WB9TicPgKEP8mjWiXKl2y-Sq0JE\"allowfullscreen></iframe>";
                            }
                          }

            ?>


            <div class="clearfix"> </div>
            <br><br>
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

              $hallName = $_GET['hall'];

              $TotalCleanliness = 0;
              $TotalSocial = 0;
              $TotalMaintenance = 0;
              $TotalSecurity = 0;
              $TotalLocation = 0;
              $NumOfReviews = 0;

              $sql = "SELECT `Cleanliness`, `Social`, `Maintenance`, `Security`, `Location` FROM `Review List` WHERE `Hall Name` = '$hallName' and `Social` IS NOT NULL";
              $res = $conn->query($sql);
              while($row = $res->fetch_assoc())
              {
                $TotalSocial += $row['Social'];
                $TotalCleanliness += $row['Cleanliness'];
                $TotalMaintenance += $row['Maintenance'];
                $TotalSecurity += $row['Security'];
                $TotalLocation += $row['Location'];
                $NumOfReviews ++;
              }
              if ($NumOfReviews > 0)
              {
                $TotalCleanliness = round($TotalCleanliness / $NumOfReviews);
                $TotalSocial = round($TotalSocial / $NumOfReviews);
                $TotalMaintenance = round($TotalMaintenance / $NumOfReviews);
                $TotalSecurity = round($TotalSecurity / $NumOfReviews);
                $TotalLocation = round($TotalLocation / $NumOfReviews);
                echo "<table style=\"width: 100%;\">";
                  echo "<tr>";
                    echo" <th style=\"text-align:center\">Social</th>";
                    echo "<th style=\"text-align:center\">Cleanliness</th>";
                    echo "<th style=\"text-align:center\">Maintenance</th>";
                    echo "<th style=\"text-align:center\">Security</th>";
                    echo "<th style=\"text-align:center\">Location</th>";
                  echo "</tr>";
                  echo "<tr>";
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=\"" . $TotalSocial . "\"></p></td>";
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=\"" . $TotalCleanliness . "\"></p></td>";
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=\"" . $TotalMaintenance . "\"></p></td>";
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=\"" . $TotalSecurity . "\"></p></td>";
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=\"" . $TotalLocation . "\"></p></td>";
                  echo "</tr>";
                echo "</table>";

                echo "<br><br><br><br>";

                $sql = "SELECT `Author`, `Comments`, `Cleanliness`, `Social`, `Maintenance`, `Security`, `Location`, `Add_time` FROM `Review List` WHERE `Hall Name` = '$hallName'";
                $res = $conn->query($sql);
    
                while($row = $res->fetch_assoc())
                {
                  $Author = $row['Author'];
                  $date = $row['Add_time'];
                  $Comments = $row['Comments'];
                  $Maintenance = $row['Maintenance'];
                  $Security = $row['Security'];
                  $Location = $row['Location'];
                  $Cleanliness = $row['Cleanliness'];
                  $Social = $row['Social'];

                  echo "<h4 style='font-style: italic; font-size: 25px'> $Author </h4>";
                  echo "<p> $date </p>";

                  echo "<table style=\"width: 100%;\">";
                    echo "<tr><th style=\"text-align:center\">Social</th>";
                    echo "<th style=\"text-align:center\">Cleanliness</th>";
                    echo "<th style=\"text-align:center\">Maintenance</th>";
                    echo "<th style=\"text-align:center\">Security</th>";
                    echo "<th style=\"text-align:center\">Location</th></tr>";
                    echo "<tr><td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=" . $Social . "></td>";
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=" . $Cleanliness . "></td>"; 
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=" . $Maintenance . "></td>"; 
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=" . $Security . "></td>"; 
                    echo "<td><p style=\"left: 25%;\" class=\"starability-result\" data-rating=" . $Location . "></td></tr>"; 
                    echo "</table><br>";  
                  echo "<p style='background-color:#F5F5F5; font-size: 20px'> $Comments </p></br><br><br>";
                  $boo = TRUE;
                }//while
              }
              else
              {

                echo"<h4 style='font-style: italic; font-size: 25px'>There aren't any reviews yet - Be the first to write one!</h4></br>";
              }
            ?>
            <div class="star-on">
              <div class="btn-1">

                  <?php echo "<a href=\"review.php?hall=" . $hallName . "\" class='link_button'> Review </a>" ?>

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
    <?php include("../footer.php"); ?>
  </body>
</html>
