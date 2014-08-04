<?php
	

	//If nobody is logged in then show the login screen. 
	if(!(isset($_SESSION['id']))
	{
		header("Location: index.php"); /* Redirect browser */
		//Exit all processing. 
		exit();
	}
	
	

	//Is the passed day in the database. 
	function isDay($passedDay)
	{
		//Connect to the database. 
		include 'connection.php'; 
		//Create query to get all requests. 
		$query = "SELECT * FROM request";
		//Execute query. 
		$set = mysqli_query($con, $query); 

		//Loop all records. 
		while($row = mysqli_fetch_array($set))
		{
			// Get Time 
			$time = $row['PTime']; 
			
			//Call removeColon function to remove formatting. 
			$time = removeColon($time); 
			//Get only the time. 
			$time =  strtolower(substr($time, -5 )); 

			//Get the string Day from the date and concat for system format. 
			$toTest = getDay($row['date_request']) . $time; 

			//If the date passed date/time is in the database
			if(strtotime($passedDay) == strtotime($row['date_request']))
			{
				//Return the day of the date of the requests concatted with the time of the request. 
				return getDay($row['date_request']) . $time; 
			}
		}
	}

	//Remove the formatting of the time. 
	function removeColon($time)
	{
		//Loop through each index and remove the colon from the string. 
		for($i=0; $i<strlen($time);$i++)
		{
			if($time[$i]==':')
			{
				$time[$i] = ''; 
			}
		}
		//Return the time. 
		return $time; 
	}


	//Get the string day from the date. 
	function getDay($timestamp)
	{
		//Get the day. 
		$day = date('D', strtotime($timestamp));  
		//Retuyrn the day. 
		return $day; 
	}
?>