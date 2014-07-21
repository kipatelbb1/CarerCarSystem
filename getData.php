<?php 

	include 'connection.php'; 

	$query = "SELECT * FROM tester"; 

	$set = mysql_query($query);

	while($row = mysql_fetch_array($set))
	{
		echo $row['fName']; 
	}

?>