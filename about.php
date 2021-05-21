<?php
        session_start();
        if(isset($_POST['login'])){
                require 'includes/config.php';
    
                $myUserName = $_POST['UserName'];
                $myPassword = $_POST['Password'];
    
                if (empty($myUserName) || empty($myPassword)){
                    
                    header("location: about.php?error=emptyfields");
                    exit();
                 }
                else {
                    $sql = "SELECT id FROM admin WHERE UserName = '$myUserName' and Password = '$myPassword';";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                   // $active = $row['active'];
                    
                    $count = mysqli_num_rows($result);
                    
                    // If result matched $myusername and $mypassword, table row must be 1 row
                      
                    if($count == 1) {
                        $_SESSION['alogin']=$_POST['UserName'];
                        echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
                    }else {
                         echo "<script>alert('UserName or Password is Invalid');</script>";
                        
                      }
                 }       
                   
        }
        
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EERRS</title>


<link href="tooplate_style.css" rel="stylesheet" type="text/css" />
<link href="css/w3.css" rel="stylesheet" type="text/css" />

        
<link rel="stylesheet" type="text/css" href="ddsmoothmenu.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="ddsmoothmenu.js">
</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "tooplate_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
    
</head>
<body>

<div id="tooplate_outer_wrapper">
	<div id="tooplate_wrapper">
    	<div id="tooplate_header">
            
            <div id="site_title"><h1><a href="#">EERRS</a></h1></div>
			
            <div id="tooplate_menu" class="ddsmoothmenu">
                <ul>
                    <li><a href="index.php"><span></span>Home</a></li>
                    <li><a href="about.php" class="selected"><span></span>About Us</a></li>
                    <li><a href="portfolio.php"><span></span>Portfolio</a></li>
                    <li><a href="contact.php"><span></span>Contact Us</a></li>
                </ul>
                <br style="clear: left" />
            </div> <!-- end of tooplate_menu -->
			
            <div class="cleaner"></div>
        </div> <!-- end of forever header -->
        
        <div id="tooplate_middle_sp">
            <div id="mid_title">
               About Us 
            </div>
                <p>More about the Event Equipment Rental Reservation Company</p>
                
            <div id="learn_more"><a href=index.php>Home</a></div>
			
            <div class="cleaner"></div>
        </div> <!-- end of middle -->
        
        <div id="tooplate_main">
        	
            <div class="col_w900 col_w900_last">
            <div class="col_w580 float_l">
                
				<h2>Our Goal</h2>
				<p><em>Event Equipment Rental Reservation Company </em></p>
                <p>Our goal is to help our clients create the most dynamic events by <a href="#">providing</a> reliable and competitively priced products. </p>
                <p>We understand your world. The team EERRS has hospitality and special event experience.</p>
                <p>Many of us are rental people. We know what it is like to get crazy requests.</p>
                <p>It's important for you to have someone to call when you get these crazy requests; that's us!</p>
				<div class="h30"></div>
				<div class="image_wrapper image_fl"><img src="images/banner2.jpg" height = "250" width = "550" alt="Image 03" /></div>
				<h5>TRUST</h5>
				<p>It is very important virtue in the special event and hospitality industries. <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>We are not just rental company</strong></a> we are more than that. <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>See</strong></a> what others are saying <a href="#">about</a> EERRS.</p>
                
            </div>

                    


            <div class="col_w280 float_r">
            
                <h2></h2>
                <blockquote>
                <div class="image_wrapper image_fl"><img src="images/grace.jpg" height = "500" width = "250" alt="Image 03" /></div>
                </blockquote>
            
            </div>  
            <div class="cleaner"></div>

		</div>
            
        </div><div id="tooplate_main_bottom"></div>


    	<div id="tooplate_footer">
        
         <div class="w3-container">
         Copyright  <button onclick="document.getElementById('id01').style.display='block'" >©</button>

         <div id="id01" class="w3-modal">
                 <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close">&times;</span>
        <img src="images/AdminAvatar.png" alt="Avatar" style="width:30%" />
      </div>
     
      <form class="w3-container" method = "POST">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="UserName" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="Password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name = "login">Login</button>
          
        </div>


      </form>

    </div>
  </div>
    
        2020
        <a href="#">Event Equipment Rental Reservation</a> - Developed by: Jericho Jade B. Madolid
			
        </div>
    
    </div> <!-- end of tooplate_wrapper -->
</div> <!-- end of tooplate_outer_wrapper -->

    
</body>
</html>