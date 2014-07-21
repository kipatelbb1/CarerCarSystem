<?php
	//$timestamp = strtotime('2014-07-14'); ]

	
	if(!(isset($_SESSION['id']))
	{
		header("Location: index.php"); /* Redirect browser */
		exit();
	}
	
	echo isDay('1970-01-01'); 
	


	function isDay($passedDay)
	{
		include 'connection.php'; 
		$query = "SELECT * FROM request";
		$set = mysqli_query($con, $query); 

		while($row = mysqli_fetch_array($set))
		{
			//echo $row['date_request'] . "<br/>"; 
			$time = $row['PTime']; 
			

			$time = removeColon($time); 

			$time =  strtolower(substr($time, -5 )); 

			//echo $passedDay; 
			//echo getDay($row['date_request']); 
			$toTest = getDay($row['date_request']) . $time; 

			if(strtotime($passedDay) == strtotime($row['date_request']))
			{
				return getDay($row['date_request']) . $time; 
			}

		
		}

	}

	function removeColon($time)
	{
		for($i=0; $i<strlen($time);$i++)
		{
			if($time[$i]==':')
			{
				$time[$i] = ''; 
			}
		}
		return $time; 
	}


	function getDay($timestamp)
	{
		//echo $timestamp; 
		$day = date('D', strtotime($timestamp));  
		//	var_dump($day)
		return $day; 
		//echo "<br/>"; 

	}



?>