<?php 
    $db_ServerName = "localhost";
    $db_UserName = "root";
    $db_Pass = "";
    $db_Name = "eerrs";

    $conn = mysqli_connect($db_ServerName, $db_UserName, $db_Pass, $db_Name);

    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

?>