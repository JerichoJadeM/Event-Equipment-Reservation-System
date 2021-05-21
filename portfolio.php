<?php
	session_start();
	include("includes/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>EERRS</title>
		<link rel = "stylesheet" href = "css/reservation-form.css" type = "text/css" />
		<link href="tooplate_style.css" rel="stylesheet" type="text/css" />
				
		<link rel="stylesheet" type="text/css" href="ddsmoothmenu.css" />

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="ddsmoothmenu.js"></script>


<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "tooplate_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>


<link href="css_pirobox/black/style.css" media="screen" title="black" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/piroBox.1_2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox({
			my_speed: 600, //animation speed
			bg_alpha: 0.5, //background opacity
			radius: 4, //caption rounded corner
			scrollImage : false, // true == image follows the page, false == image remains in the same open position
			pirobox_next : 'piro_next', // Nav buttons -> piro_next == inside piroBox , piro_next_out == outside piroBox
			pirobox_prev : 'piro_prev',// Nav buttons -> piro_prev == inside piroBox , piro_prev_out == outside piroBox
			close_all : '.piro_close',// add class .piro_overlay(with comma)if you want overlay click close piroBox
			slideShow : 'slideshow', // just delete slideshow between '' if you don't want it.
			slideSpeed : 4 //slideshow duration in seconds(3 to 6 Recommended)
	});
});
</script>

    
</head>
<body>

<div id="tooplate_outer_wrapper">
	<div id="tooplate_wrapper">
    	<div id="tooplate_header">
		
            <div id="site_title"><h1><a href="#">wew</a></h1></div>
            
            <div id="tooplate_menu" class="ddsmoothmenu">
                <ul>
                    <li><a href="index.php"><span></span>Home</a></li>
                    <li><a href="about.php"><span></span>About Us</a></li>
                    <li><a href="portfolio.php" class="selected"><span></span>Portfolio</a></li>
                    <li><a href="contact.php"><span></span>Contact Us</a></li>
                </ul>
                <br style="clear: left" />
            </div> <!-- end of tooplate_menu -->
			
            <div class="cleaner"></div>
        </div> <!-- end of forever header -->
        
        <div id="tooplate_middle_sp">
            <div id="mid_title">
			WELCOME TO OUR GALLERY
			<p>Check out the most affordable event equipments<strong> for rent</strong></a> yet so powerful suitable for all your <strong>needs</strong></a>.</p>
            </div>
            <div id="learn_more"><a href="#">Home</a></div>
            <div class="cleaner"></div>
		</div> <!-- end of middle -->
        
        <div id="tooplate_main">
         	<div id="gallery">
    	  		<div class="col_w420 float_l">
				  <?php
                        
                        $sql = "SELECT * from items WHERE Quantity > 0 ;";
                        $result = mysqli_query($conn, $sql);
                        $resultcheck = mysqli_num_rows($result);

                        if($resultcheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
								
								echo "<table>";
                                echo "<tr>";
								echo "<td>";?> 
								<a class = "pirobox" href = "<?php echo $row['ItemImage']?>" title = "<?php echo $row['ItemName'] . '<br>' .$row['Description']?>">
                                <img src = "<?php echo $row['ItemImage']; ?>" height = "130px" width = "230px" class = "image_wrapper image_fl"><?php echo"</a></td>";
								echo "<td><em><h4>" . $row['ItemName'] . "</h4></em>";
								echo "<em><h5>ID Number: " . $row['id'] . "</h5></em>";
                                echo "<p>" . $row['Description'] . "</p>";
                                echo "<p>Available: " . $row['Quantity'] . "<br>";
								echo "<p> Price per Day: Php " . $row['Price'] . "</p>";
								echo "</tr>";
                                echo "</table>";
                            }
                        }
                        ?>	
				</div>
    	  		
			
				<div class="col_w420 float_r">
                <h4>Make Reservation</h4>
                <div id="map">
				<form method = "POST">
  <div class="container">
    <p>Please fill in this form to reserve your desired item.</p>
	<hr>
	<label for = "ItemID"><b>Equipment ID:<b></label>
	<input type = "text" placeholder = "ID Number of Item you want to rent" name = "ItemID" required> 

    <label for="firstname"><b>First Name:</b></label>
    <input type="text" placeholder="Enter First Name" name="FirstName" required>

	<label for="lastname"><b>Last Name:</b></label>
    <input type="text" placeholder="Enter Last Name" name="LastName" required>

	<label for="contactNo"><b>Phone Number:</b></label>
    <input type="text" placeholder="Your Phone Number" name="ContactNo" required>

	<label for="homeaddress"><b>Billing Address:</b></label>
    <input type="text" placeholder="Your complete Address" name="HomeAddress" required>

    <label for="emailadd"><b>Email Address:</b></label>
    <input type="text" placeholder="Enter valid Email Address" name="EmailAddress" required>
	
	Rental Date:<br>
			<input id = "from"  placeholder = "Rent From (Start Day)" name="StartDate" required="" type="text" />
			<input id = "to"  placeholder = "Rent to (End of Rent)" name="ExpiryDate" required="" type="text" />
	Start Time:
	<select name="start_hour">
			<option selected="selected">00</option>
			<option>01</option>
			<option>02</option>
			<option>03</option>
			<option>04</option>
			<option>05</option>
			<option>06</option>
			<option>07</option>
			<option>08</option>
			<option>09</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option>23</option>
			</select>

			<select name="start_minute">
			<option selected="selected">00</option>
			<option>30</option>
			</select>
			&nbsp;&nbsp;&nbsp;End Time:	
			<select name="end_hour">
			<option>00</option>
			<option>01</option>
			<option>02</option>
			<option>03</option>
			<option>04</option>
			<option>05</option>
			<option>06</option>
			<option>07</option>
			<option>08</option>
			<option>09</option>
			<option>10</option>
			<option>11</option>
			<option>12</option>
			<option>13</option>
			<option>14</option>
			<option>15</option>
			<option>16</option>
			<option>17</option>
			<option>18</option>
			<option>19</option>
			<option>20</option>
			<option>21</option>
			<option>22</option>
			<option selected="selected">23</option>
			</select>:<select name="end_minute">
			<option>00</option>
			<option selected="selected">30</option>
			</select>
			<p>
			
    <hr>
    <p>Clicking the button means you agree to our <a href="#">Terms & Conditions</a>.</p>

    <button type="submit" class="registerbtn" name = "submit">Rent Item</button>
 <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	if(isset($_POST['submit'])){

				$start_day = intval(strtotime($_POST["StartDate"]));
				$start_time = (60*60*intval($_POST["start_hour"])) + (60*intval($_POST["start_minute"]));
				$end_time = (60*60*intval($_POST["end_hour"])) + (60*intval($_POST["end_minute"]));
				$end_day = intval(strtotime($_POST["ExpiryDate"]));
				$item = $_POST["ItemID"];
				$fname = $_POST["FirstName"];
				$lname = $_POST["LastName"];
				$phone =$_POST["ContactNo"];
				$HAddress = $_POST["HomeAddress"];
				$EmailAdd = $_POST["EmailAddress"];



				$start_epoch = $start_day + $start_time;
				$end_epoch = $end_day + $end_time;
		
			


				// prevent double booking
		$sql = "SELECT * FROM rentals 
		inner join items on rentals.ItemID = items.id
		WHERE ItemID='$item' AND Quantity = 0 AND (StartDate>=$start_day OR ExpiryDate>=$start_day) AND Status=0;";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// handle every row
			while($row = mysqli_fetch_assoc($result)) {
				// check overlapping at 10 minutes interval
				for ($i = $start_epoch; $i <= $end_epoch; $i=$i+600) {
					if ($i>($row["StartDate"]+$row["StartTime"]) && $i<($row["ExpiryDate"]+$row["ExpiryTime"])) {
						echo '<h3><font color="red">Unfortunately ' . $row['ItemName'] . ' has already been booked for the time requested.</font></h3>';
						goto end;
					}
				}
			}				
		}
								$sql1 = "INSERT INTO customer (LastName, FirstName, ContactNo, HomeAddress, EmailAddress) VALUES ('$lname', '$fname', '$phone', '$HAddress', '$EmailAdd');";
								$query = mysqli_query($conn, $sql1);
								if($query){
										$sqlUpdate = "SELECT * from customer WHERE LastName = '$lname' AND FirstName = '$fname';";
										$resultupdate = mysqli_query($conn, $sqlUpdate);
										$row = mysqli_fetch_assoc($resultupdate);
												$CustID = $row['CustomerID'];
													$sqlRentals = "INSERT INTO rentals (CustomerID, ItemID, StartDate, ExpiryDate, StartTime, ExpiryTime) VALUES ('$CustID', '$item', '$start_day', '$end_day', '$start_time', '$end_time');";
													$rentalResult = mysqli_query($conn, $sqlRentals);
													if($rentalResult){
															
															$sqlprice = "SELECT Price, Quantity from items WHERE id = $item";
															$resultprice = mysqli_query($conn, $sqlprice);
															if($resultprice){
																$row = mysqli_fetch_assoc($resultprice);
																	$day = ((($end_day-$start_day)/3600)/24);
																	if($day==0){
																		$totalprice = $row['Price'];
																		$quantity1 = $row['Quantity'] - 1;
																		$Quan = "UPDATE items SET Quantity = $quantity2 WHERE id = $item;";
																		$Upresult = mysqli_query($conn, $Quan);
																		echo "<script>alert('Congratulations $fname! Your Reservation has been saved! Total Price is:₱ $totalprice in 1 day, Wait for our email for your booking details!');</script>";
																		goto end;
																	}
																	else
																	 $totalprice = $row['Price'] * $day;
																	 $quantity2 = $row['Quantity'] - 1;
																		$Quan = "UPDATE items SET Quantity = $quantity2 WHERE id = $item;";
																		$Upresult = mysqli_query($conn, $Quan);
																		
																		/* Exception class. */
																			require 'PHPMailer\src\Exception.php';

																			/* The main PHPMailer class. */
																			require 'PHPMailer\src\PHPMailer.php';

																			/* SMTP class, needed if you want to use SMTP. */
																			require 'PHPMailer\src\SMTP.php';

																			$mail = new PHPMailer(TRUE);

																			try {
																				
																				$mail->setFrom('no-reply@howcode.org', 'EVENT EQUIPMENT RENTAL RESERVATION');
																				$mail->addAddress($_POST['EmailAddress'], $_POST['FirstName']);
																				$mail->Subject = 'RESERVATION CONFIRMED';
																				$mail->Body = 'Thank you for trusting us to provide for your event needs, Your reservation has been recorded and will deliver your items 2hrs earlier the date of reservation. For more info, Pls call 09978658119. Thank you.';
																				
																				/* SMTP parameters. */
																				
																				/* Tells PHPMailer to use SMTP. */
																				$mail->isSMTP();
																				
																				/* SMTP server address. */
																				$mail->Host = 'smtp.gmail.com';

																				/* Use SMTP authentication. */
																				$mail->SMTPAuth = TRUE;
																				
																				/* Set the encryption system. */
																				$mail->SMTPSecure = 'ssl';
																				
																				/* SMTP authentication username. */
																				$mail->Username = 'stevenskie9090@gmail.com';
																				
																				/* SMTP authentication password. */
																				$mail->Password = 'mcsoingviamkbnel';
																				
																				/* Set the SMTP port. */
																				$mail->Port = 465;
																				
																				/* Finally send the mail. */
																				$mail->send();
																			}
																			catch (Exception $e)
																			{
																				echo $e->errorMessage();
																			}
																			catch (\Exception $e)
																			{
																				echo $e->getMessage();
																			}
																			 echo "<script>alert('Congratulations $fname! Your Reservation has been saved! Total Price is:₱ $totalprice in $day days, Wait for our email for your booking details!');</script>";	
																
																		 goto end;
																		
																	}
															else{
																echo "<script>alert('Booking Not Completed!')</script>";
															}
															
														}
											
										
									}
																				
						
					else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);

					}       
	
					end:
					mysqli_close($conn);
					}
?>	
	</div>

</form>

              </div>                
                <div class="cleaner h30"></div>
			  
        
   	  		<div class="cleaner"></div>
        </div>
		
		<div id="tooplate_main_bottom"></div>
    
    	<div id="tooplate_footer">
            
			Copyright © 2020 <a href="#">Event Equipment Rental Reservation</a>
        </div>
    
    </div> <!-- end of tooplate_wrapper -->
</div> <!-- end of tooplate_outer_wrapper -->

<link href="jquery-ui.css" rel="stylesheet" type = "text/css"/>
<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>

<script>
    $(function() {
	<!--$.datepicker.setDefaults($.datepicker.regional['fi']);-->
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
	  regional: "fi",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });  </script> 


</body>
</html>