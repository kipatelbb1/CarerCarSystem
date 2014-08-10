<?php

	// //Connection Details. 
	$host = "localhost"; 
	$username="root"; 
	$password=""; 
	$database="carey_car"; 

	

	//Make connection and set up for being included in other files. 
	$con = mysqli_connect($host, $username, $password) or die("Could Not Connect"); 
	mysqli_select_db($con, $database) or die("Could not find DB");
	
?>