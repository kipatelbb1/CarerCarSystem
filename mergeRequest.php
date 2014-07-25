<?php  
	if(!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 


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
		//Insert Request. 
		$Date = $_COOKIE['date_request']; 
		$PTime = $_COOKIE['pick_up']; 
		$PLoc = $_COOKIE['loc']; 
		$Duration = $_COOKIE['duration']; 
		$Drop =  $_COOKIE['DLocation']; 
		$Veh = $_COOKIE['veh_type']; 

		if($_COOKIE['add'])
		{
			$add_Comments = $_COOKIE['add'];
		}
		else
		{
			$add_Comments = ""; 
		}
	 
		
		$CCenter = "313000"; 
		$GLCode = "650003"; 

		

		$query = "INSERT INTO request(date_request, PTime, PLoc, Duration, DLocation , Veh_Type, Cost_Center, GL_Code, add_Comments) VALUES ('$Date', '$PTime', '$PLoc' , '$Duration' , '$Drop', '$Veh', '$CCenter', '$GLCode' , '$add_Comments')"; 
		//echo $Date; 
		//$query = "INSERT INTO request(date_request) VALUES ('$Date')"; 
		
		mysqli_query($con,$query)or die(mysqli_error($con)); 
		


		//REQUEST LINE STORE

		$getLatestRequest = "SELECT * FROM request ORDER BY requestID DESC";

		$set = mysqli_query($con, $getLatestRequest); 

		$firstRow = mysqli_fetch_array($set);

		$requestID = $firstRow['requestID']; 

		$InsertRequestLine = "INSERT INTO requestline(requestID, testerID) VALUES('$requestID', '$testerID')";
		mysqli_query($con, $InsertRequestLine) or die('Could not complete requested2'); 

		echo '<div class="alert alert-success" role="alert">';
	  	echo '<a href="#" class="alert-link">Success - Request Submitted!</a>';
		echo '</div>';
		include 'home.php';

		//header('Location: requestRecieved.php');


	}

	


?>