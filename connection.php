<?php

	// //Connection Details. 
	// $host = "localhost"; 
	// $username="root"; 
	// $password=""; 
	// $database="carey_car"; 

	//Connection Details. (Kirans Projects)
	$host = "localhost"; 
	$username="root"; 
	$password=""; 
	$database="carey_car"; 

	//Make connection and set up for being included in other files. 
	 $con=mysqli_connect("cust-mysql-123-19","dummy","Kunal200") or die("Cannot connect to server");
	 mysqli_select_db($con, "dummy") or die("Cannot find DB"); 
	//$con = mysqli_connect($host, $username, $password) or die("Could Not Connect"); 
	//mysqli_select_db($con, $database) or die("Could not find DB");
	
?>