<?php 
	include 'connection.php'; 

	$query = "SELECT * 
				FROM request r, requestline rl, tester t
				WHERE r.requestID = rl.requestID 
				AND t.testerID = rl.testerID
				ORDER BY r.date_request ASC; "; 
			
	$set = mysqli_query($con, $query); 

	while($row = mysqli_fetch_array($set))
	{
		$dateToCheck = strtotime($row['date_request']); 
		if($dateToCheck >= strtotime('monday this week') and $dateToCheck <= strtotime('sunday this week'))
		{
			echo "Name: " . $row['fName'] . " " . $row['lName'] . "<br/>"; 
			echo "Time: " . $row['PTime'] . "<br/>"; 
			echo "Date: " . $row['date_request'] . "<br/>"; 
			echo "<br/>"; 
		}
	}


?>