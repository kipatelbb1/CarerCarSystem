<?php 

	session_start(); 
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