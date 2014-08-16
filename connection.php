<?php

	// //Connection Details. 
	$host = "localhost"; 
	$username="root"; 
<<<<<<< HEAD
	$password="test"; 
=======
	$password=""; 
>>>>>>> e922fef17998037b84f50bf3fd2394f1a6a34e5f
	$database="carey_car"; 


	//Make connection and set up for being included in other files. 
	$con = mysqli_connect($host, $username, $password) or die("Could Not Connect"); 
<<<<<<< HEAD
	mysql_select_db($database) or die("Could not find DB");
=======
	mysqli_select_db($con, $database) or die("Could not find DB");
>>>>>>> e922fef17998037b84f50bf3fd2394f1a6a34e5f
	
?>