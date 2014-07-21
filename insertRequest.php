<?php

	// if(!(isset($_POST['date_request'])))
	// {
	// 	header("Location: index.php"); /* Redirect browser */
	// 	exit();
	// }

	// session_start();

	//include 'connection.php'; 


	//REQUEST STORE s
	$Date = $_POST['date_request']; 
	
	$Date = str_replace("/","-",$Date);
	$Date = date('Y-m-d', strtotime($Date));
	
	$PTime = $_POST['pick_up']; 
	$PLoc = $_POST['loc']; 
	$Duration = $_POST['duration']; 
	$Drop = $_POST['DLocation']; 
	$Veh = $_POST['veh_type'];
	
	
	

	$CCenter = "313000"; 
	$GLCode = "650003"; 

	$add_Comments = $_POST['add']; 

	$query = "INSERT INTO request(date_request, PTime, PLoc, Duration, DLocation , Veh_Type, Cost_Center, GL_Code, add_Comments) VALUES ('$Date', '$PTime', '$PLoc' , '$Duration' , '$Drop', '$Veh', '$CCenter', '$GLCode' , '$add_Comments')"; 
	//echo $Date; 
	//$query = "INSERT INTO request(date_request) VALUES ('$Date')"; 
	
	mysqli_query($con,$query)or die(mysqli_error($con)); 
	


	//REQUEST LINE STORE
	$testerID = $_POST['testerID']; 

	$getLatestRequest = "SELECT * FROM request ORDER BY requestID DESC";

	$set = mysqli_query($con, $getLatestRequest); 

	$firstRow = mysqli_fetch_array($set);

	$requestID = $firstRow['requestID']; 

	$InsertRequestLine = "INSERT INTO requestline(requestID, testerID) VALUES('$requestID', '$testerID')";
	mysqli_query($con, $InsertRequestLine) or die('Could not complete requested2'); 

	header('Location: requestRecieved.php');



	//Query most recent request, and save the request ID 
	//GET session tester ID and save the record. 


?>

