<?php
	session_start();

	if(!(isset($_SESSION['id']))
	{
		header("Location: index.php"); /* Redirect browser */
		exit();
	}

	include 'connection.php'; 
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	$id = $_POST['id']; 
	
	$num = $_POST['num']; 
	$PLoc = $_POST['PLoc'];
	$DLocation = $_POST['DLocation']; 
	//$email = $_POST['email']; 

	echo $num; 
	echo $PLoc;
	echo $DLocation;  

	$query = "UPDATE tester SET MobileNo='" . $num . "', PLocation='" . $PLoc . "', DLocation='" . $DLocation. "' WHERE testerID = '" . $id . "'"; 

	mysqli_query($con, $query) or die('Failed to update'); 

	header('Location: updatedProfile.php'); 
	
?>