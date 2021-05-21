<?php
    include("includes/config.admin.php");
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
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
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
          <li>
            <a href="calendar.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Calendar</p>
            </a>
          </li>
          <li>
            <a href="user.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Administrator Profile</p>
            </a>
          </li>
          <li class="active ">
            <a href="Inventory.php">
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
            <a class="navbar-brand">Inventory</a>
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
      <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> List of Equipments</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Item ID
                      </th>
                      <th>
                        Item Name
                      </th>
                      <th>
                        Category
                      </th>
                      <th>
                        Quantity
                      </th>
                      <th>
                      Price per Day
                      </th>
                      <th class>
                        Image Location/Name/Ext
                      </th>
                    </thead>
                    <tbody>
                            <?php
                                      $sql = "SELECT id, ItemName, category, Quantity, ItemImage, Price from items;";
                                      $result = mysqli_query($conn, $sql);
                                      $resultcheck = mysqli_num_rows($result);

                                          if($resultcheck > 0){
                                              while($row = mysqli_fetch_assoc($result)){
                                                   
                                                echo "<tr>";
                                                echo "<td>" . $row['id']. "</td>";
                                                echo "<td>" . $row['ItemName']. "</td>";
                                                echo "<td>" . $row['category']. "</td>";
                                                echo "<td>" . $row['Quantity']. "</td>";
                                                echo "<td>" . "₱ " . $row['Price']. "</td>";
                                                echo "<td>" . $row['ItemImage'] . "</td>";
                                                echo "</tr>";
                                            }             
                                          }
                                          mysqli_close($conn);
                                ?>
                    </tbody>
                  </table>

                  <table>
                    <tr>
                      <td><form action = "#" method = "POST" enctype="multipart/form-data">
                                        Item ID: <input type = "text" name = "ItemID" placeholder = "Enter Item ID" required/>
                                        <input type = "file" name = "img" />
                                        <input type = "submit" name = "picupload" class = "btn btn-round btn-info" value = "Upload Image"/>
                                          
                                          </form>
                                          <p class = "text-info">(See pictures on Client Page)</p>
                                        </td>
                                       
                                       <?php
                                        include("includes/config.admin.php");


                                        if(isset($_POST['picupload'])){
                                                
                                          $itemID = $_POST['ItemID'];
                                          $filename = addslashes($_FILES['img']['name']);
                                          $tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
                                          $filetype = addslashes($_FILES['img']['type']);
                                          $target = "../images/";
                                          $targetpath = $target . $filename;
                                          
                                          
                                        
                                          $array = array('jpg', 'jpeg');
                                          $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                        
                                            if(!empty($filename)){
                                              move_uploaded_file($_FILES['img']['tmp_name'], $targetpath);
                                              if(in_array($ext, $array)){
                            
                                                    $sql ="UPDATE items SET ItemImage ='images/$filename' where id = $itemID;";
                                                    $result =mysqli_query($conn, $sql);
                                                    if($result){
                                                        echo "<h6 class = 'text-success'>Upload Successful</h6>";
                                                    }
                                                      else{
                                                        echo "Error Upload";
                                                      }
                                              }
                                              else{
                                                echo "unsupported format";
                                              } 
                                          }
                                          else{
                                            echo "Pls Select image";
                                            }
                                       mysqli_close($conn); }
                                       ?>
                                        <tr>
                                        <td>
                                         <form method="post">
                                         <h4 class = "text-danger"><b>DELETE ITEM:</b></h4>
                                         <p class = "text-danger">(Cannot undo changes!)</p>
                                         Item ID:<input name="ItemID" required="" type="text" placeholder = "Enter ID Number"/>
                                          <input name="deletesub" class = "btn btn-danger btn-round" type="submit" value="Delete" />
                                        </form>
                                        </td>
                                        </tr>
                       <?php
                         include("includes/config.admin.php");
                           if(isset($_POST['deletesub'])){

                                   $ItemID = $_POST['ItemID'];

                                   $sqldel = "DELETE from items where id = '$ItemID';";
                                    if($result = mysqli_query($conn, $sqldel)){
                                         echo "<script>alert('Item has been deleted!')</script>";
                                 }
                                   else{
                                echo "Error: " . $sqldel . "<br>" . mysqli_error($conn);
                             }
                          }
                          mysqli_close($conn);
                      ?>
                </table>
                <h4 class="card-title text-primary"><b> Update Item:</b></h4>
                <form method = "POST"> 
                        <b class = "text-info">Item ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name = "ItemID" placeholder="Enter ID of Item you want to update." required>
                        &nbsp;&nbsp;&nbsp;  Item Name: &nbsp;&nbsp;&nbsp;  <input type="text" value="" name = "ItemName" placeholder="Change Item Name" required>
                        &nbsp;&nbsp;&nbsp; <select name="category" required>
		  <option selected="selected">--Select Category--</option>
			<option>speaker</option>
			<option>monitor</option>
			<option>lights</option>
			<option>microphone</option>
			<option>recorder</option>
			</select>
                        <br></br>
                        Quantity: &nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" value=""  name = "Quantity" placeholder="Update Quantity" required><br></br>
                        Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "text" value=""  name = "Price" placeholder="Update Price" required><br></br>
                        Description: <textarea class="form-control" name = "Description" placeholder="Change Description" required></textarea>
                        </b>
                        <button type = "submit" class = "btn btn-lg btn-info btn-round" name = "btnsave">Save</button>
                        </form>
                        <?php
                          include("includes/config.admin.php");
                               if(isset($_POST['btnsave'])){
                                                    $itemID = $_POST['ItemID'];
                                                    $ItemName = $_POST['ItemName'];
                                                    $category = $_POST['category'];
                                                    $Quantity = $_POST['Quantity'];
                                                    $Price = $_POST['Price'];
                                                    $Desc = $_POST['Description'];

                                                    $sql = "UPDATE items SET ItemName = ' $ItemName', category = '$category', Quantity = '$Quantity', Price = '$Price', Description = '$Desc' WHERE id = $itemID";
                                                    $result =mysqli_query($conn, $sql);

                                                    if($result){
                                                      echo "<h3 class = 'text-success'> Item Save Succesfully!";
                                                    }
                                                    mysqli_close($conn);
                               }
                         ?>   
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title text-success"><b> Post a New Item:</b></h4>
                <p class="category"> Please fill all details.</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-info">

                      <th><b>
                        Name of new Item</b>
                      </th>
                      <th>
                        <b>Quantity</b>
                      </th>
                      <th>
                      <b>Price</b>
                      </th>
                      <th class="text-right"><b>
                        Description
                        </b></th>
                    </thead>
                    <tbody>
                    <tr>
                    <form method = "POST"> 
                        <td>
                        <input type="text" value="" class="form-control" name = "ItemName" placeholder="Enter Item Name">
                        </td>
                        <td>
                        <input type="text" value="" class="form-control" name = "Quantity" placeholder="Enter Quantity">
                        </td>
                        <td>
                        <input type = "textarea" value="" class="form-control" name = "Price" placeholder="Enter Price"></textarea>
                        </td>
                        <td class="text-right">
                        <textarea class="form-control" name = "Description" placeholder="Enter Description"></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td><h6 class = "text-info">Category
                        &nbsp;&nbsp;&nbsp; <select name="category" required>
		  <option selected="selected">--Select Category--</option></h>
			<option>speaker</option>
			<option>monitor</option>
			<option>lights</option>
			<option>microphone</option>
			<option>recorder</option>
			</select>
                          </td>
                        <td>
                         </td>
                        <td>
                        
                        </td>
                        <td class="text-right">
                       
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <button type = "submit" class = "btn btn-lg btn-success" name = "postsubmit">Add to Inventory</button>
                        </form>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">                                 
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
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
</body>

</html>

<?php } ?>