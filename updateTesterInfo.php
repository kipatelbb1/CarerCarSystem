<?php
	session_start();

	if(!(isset($_SESSION['id']))) 
	{
		echo "Error - Log in"; 
		header("Location: index.php"); /* Redirect browser */
		exit();
	}

	include 'connection.php'; 
	

	$testerid = $_POST['id']; 
	
	$num = $_POST['num']; 
	$PLoc = $_POST['PLoc'];
	$DLocation = $_POST['DLocation']; 
	//$email = $_POST['email']; 


	$query = "UPDATE tester SET MobileNo = '$num', PLocation = '$PLoc' , DLocation= '$DLocation' WHERE testerID = '$testerid'"; 

	mysqli_query($con, $query) or die(mysqli_error($con)); 

	echo '<div class="alert alert-success" role="alert">';
  	echo '<a href="#" class="alert-link">Success - Settings Changed Successfully!</a>';
	echo '</div>';
	include 'settings.php';  
	//header('Location: updatedProfile.php'); 
	
?>