<?php 

	session_start(); 

	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	//ADD REQUEST LINE TO REQUEST 
	include 'connection.php';

	$testerID = $_SESSION['id']; 

	$submit_option = $_POST['submit_val']; 
	$requestID = $_POST['requestID']; 


	if($submit_option=="Yes")
	{
		$query = "INSERT INTO requestline (requestID, testerID)  VALUES ('$requestID','$testerID')"; 
		mysqli_query($con, $query);

		echo '<div class="alert alert-success" role="alert">';
  		echo '<a href="#" class="alert-link">Success - Request Merged Successfully!</a>';
		echo '</div>';
		include 'home.php';  
	}
	else
	{
		echo "NO";
		//Insert Request. 
	}

	


?>