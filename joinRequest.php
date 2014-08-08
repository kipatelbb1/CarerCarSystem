<?php
	include 'connection.php'; 
	echo '<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">'; 

	$testerID = $_POST['testerID']; 
	$requestID = $_POST['requestID']; 

	$query = "INSERT INTO requestLine(requestID, testerID) VALUES('$requestID', '$testerID')"; 

	mysqli_query($con, $query) or mysqli_error('error'); 

	echo '<div class="alert alert-success" role="alert">';
  	echo '<a href="#" class="alert-link">Success - You have been added to the request</a>';
	echo '</div>';

	include "request.php";


?>