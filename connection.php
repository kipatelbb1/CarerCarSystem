<?php

	//Connection Details. 
	$host = "localhost"; 
	$username="root"; 
	$password="test"; 
	$database="carey_car"; 

	//Make connection and set up for being included in other files. 
	$con = mysqli_connect($host, $username, $password) or die("Could Not Connect"); 
	mysql_select_db($database) or die("Could not find DB");
	
?>