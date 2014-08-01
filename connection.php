<?php

	$host = "localhost"; 
	$username="root"; 
	$password=""; 
	$database="carey_car"; 

	$con = mysqli_connect($host, $username, $password, $database) or die("Could Not Connect"); 
	//mysql_select_db($database) or die("Could not find DB");
	
?>