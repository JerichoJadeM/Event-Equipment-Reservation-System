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
    EERRS: Admin Panel
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  
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
          <li class="active ">
            <a href="index.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="calendar.php">
              <i class="now-ui-icons education_atom"></i>
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
            <a class="navbar-brand" >Dashboard</a>
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
      <div class="panel-header panel-header-lg">
        <?php include ("includes/clientchart.php");?>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Rentals</h5>
                <h4 class='card-title'><b>All Items: </b><?php
                      $sql = "SELECT count(id) from items;";
                      $result = mysqli_query($conn, $sql);
                        if($row = mysqli_fetch_assoc($result)){
                            echo $row['count(id)'];
                        }
                ?></h4> 
                <h6 class='card-title text-primary'>Total Reservations: <?php
                      $sql = "SELECT count(RentNo) from rentals;";
                      $result = mysqli_query($conn, $sql);
                        if($row = mysqli_fetch_assoc($result)){
                            echo "<b class = 'text-danger'>" .$row['count(RentNo)']. "</b>";
                        }
                ?></h6> 
                  <h6 class='card-title text-success'>Confirmed Reservations: <?php
                      $sql = "SELECT count(RentNo) from rentals WHERE Status = 1;";
                      $result = mysqli_query($conn, $sql);
                        if($row = mysqli_fetch_assoc($result)){
                            echo "<b class = 'text-danger'>".$row['count(RentNo)']. "</b>";
                        }
                ?></h6> 
                <h6 class='card-title text-info'>Unconfirmed Reservations: <?php
                      $sql = "SELECT count(RentNo) from rentals WHERE Status = 0;";
                      $result = mysqli_query($conn, $sql);
                        if($row = mysqli_fetch_assoc($result)){
                            echo "<b class = 'text-danger'>" . $row['count(RentNo)'] . "</b>";
                        }
                ?></h6> 
                   <h5 class='card-title text-success'><b>Estimated Revenue:</b></h5><h2>₱ <?php
                      
                      $sql = "SELECT sum(items.Price) as total, customer.CustomerID, sum(rentals.ExpiryDate) as xp, sum(rentals.StartDate) as st from rentals
                      INNER JOIN items on rentals.ItemID = items.id
                      INNER JOIN customer on rentals.CustomerID = customer.CustomerID
                      ORDER BY RentNo;";
                      $result = mysqli_query($conn, $sql);
                     if($row = mysqli_fetch_assoc($result)){
                       
                          $day =  $row['xp'];
                          $day1 = $row['st'];
                          $totalDays = ((($day-$day1)/3600)/24);
                            
                          $TotalPrice = $row['total'] * ($totalDays+$t1);
                          
                          echo $TotalPrice."<br>";
                          
                      }

                ?></h2> 
              </div>
              <div class="card-body">

              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Refresh to update
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Equipments</h5>
                <h4 class="card-title">Reserved Per Category</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                          <table class = "table">
                          <th class = "text-danger">Category</th><th  class = "text-danger">Total</th>
                              <?php
                                $sqlcat = "SELECT count(items.ItemName) as Total, items.category FROM rentals
                                INNER JOIN items on rentals.ItemID = items.id
                                group by category;";
                                $result = mysqli_query($conn, $sqlcat);

                                if(mysqli_num_rows($result)>0){
                                  while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>".$row['category']."</td>";
                                    echo "<td>".$row['Total']."</td>";
                                    echo "</tr>";
                                  }
                                }
                              
                              ?>
                          
                          </table>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Refresh to update
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Statistics</h5>
                <h4 class="card-title">Sales Report</h4>
              </div>
              <div class="card-body">
                <div class="chart-area">
                <div class="table-responsive small">
                              <table class = "table small">
                                <th class = "text-info ">Month</th><th class = "text-right">Sale</th> <th class = "text-info">Month</th><th class = "text-right">Sale</th>
                                  <tr><td class = "text-danger td-name"><b>January</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales1.php")?></td>
                                      <td class = "text-danger td-name"><b>July</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales7.php")?></td>
                                  </tr>
                                  <tr><td class = "text-danger td-name"><b>February</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales2.php")?></td>
                                      <td class = "text-danger td-name"><b>August</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales8.php")?></td>
                                  </tr>
                                  <tr><td class = "text-danger td-name"><b>March</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales3.php")?></td>
                                      <td class = "text-danger td-name"><b>September</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales9.php")?></td>
                                  </tr>
                                  <tr><td class = "text-danger td-name"><b>April</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales4.php")?></td>
                                      <td class = "text-danger td-name"><b>October</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales10.php")?></td>
                                  </tr>
                                  <tr><td class = "text-danger td-name"><b>May</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales5.php")?></td>
                                      <td class = "text-danger td-name"><b>November</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales11.php")?></td>
                                  </tr>
                                  <tr><td class = "text-danger td-name"><b>June</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales6.php")?></td>
                                      <td class = "text-danger td-name"><b>December</b></td>
                                  <td class = "text-right td-name">₱ <?php include("includes/sales12.php")?></td>
                                  </tr>
                                  
                                 

                                  
                              </table>
                              </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card  card-tasks">
              <div class="card-header ">
              <h5 class="card-category">Sales Table</h5>
                <h4 class="card-title text-info"><b>Transactions</b></h4>
                <table class = "table">
                                <tr>
                                <form method = "POST">
                             <b> Rent No:&nbsp;&nbsp;<input type = "number" name = "rentno" placeholder = "Enter Rent Number" required></b>
                             <td> <b>Date:</b><input type = "date" name = "sdate" placeholder = "YY-MM-DD" required></td>
                             <td><b> Amount:</b><input type = "number" name = "totalprice" placeholder = "Enter Amount" required></td>
                                  </tr>
                                  <tr>
                               <td> <input type = "submit" class = "btn btn-success btn-round btn-sm" name = "btnsale" value = "Save">
                                </td>
                                </form>
                                <?php
                                      if(isset($_POST['btnsale'])){
                                        $rentnum = $_POST['rentno'];
                                        $date = str_replace('/', '-', $_POST['sdate']);
                                        $Sdate =  date('Y-m-d', strtotime($date));
                                        $amount = $_POST['totalprice'];
  
                                        $sql = "INSERT INTO sales (RentNo, SalePerShip, SDate) VALUES ('$rentnum', '$amount', '$Sdate');";
                                        $result = mysqli_query($conn, $sql);
                                          if($result){
                                            echo "<script>alert('Payment Save!');</script>";
                                          }
                                          else{
                                            echo "<script>alert('Error Transaction');</script>";
                                          }
                                          mysqli_close($conn);
                                      }
                                  ?>
                </table>
                <h4 class="card-title"><b>Sales History</b></h4>
                <table class = "table">
               
                <th>Full Name</th><th>Rented Item</th><th>Duration</th><th>Amount</th>
                <tbody>
                                      <?php
                                          $sql = "SELECT customer.FirstName, customer.LastName,rentals.RentNo, items.ItemName, sales.Duration, sales.SalePerShip
                                          FROM rentals
                                          INNER JOIN customer on rentals.CustomerID = customer.CustomerID
                                          INNER JOIN sales on rentals.RentNo = sales.RentNo
                                          INNER JOIN items on rentals.ItemID = items.id;";

                                          $result = mysqli_query($conn, $sql);
                                          if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                              ;
                                              echo "<tr>";
                                              echo "<td>" . $row['FirstName'] ."&nbsp;&nbsp;". $row['LastName'] ."</td>";
                                              echo "<td>" . $row['ItemName'] . "</td>";
                                              echo "<td class = 'text-center'>" . $row['Duration'] . " Days</td>";
                                              echo "<td> ₱ " . $row['SalePerShip'] . "</td>";
                                              echo "</tr>";
                                              

                                            }
                                          }
                                      ?>
                                      </tbody>
                                      </table>
                <h5 class="card-category">Testimonials</h5>
                <h4 class="card-title">Feed Back</h4>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                  <th>
                        Subject
                      </th>
                      <th>
                        Message
                      </th>
                      <th>
                        Name
                      </th>
                     
                    </thead> 
                  
                  <tbody>
                                <?php
                                      $sql = "SELECT * from testimonials;";
                                      $result = mysqli_query($conn, $sql);
                                      $resultcheck = mysqli_num_rows($result);

                                          if($resultcheck > 0){
                                              while($row = mysqli_fetch_assoc($result)){
                                                   
                                                echo "<tr>";
                                                echo "<td>" . $row['Subject']. "</td>";
                                                echo "<td>" . $row['Message']. "</td>";
                                                echo "<td class = 'text-right'>" . $row['Name'] . "</td>";
                                                echo "</tr>";
                                            }             
                                          }
                                ?>
                    </tbody>
                  </table>
                </div>
              </div>
              
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="now-ui-icons loader_refresh spin"></i> Refresh to update
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Customer Information</h5>
                <h5 class="card-title text-info">Total Customers: <?php include_once("includes/statistics.php")?></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                   
                    <th>
                        ID
                      </th>
                      <th>
                        Full Name
                      </th>
                      <th>
                        Phone #
                      </th>
                      <th>
                        Billing Address
                      </th>
                      <th class="text-right">
                        Email Address
                      </th>
                    
                    <tbody>

                      <?php

                          $sql = "SELECT * from customer;";
                          $result = mysqli_query($conn, $sql);
                          $resultcheck = mysqli_num_rows($result);

                            if($resultcheck > 0){
                              while($row = mysqli_fetch_assoc($result)){

                                  echo "<tr>";
                                  echo "<td>" . $row['CustomerID'] ."</td>";
                                  echo "<td>" . $row['FirstName'] . "&nbsp;&nbsp;&nbsp;" . $row['LastName'] . "</td>";
                                  echo "<td>" . $row['ContactNo']. "</td>";
                                  echo "<td>" . $row['HomeAddress']. "</td>";
                                  echo "<td class = 'text-right'>" . $row['EmailAddress'] . "</td>";
                                  echo "</tr>";
                              }
                            }

                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
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

  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
     
      demo.initDashboardPageCharts();

    });
  </script>
</body>
</html>
<?php } ?>