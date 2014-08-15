<?php  
	//If the session is not set then start a session. 
	if(!isset($_SESSION)) 
	{ 
	    session_start(); 
	} 


	//ADD REQUEST LINE TO REQUEST 

	//Create a connection to the database. 
	include 'connection.php';

	//Store the id of the current logged in tester. 
	$testerID = $_SESSION['id']; 

	//Store the submitted value to check if they said yes or no to merger. 
	$submit_option = $_POST['submit_val']; 
	//Store the request ID in a variable to know what to merge. 
	$requestID = $_POST['requestID']; 

	//If they said yes. 
	if($submit_option=="Yes")
	{
		//Create a query to insert a requestLine instance, to store this tester is related to this requestID. 
		$query = "INSERT INTO requestline (requestID, testerID)  VALUES ('$requestID','$testerID')"; 
		//Execute Query. 
		mysqli_query($con, $query);

		//On successful insertion, show a success message and show the home screen. 
		echo '<div class="alert alert-success" role="alert">';
  		echo '<a href="#" class="alert-link">Success - Request Merged Successfully!</a>';
		echo '</div>';
		include 'home.php';  
	}
	else // If they say no to merging we need to create a NEW request. 
	{
		//Insert Request. 

		//Get all cookie values that were set in determine similiar in the case that the did no want to merge. 
		$Date = $_COOKIE['date_request']; 
		$PTime = $_COOKIE['pick_up']; 
		$PLoc = $_COOKIE['loc']; 
		$Duration = $_COOKIE['duration']; 
		$Drop =  $_COOKIE['DLocation']; 
		$Veh = $_COOKIE['veh_type']; 
		$numOfTest = $_COOKIE['num_of_testers']; 

		//They may or may not specify additional comments. 
		if(isset($_COOKIE['add']))
		{
			//If the cookie is set then store in local variable. 
			$add_Comments = $_COOKIE['add'];
		}
		else
		{
			//Else set it to nothing to avoid errors. 
			$add_Comments = ""; 
		}
	 
		//Set the Cost Center and GLCode (Admin). 
		//POTENTIONAL FOR DYNAMIC HERE. 
		include 'payment_credentials.php'; 

		
		//Create a query to insert a whole new request. 
		$query = "INSERT INTO request(date_request, PTime, PLoc, Duration, DLocation , Veh_Type, Cost_Center, GL_Code, add_Comments, status, numTesters) VALUES ('$Date', '$PTime', '$PLoc' , '$Duration' , '$Drop', '$Veh', '$CCenter', '$GLCode' , '$add_Comments', 'NOT_SENT', '$numOfTest')"; 
		//Execute Query. 		
		mysqli_query($con,$query)or die(mysqli_error($con)); 
		


		//REQUEST LINE STORE

		//Get the latest request ID which was created above (Genreated by MYSQL)
		$getLatestRequest = "SELECT * FROM request ORDER BY requestID DESC";

		//Execurte the query and retrieve all recrods in descending order. 
		$set = mysqli_query($con, $getLatestRequest); 

		//Get the first row of the result set. 
		$firstRow = mysqli_fetch_array($set);

		//Get the ID of the results set to create a new request ID>
		$requestID = $firstRow['requestID']; 

		//Create query to insert a new requestLine. 
		$InsertRequestLine = "INSERT INTO requestline(requestID, testerID) VALUES('$requestID', '$testerID')";
		//Execute the query. 
		mysqli_query($con, $InsertRequestLine) or die('Could not complete requested2'); 
		//On successful submission of the request - show a banner and home.php
		echo '<div class="alert alert-success" role="alert">';
	  	echo '<a href="#" class="alert-link">Success - Request Submitted!</a>';
		echo '</div>';
		include 'home.php';
	}
?>