<?php
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

<link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" />    
    
    <!-- jQuery lightBox plugin -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
    <!-- /jQuery lightBox plugin -->
    
    <!-- jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#map a').lightBox();
    });

        function alertmsg(){
            alert("Your Feed Back has sent! We'll message you shortly."); 
        }
    </script>
    
</head>
<body>

<div id="tooplate_outer_wrapper">
	<div id="tooplate_wrapper">
    
    	<div id="tooplate_header">
        
            <div id="site_title"><h1><a href="#">Hexa Bokeh Template</a></h1></div>
			
            <div id="tooplate_menu" class="ddsmoothmenu">
                <ul>
                    <li><a href="index.php"><span></span>Home</a></li>
                    <li><a href="about.php"><span></span>About Us</a></li>
                    <li><a href="portfolio.php"><span></span>Portfolio</a></li>
                    <li><a href="contact.php" class="selected"><span></span>Contact Us</a></li>
                </ul>
                <br style="clear: left" />
            </div> <!-- end of tooplate_menu -->
			
            <div class="cleaner"></div>
        </div> <!-- end of forever header -->
        
      
        
        <div id="tooplate_main">
        	
            <div class="col_w420 float_r">
                <div id="contact_form">
            
                    <h4>Send a message</h4>
                    
                    <form name="contact" action="includes/testimonial.php" method = "POST">
						<label for="author">Name:</label> <input type="text" maxlength="40" id="author" class="input_field" name="author" />
						<div class="cleaner h10"></div>
		
						<label for="email">Email:</label> <input type="text" maxlength="40" id="email" class="input_field" name="email" />
						<div class="cleaner h10"></div>
								
						<label for="subject">Subject:</label> <input type="text" maxlength="40" id="subject" class="input_field" name="subject" />
						<div class="cleaner h10"></div>
	
						<label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
						<div class="cleaner h10"></div>
	
						<input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" OnClick = alertmsg() />
						<input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />
                        
            		</form>
                
                </div> 
            </div>
                
            <div class="col_w420 float_r">
                <h4>Our Location</h4>
                <div id="map">
                    <a href="images/DAYHAGAN.png" title="Location">
                        <img width="300" height="200" src="images/DAYHAGAN.png" alt="Location Map" class="image_wrapper" />
                    </a>
              </div>                
                <div class="cleaner h30"></div>
                
                <h4>Our Address</h4>
                <h6><strong>Event Equipment Rental Reservation</strong></h6>
                Blk 10 Lot 19 St Therese Village, <br />
                Barangay Dayhagan, Carles , Iloilo <br />
                Region VI - Philippines<br /><br />
				
				Globe: 0966-248-1861<br />
				TM: 0997-865-8119<br />
            </div>
            
            <div class="cleaner"></div>
        </div><div id="tooplate_main_bottom"></div>
    
    	<div id="tooplate_footer">
            
			Copyright © 2020 <a href="#">Event Equipment Rental Reservation</a>
            
        </div>
    
    </div> <!-- end of tooplate_wrapper -->
</div> <!-- end of tooplate_outer_wrapper -->

</body>
</html>