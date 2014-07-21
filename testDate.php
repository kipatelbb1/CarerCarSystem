<?php

	$Dates=getData()[0];
	$Locations=getData()[1]; 
	$Names = getData()[2]; 
	
	
	
	function getData()
	{
		include 'connection.php'; 

		$query = "SELECT t.fName, t.lName, r.PLoc, r.Duration, r.Veh_Type, r.date_request, r.PTime
					FROM request r, tester t, requestline rl
					WHERE t.testerID = rl.testerID 
					AND r.requestID = rl.requestID; 
					";

		$set = mysqli_query($con, $query); 

		$array = []; 
		$PLocale = []; 
		$Names = []; 

		$counter = 0; 
		$LocaleCounter = 0; 
		$namesCounter = 0; 

		while($row = mysqli_fetch_array($set))
		{
			$dateToCheck = $row['date_request']; 
			$time = $row['PTime'];
			$dateToCheck = strtotime($dateToCheck); 

			if($dateToCheck >= strtotime('monday this week') and $dateToCheck <= strtotime('sunday this week'))
			{
				$dateToCheck = getDay($dateToCheck); 

				$time = substr($time, -5); 
				 
				$time = substr($time,0,2) . substr($time,3,5);
				
				
				$datetimecode = $dateToCheck . $time; 
				$array[$counter] = $datetimecode; 
				$counter++; 

				$PLocale[$LocaleCounter] = $row['PLoc']; 
				$LocaleCounter++; 

				$Names[$namesCounter] = $row['fName'] . " " . $row['lName']; 
				$namesCounter++; 

			}

		}

		return [$array, $PLocale, $Names]; 
	}


	function getDay($timestamp)
	{
		$day = date('D', $timestamp); 
		//	var_dump($day)
		return $day; 
		//echo "<br/>"; 

	}

	function compareData($dateToCheck, $Dates, $Locations,$Names)
	{
		for($i=0;$i<sizeof($Dates);$i++)
		{
			if($dateToCheck == $Dates[$i])
			{
				echo $Names[$i] . "<br/>"; 
				echo $Locations[$i]; 

			}
		}

	}

	


?>