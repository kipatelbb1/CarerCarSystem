<?php 
	session_start();

	if(!(isset($_POST['date_request'])))
	{
		header("Location: index.php"); /* Redirect browser */
		exit();
	}

	

	include 'connection.php'; 


	//REQUEST STORE 
	$Date = $_POST['date_request']; 
	
	$Date = str_replace("/","-",$Date);
	$Date = date('Y-m-d', strtotime($Date));
	
	$PTime = $_POST['pick_up']; 
	$PLoc = $_POST['loc']; 
	$Duration = $_POST['duration']; 
	$Drop = $_POST['DLocation']; 
	$Veh = $_POST['veh_type'];

	$tranTime = substr($PTime, 0,2); 

	//FIND EXACT MATCHES: 
	$query = "SELECT * FROM request WHERE date_request='$Date' AND PTime='00:" . $tranTime . ":00'"; 
	$set = mysqli_query($con, $query); 
	$num_rows = mysqli_num_rows($set); 

	$row = mysqli_fetch_array($set); 
	$requestID = $row['requestID']; 

	if($num_rows>=1)
	{
		//ASK IF THEY WANT TO MERGE THE REQUESTS. 
		echo "<div class='row col-xs-12'>";
		echo "<h2>Someone else has requested the same time as you, would you like to merge your request with thiers?</h2><br/>"; 
		echo "<form method='POST' action='mergeRequest.php'>";
			echo "<input type='submit' name='submit_val' value='Yes'>";
			echo "<input type='submit' name='submit_val' value='No'>";
			echo "<input type='hidden' name='requestID' value=" . $requestID . ">"; 
		echo "</form>";
		echo "</div>";

	}
	else
	{
		//FIND HOUR BACK 
		$toBack = $tranTime;
		$toBack--; 

		$query = "SELECT * FROM request WHERE date_request='$Date' AND PTime='00:" . $toBack . ":00'"; 
		$set = mysqli_query($con, $query); 
		$num_rows = mysqli_num_rows($set); 

		if($num_rows>=1)
		{
			//ASK IF THEY WANT TO MERGE THE REQUESTS. 
			echo "<h2>Another tester has a time slot booked an hour before your requested slot, Would you like to merge?</h2><br/>"; 
			echo "<form method='POST' action='mergeRequest.php'>";
				echo "<input type='submit' name='submit_val' value='Yes'>";
				echo "<input type='submit' name='submit_val' value='No'>";
				echo "<input type='hidden' name='requestID' value=" . $requestID . ">"; 
			echo "</form>";
		}
		else
		{

			//FIND HOUR FORWARD
			$toForward = $tranTime; 
			$toForward++; 

			$query = "SELECT * FROM request WHERE date_request='$Date' AND PTime='00:" . $toForward . ":00'"; 
			$set = mysqli_query($con, $query); 
			$num_rows = mysqli_num_rows($set); 

			if($num_rows>=1)
			{
				echo "<h2>Another tester has a time slot booked an hour after your requested slot, Would you like to merge?</h2><br/>"; 
				echo "<form method='POST' action='mergeRequest.php'>";
					echo "<input type='submit' name='submit_val' value='Yes'>";
					echo "<input type='submit' name='submit_val' value='No'>";
					echo "<input type='hidden' name='requestID' value=" . $requestID . ">"; 
				echo "</form>";
				//ASK IF THEY WANT TO MERGE THE REQUESTS. 
			}
			else
			{
				//REDIRECT TO INSERT REQUEST AS NO MATCH WAS EVER FOUND. 
				include 'insertRequest.php'; 
			}
		}



	}

	
	
	


	








?>