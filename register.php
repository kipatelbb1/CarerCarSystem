<?php 

	if(!isset($_POST['username']))
	{
		header('Location: index.php'); 
	}

	include 'connection.php';

	ini_set("display_errors", 1);
	ini_set("track_errors", 1);
	ini_set("html_errors", 1);
	error_reporting(E_ALL);

	$fName = $_POST['fName']; 
	$lName = $_POST['lName']; 
	$num = $_POST['num']; 
	$PLoc = $_POST['PLoc']; 
	$DLoc = $_POST['DLoc']; 
	$email = $_POST['email']; 

	//$username = $_POST['username'];
	# Retrieve password and salt and encrypt. 
	$password = $_POST['password1']; 
	$password = md5($password . "BLACKBERRY"); 

	$insert = "INSERT INTO tester(fName, lName, MobileNo, PLocation, DLocation, email, password) VALUES('$fName', '$lName', '$num', '$PLoc', '$DLoc', '$email', '$password')"; 
	mysqli_query($con, $insert) or die(mysqli_error($con)); 

	setcookie("email", $email, time() + (10 * 365 * 24 * 60 * 60)); 

	echo '<div class="alert alert-success" role="alert">';
   	echo '<a href="#" class="alert-link">You have been Registered! </a>';
	echo '</div>';
	include 'index.php';
?>