<?php
include_once("includes/config.admin.php");
session_start();
error_reporting(0);
  if(isset($_POST['btnchangepass'])){
      
        $CurrPass = $_POST['confirmpass'];

        $sql = "UPDATE admin set Password = '$CurrPass' WHERE UserName = 'admin1';";
        $result = mysqli_query($conn, $sql);
          if($result){
              echo "<script>alert('Password Successfully Changed!')</script>";
          }
          else{
            echo "<script>alert('Update Failed')</script>";
          }

          mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    EERRS
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />

  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpass.value!= document.chngpwd.confirmpass.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpass.focus();
return false;
}
return true;
}
</script>
</head>

<body class="user-profile">
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

      <div class="panel-header panel-header-sm">
      </div>
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
            <a class="navbar-brand" href="#pablo">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

<div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="title">Change Password</h3>
              </div>
              <div class="card-body">
                <form name="chngpwd" onSubmit="return valid();" method = "post">
                  <div class="row">
                    
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" value="admin(default)" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="wizardojericho@gmail.com" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Current Password:</label>
                        <input type="password" name = "oldpass" class="form-control" placeholder="Old Password" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>New Password:</label>
                        <input type="password" name = "newpass" class="form-control" placeholder="New Password" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Confirm Password:</label>
                        <input type="password" name = "confirmpass" class="form-control" placeholder="Retype new Password" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <input type="submit" class="btn btn-lg btn-round btn-info" name = "btnchangepass" value = "Submit">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>