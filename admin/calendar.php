<?php
    include_once("includes/config.admin.php");
    session_start();
    error_reporting(0);
    if(strlen($_SESSION['alogin'])==0)
	{	
header('location:../about.php');
}

else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    EERRS Admin Panel
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <link rel = "stylesheet" href = "assets/css/calendar.css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">

    <div class="logo">
      <a href="#" class="simple-text logo-mini">
      <i class="now-ui-icons objects_diamond"></i>
        </a>
        <a href="#" class="simple-text logo-normal">
          EERRS: Admin Panel
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="index.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
            <a href="calendar.php">
              <i class="now-ui-icons ui-1_calendar-60"></i>
              <p>Reservation</p>
            </a>
          </li>
          <li>
            <a href="user.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Administrator Profile</p>
            </a>
          </li>
          <li>
            <a href="inventory.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Inventory</p>
            </a>
          </li>
         
          <li class="active-pro">
            <a href="../index.php">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Client Page</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">Calendar</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
           
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons ui-1_settings-gear-63"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Options</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                
                  <a class="dropdown-item" href="change-password.php">Change Password</a>
                  <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
     
      <!-- End Navbar -->
      
      <div class="panel-header panel-header-sm">
        
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title text-primary">Reservation Calendar</h4>
                <p class="category">Event Equipment Rental Reservation powered by
                  <a href="#">Jericho</a>
                </p>

              <div class="card card-chart">
              <div class="card-header">
              <h5 class="card-title text-info">Manage Reservation</h5>
              </div>
              <div class="card-body">
             
             
              <table class = "tables">
              <tr>
                <td>
              <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirm Reservation</h6>
		<form method="post">
			<p></p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rent Number: <input name="RentNo" required="" type="text" /><br />
			
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="confirm" class = "btn btn-sm btn-success" type="submit" value = "Confirm" /></p>
    </form>
    </td>
    <?php
    if(isset($_POST['confirm'])){
		$id = $_POST['RentNo'];

		$sql = "UPDATE rentals SET Status=1 WHERE RentNo = $id";
		if (mysqli_query($conn, $sql)) {
			echo "<h3 class = 'text-danger'>Reservation Confirmed!</h3>";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}	
		
	}

  ?>

		<td>
		<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Reservation</h6>
		<form method="post">
			<p></p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rent Number: <input name="RentNo" required="" type="text" /><br />
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="cancel" class = "btn btn-sm btn-danger" type="submit" value = "Delete" /></p>
		</form>
    </td>
                  <?php
                  if(isset($_POST['cancel'])){
                  $id = $_POST['RentNo'];

                  $sql = "DELETE FROM rentals WHERE RentNo = $id";
                  if (mysqli_query($conn, $sql)) {
                    echo "<h3 class = 'text-danger'>Reservation Deleted!</h3>";
                  }
                  else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }	  
                }

                ?>

                </tr>
              </table>

              <table class = 'table'>
              <h6 class="card-title text-info">Reservation History</h6>
              <th>Rent Number</th>
              <th>Customer Name</th>
              <th>Phone Number</th>
              <th>Item Rented</th><th>Total Price/ Days</th>
              <th>Category</th>
              <th>Date of Reservation</th>
               
               <?php
                   $sqlrents = "SELECT rentals.RentNo, customer.FirstName, customer.LastName, customer.ContactNo,
                   items.ItemName, items.Price, items.category, rentals.RentalDate, rentals.StartDate, rentals.ExpiryDate FROM rentals
                   inner join customer on rentals.CustomerID = customer.CustomerID
                   inner JOIN items on rentals.ItemID = items.id;";

                   $result = mysqli_query($conn, $sqlrents);
                        while($row = mysqli_fetch_assoc($result)){
                          $day =  $row['ExpiryDate'];
                          $day1 = $row['StartDate'];
                          $totalDays = ((($day-$day1)/3600)/24);
                            if($totalDays==0){
                              $totalDays =1;
                            }
                            
                          $TotalPrice = $row['Price'] * $totalDays;

                          echo "<tr>";
                          echo "<td class = 'text-center'>".$row['RentNo']."</td>";
                          echo "<td>".$row['FirstName']." ".$row['LastName']."</td>";
                          echo "<td>".$row['ContactNo']."</td>";
                          echo "<td>".$row['ItemName']."</td>";
                          echo "<td> <b>₱ ".$TotalPrice."</b> over ".$totalDays." Days</td>";
                          echo "<td>".$row['category']."</td>";
                          echo "<td>".$row['RentalDate']."</td>";
                          echo "</tr>";
                            
                   }
                  
               ?>
               </table>
              </div>
            </div>
          </div>
          
                <?php
/* draws a calendar */
function draw_calendar($month,$year){

	include 'includes/config.admin.php';



	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head" style = "background-color:orange">'.implode('</td><td class="calendar-day-head" style = "background-color:aqua">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			$current_epoch = mktime(0,0,0,$month,$list_day,$year);
			
       $sql = "SELECT items.ItemName, rentals.ItemID, rentals.RentNo, customer.FirstName, customer.LastName, customer.ContactNo, rentals.StartDate, rentals.ExpiryDate, rentals.StartTime, rentals.ExpiryTime, rentals.Status  from rentals
       left JOIN items on rentals.ItemID = items.id
       left JOIN customer on  rentals.CustomerID = customer.CustomerID
       WHERE $current_epoch BETWEEN StartDate AND ExpiryDate;";
      
			$result = mysqli_query($conn, $sql);
    		
    		if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {
          if($row["Status"] == 0) $calendar .= "<font color=\"grey\"><s>";
    				$calendar .= "<b>" . $row["ItemName"] . "</b><br>Rent #: " . $row["RentNo"] . "<br>" . $row["FirstName"] . "&nbsp;&nbsp;&nbsp;" . $row['LastName'] . "<br>" . $row["ContactNo"] . "<br>";
    				if($current_epoch == $row["StartDate"] AND $current_epoch != $row["ExpiryDate"]) {
    					$calendar .= "Booking starts: " . sprintf("%02d:%02d", $row["StartTime"]/60/60, ($row["StartTime"]%(60*60)/60)) . "<br><hr><br>";
    				}
    				if($current_epoch == $row["StartDate"] AND $current_epoch == $row["ExpiryDate"]) {
    					$calendar .= "Booking starts: " . sprintf("%02d:%02d", $row["StartTime"]/60/60, ($row["StartTime"]%(60*60)/60)) . "<br>";
    				}
    				if($current_epoch == $row["ExpiryDate"]) {
    					$calendar .= "Booking ends: " . sprintf("%02d:%02d", $row["ExpiryTime"]/60/60, ($row["ExpiryTime"]%(60*60)/60)) . "<br><hr><br>";
    				}
    				if($current_epoch != $row["StartDate"] AND $current_epoch != $row["ExpiryDate"]) {
	    				$calendar .= "Booking: 24h<br><hr><br>";
            }
            
					if($row["Status"] == 0) $calendar .= "</s></font>";
    			}
			} else {
    			$calendar .= "No bookings";
			}
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8 AND $days_in_this_week > 1):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	mysqli_close($conn);
	
	/* all done, return result */
	return $calendar;
}

include 'includes/config.admin.php';

$d = new DateTime(date("Y-m-d"));
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

$d->modify( 'first day of next month' );
echo '<h3>' . $months[$d->format('n')-1] . ' ' . $d->format('Y') . '</h3>';
echo draw_calendar($d->format('m'),$d->format('Y'));

?>

                
              

              </div>
            
      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <a href="../about.php">
                  About Us
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Event Equipment
            <a href="#" target="_blank">Rental</a> Reservation
            <a href="#" target="_blank">System</a>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <script src="assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
</body>
</html>
<?php } ?>