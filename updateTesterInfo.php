<?php
	//If the session has not been set then start a session. 
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //If no login has been done then redirect to get user to log in. 
	if(!(isset($_SESSION['id']))) 
	{
		echo "Error - Log in"; 
		header("Location: index.php"); /* Redirect browser */
		exit();
	}

	//Create a connection to the database. 
	include 'connection.php'; 
	
	//Get the ID of the tester, Hidden variable in settings.php and generated from session ID. 
	$testerid = $_POST['id']; 

	//Store Posted variables. 
	$num = $_POST['num']; 
	$PLoc = $_POST['PLoc'];
	$DLocation = $_POST['DLocation']; 
	//$email = $_POST['email']; 

	//Create query to update the database with posted details. 
	$query = "UPDATE tester SET MobileNo = '$num', PLocation = '$PLoc' , DLocation= '$DLocation' WHERE testerID = '$testerid'"; 

	//Execute Query. 
	mysqli_query($con, $query) or die(mysqli_error($con)); 

	//Show Successful message. 
	echo '<div class="alert alert-success" role="alert">';
  	echo '<a href="#" class="alert-link">Success - Settings Changed Successfully!</a>';
	echo '</div>';
	//Re load settings.php. 
	include 'settings.php';  
?>