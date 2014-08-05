<?php

	//When the file is imported, the data is immediately loaded. 
	$data = getData(); 
	//The result of the getData function will give : 
	//An array of the datetimecodes
	$Dates=$data[0];
	//The Locations of each data. 
	$Locations=$data[1]; 
	//The Names of the tester in the request. 
	$Names = $data[2]; 
	
	
	//This function will get the request that are to be done for the current week. 
	function getData()
	{
		//Create a connection to the db. 
		include 'connection.php'; 

		//Create a query to get details of each request and the correspondong tester. 
		$query = "SELECT t.fName, t.lName, r.PLoc, r.Duration, r.Veh_Type, r.date_request, r.PTime
					FROM request r, tester t, requestline rl
					WHERE t.testerID = rl.testerID 
					AND r.requestID = rl.requestID; 
					";

		//Execute the query. 
		$set = mysqli_query($con, $query); 

		//Initilise empty arrays. 
		$array = []; 
		$PLocale = []; 
		$Names = []; 

		//Initialise counters for each details. 
		$counter = 0; 
		$LocaleCounter = 0; 
		$namesCounter = 0; 

		//For each request. 
		while($row = mysqli_fetch_array($set))
		{
			//Get the requested date and store in a variable. 
			$dateToCheck = $row['date_request']; 
			//Get the requested time and store in a variable. 
			$time = $row['PTime'];
			//Convert the date of the request into a a time variable. 
			$dateToCheck = strtotime($dateToCheck); 

			//If the date requested is within this week then process. 
			if($dateToCheck >= strtotime('monday this week') and $dateToCheck <= strtotime('sunday this week'))
			{
				//Get the day of the week of the date requested. 
				$dateToCheck = getDay($dateToCheck); 
				//Get only the last 5 characters. Trancated string. 
				$time = substr($time, -5); 
				//Remove the colon from the string. 
				$time = substr($time,0,2) . substr($time,3,5);

							
				
				//Set the date time code to the concat of the date and time (Referenced later in the HTML of home.php)
				$datetimecode = $dateToCheck . $time; 
				//For the current index, save the datetimecode. 
				$array[$counter] = $datetimecode; 
				//Increment the index. 
				$counter++; 

				//For the current index save the Pick Up location. 
				$PLocale[$LocaleCounter] = $row['PLoc']; 
				//Increment the index. 
				$LocaleCounter++; 

				//For the current index, save the name of the tester. 
				$Names[$namesCounter] = $row['fName'] . " " . $row['lName']; 
				//Increment the index. 
				$namesCounter++; 
			}
		}
		//Return an array of the arrays generated in this method. 
		return [$array, $PLocale, $Names]; 
	}

	//Funciton returns the day of the week of the passed parameter date. 
	function getDay($timestamp)
	{
		//Store the day of the week of the timestamp. 
		$day = date('D', $timestamp); 
		//Return the string.  
		return $day; 
	}

	//Function is called directly by the HTML form in home.php
	function compareData($dateToCheck, $Dates, $Locations,$Names)
	{
		//For each date
		for($i=0;$i<sizeof($Dates);$i++)
		{
			//If the datestamp to check matches a date from the db. 
			if($dateToCheck == $Dates[$i])
			{
				//Print the name of the tester associated with request
				echo $Names[$i] . "<br/>"; 
				//Print the location of the tester associated with request. 
				echo $Locations[$i] . "<br/>"; 
				//Printed straight into HTML. 

				if($i+1 != sizeof($Dates))
				{
					echo "<br/>"; 
				}
			}
		}

	}

?>