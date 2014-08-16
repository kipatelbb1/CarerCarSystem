<?php 
	//If the file has NOT been posted too then go to index and get user to log in.
	if(!(isset($_POST['date_request'])))
	{
		header("Location: index.php"); /* Redirect browser */
		exit();
	}

	//Import the css files for styling. 
	echo '<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css" />';
	echo '<link rel="stylesheet" type="text/css" href="style/customStyle.css" />';

	//Connect to the database. 
	include 'connection.php'; 

	//Get the date from the post form. 
	$Date = $_POST['date_request']; 
	
	//Get the date into MYSQL format. 
	$Date = str_replace("/","-",$Date);
	//Get the date into MYSQL format. 
	$Date = date('Y-m-d', strtotime($Date));
	
	//Get ALL posted data from the home form and insert into variables. 
	$PTime = $_POST['pick_up']; 
	$PLoc = $_POST['loc']; 
	$Duration = $_POST['duration']; 
	$Drop = $_POST['DLocation']; 
	$Veh = $_POST['veh_type']; 
	$add = $_POST['add'];
	$numOfTest = $_POST['num_of_testers']; 

	//Set Cookies to flag that these variables exist, this is used in the case a new request has to be made. 
	setcookie("date_request", $Date);
	setcookie("pick_up", $PTime); 
	setcookie("loc", $PLoc); 
	setcookie("duration", $Duration); 
	setcookie("DLocation", $Drop); 
	setcookie("veh_type", $Veh); 
	setcookie("num_of_testers", $numOfTest); 
	setcookie("add", $add);
	//Get the time from the posted time. 
	$tranTime = substr($PTime, 0,2); 


	//IF TIME HAS A 30 THEN DO ANOTHER QUERY 
	if(substr($PTime, 2, strlen($PTime)) == "30")
	{
		//Get a request that has the exact same date and time as the posted. (30 MIN VERSION)
		$query = "SELECT * FROM request WHERE date_request='$Date' AND PTime='00:" . $tranTime . ":30'"; 
	}
	else
	{
		//Get a request that has the exact same date and time as the posted. 
		$query = "SELECT * FROM request WHERE date_request='$Date' AND PTime='00:" . $tranTime . ":00'"; 
	}



	//FIND EXACT MATCHES: 

	//Get a request that has the exact same date and time as the posted. 
	$query = "SELECT * FROM request WHERE date_request='$Date' AND PTime='00:" . $tranTime . ":00'"; 
	//Execute Query. 
	$set = mysqli_query($con, $query); 
	//Get the number of rows reterned from the query. 
	$num_rows = mysqli_num_rows($set); 
	//Store the request ID as the retrieved request ID (If applicable)
	$requestID = mysqli_fetch_array($set)['requestID'];



	//If a request with the same date and time exists. 
	if($num_rows>=1)
	{
		//ASK IF THEY WANT TO MERGE THE REQUESTS. 
		echo "<div class='row";
					echo "<div class='col-xs-12'>";
						echo "<h2>Another tester has a time slot booked at the same time as your requested slot, Would you like to merge?</h2><br/>"; 
					echo "</div>";
				echo "</div>";

				echo "<div class='row";
					echo "<div class='col-xs-12'>";
						//POST to the mergeRequest Form to either merge or not. 
						echo "<form method='POST' action='mergeRequest.php'>";
							echo "<input type='submit' name='submit_val' class='merge-button' value='Yes'>";
							echo "<input type='submit' name='submit_val' class='merge-button' value='No'>";
							echo "<input type='hidden' name='requestID'  value=" . $requestID . ">"; 
						echo "</form>";
					echo "</div>";
				echo "</div>";

	}
	else
	{
		//FIND HOUR BACK 
		//Make a copy of the variable
		$toBack = $tranTime;
		//Decrement it by 1. 
		$toBack--; 

		//Query to see if a booking one hour back exists. 
		$query = "SELECT * FROM request WHERE date_request='$Date' AND PTime='00:" . $toBack . ":00'"; 
		//Execute Query. 
		$set = mysqli_query($con, $query); 
		//Get the number of rows that match the query. 
		$num_rows = mysqli_num_rows($set); 
		//Get the request ID of the returned set. 
		$requestID = mysqli_fetch_array($set)['requestID'];

		//If a row matching the date and hour back time exists then ask for a merger or not. 
		if($num_rows>=1)
		{
			//ASK IF THEY WANT TO MERGE THE REQUESTS. 
			echo "<div class='row";
					echo "<div class='col-xs-12'>";
						echo "<h2>Another tester has a time slot booked an hour before your requested slot, Would you like to merge?</h2><br/>"; 
					echo "</div>";
				echo "</div>";

				echo "<div class='row";
					echo "<div class='col-xs-12'>";
						echo "<form method='POST' action='mergeRequest.php'>";
							//POST to the mergeRequest Form to either merge or not.
							echo "<input type='submit' name='submit_val' class='merge-button' value='Yes'>";
							echo "<input type='submit' name='submit_val' class='merge-button' value='No'>";
							echo "<input type='hidden' name='requestID' value=" . $requestID . ">"; 
						echo "</form>";
					echo "</div>";
				echo "</div>";

		}
		else
		{

			//Get the current hour. 
			$toForward = $tranTime; 
			//Forward hour by one. 
			$toForward++; 

			//Create query to determine if there is a date and time request with one hour forward. 
			$query = "SELECT * FROM request WHERE date_request='$Date' AND PTime='00:" . $toForward . ":00'"; 
			//Execute Query. 
			$set = mysqli_query($con, $query); 
			//Find if such a record exits. 
			$num_rows = mysqli_num_rows($set); 

			//Get the request ID of the retrieved request. 
			$requestID = mysqli_fetch_array($set)['requestID'];

			//If the record exists. 
			if($num_rows>=1)
			{
				echo "<div class='row";
					echo "<div class='col-xs-12'>";
						echo "<h2>Another tester has a time slot booked an hour after your requested slot, Would you like to merge?</h2><br/>"; 
					echo "</div>";
				echo "</div>";

				echo "<div class='row";
					echo "<div class='col-xs-12'>";
						echo "<form method='POST' action='mergeRequest.php'>";
							//POST to the mergeRequest Form to either merge or not.
							echo "<input type='submit' name='submit_val' class='merge-button' value='Yes'>";
							echo "<input type='submit' name='submit_val' class='merge-button' value='No'>";
							echo "<input type='hidden' name='requestID' value=" . $requestID . ">"; 
						echo "</form>";
					echo "</div>";
				echo "</div>";

						
					
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