<?php
    include_once("includes/config.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EERRS</title>

<link href="tooplate_style.css" rel="stylesheet" type="text/css" />
<link href = "slider_style.css" rel = "stylesheet" type = "text/css" />
<link href = "css/w3.css" rel = "stylesheet" type = "text/css" />

<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript">
	var flashvars = {};
	flashvars.xml_file = "photo_list.xml";
	var params = {};
	params.wmode = "transparent";
	var attributes = {};
	attributes.id = "slider";
	swfobject.embedSWF("flash_slider.swf", "flash_grid_slider", "440", "220", "9.0.0", false, flashvars, params, attributes);
</script>

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
                    <li><a href="index.php" class="selected"><span></span>Home</a></li>
                    <li><a href="about.php"><span></span>About Us</a></li>
                    <li><a href="portfolio.php"><span></span>Portfolio</a></li>
                    <li><a href="contact.php"><span></span>Contact Us</a></li>
                </ul>
				
                <br style="clear: left" />
            </div> <!-- end of tooplate_menu -->
			
            <div class="cleaner"></div>
        </div> <!-- end of forever header -->
        
        <div id="tooplate_middle">
            <div id="mid_slider">
                <div>
                        <img src="images/banner1.jpg" width = "450px" height = "220px" alt="Get Adobe Flash player" />
                    </a>
                </div>
            </div>
			
            <div id="mid_right">
                <div id="mid_title">
                    Event Services Perfect for You!
                </div>
                <p>Event Equipment Rental Reservation is a web – based system that aims to provide better rental experience. Designed to manage rental services particularly sound systems, lights, LED walls and other equipment used in events and parties. </p>
                <div id="learn_more"><a href="portfolio.php">Reserve Now</a></div>
            </div>
			
            <div class="cleaner"></div>
        </div> <!-- end of tooplate_middle -->
        
        <div id="tooplate_main">
        	
            <div class="col_w900">
            <div class="col_allw280 fp_service_box">
                <h3>Low Fees</h3>
                <img src="images/tick-48px.png" alt="Tick Image" />
                <p> Experience our services at a cheaper price</p>
            </div>
			
            <div class="col_allw280 fp_service_box">
                <h3>Professional</h3>
                <img src="images/post-it-48px.png" alt="Post Image" />
                <p>Our technical crews are the best in the country.</p>
            </div>
			
            <div class="col_allw280 fp_service_box col_last">
                <h3>High Perfomance</h3>
                <img src="images/rosette-48px.png" alt="Rosette Image" />
                <p>We only provide <strong> quality items</strong></a> from the most <strong>trusted brands</strong></a> so our items are 100% of high performance.</p>
            </div>
			
            <div class="cleaner"></div>
        </div>
        
        <div class="col_w900 col_w900_last">
            <div class="col_w580 float_l">
                
                <h2>What's Hot! <span class="blinking">Rent Now!</span><br></br>
               
                <?php
                        
                        $sql = "SELECT * from items order by rand() limit 2;";
                        $result = mysqli_query($conn, $sql);
                        $resultcheck = mysqli_num_rows($result);

                        if($resultcheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<table>";
                                echo "<tr>";
                                echo "<td>";?> 
                                <img src = "<?php echo $row['ItemImage']; ?>" height = "130px" width = "230px" class = "image_wrapper image_fl"><?php echo"</td>";
                                echo "<td><p><em><h4>" . $row['ItemName'] . "</h4></em></p>";
                                echo "<p>" . $row['Description'] . "</p>";
                                echo "<p>Available: " . $row['Quantity'] . "<br>";
                                echo "<p> Price per Day: Php " . $row['Price'] . "</p>";
                                echo "</tr>";
                                echo "</table>";
                            }
                        }
                            
                        ?>	
                  
            </div>
            <div class="col_w280 float_r">
            
                <h3>Testimonials</h3>
                <blockquote>
                <?php
                        $sql = "SELECT * from testimonials order by rand() limit 3;";
                        $result = mysqli_query($conn, $sql);
                        $resultcheck = mysqli_num_rows($result);

                            if($resultcheck > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '<p> "' . $row['Message'] . '"</p>';
                                    echo "<cite> - " . $row['Name'] . "</cite>";
                                    echo "<br></br>";
                                }
                            }
                                
                    ?>

<div class="image_wrapper image_fl"><img src="images/animated.gif" height = "200" width = "250" alt="Image 03" /></div>
                </blockquote>
            
            </div>  
			
            <div class="cleaner"></div>   
		</div>
            
        </div><div id="tooplate_main_bottom"></div>
    
    	<div id="tooplate_footer">
		
            Copyright © 2020 <a href="#">Even Equipment Rental Reservation</a>
            
        </div>
    
    </div> <!-- end of tooplate_wrapper -->
</div> <!-- end of tooplate_outer_wrapper -->
          
</body>
</html>