<?php

	if(isset($_POST['name']))
	{
		include 'connection.php';
		$query = "SELECT * FROM tester";

		$username = $_POST['name']; 
		$password = $_POST['password']; 

		//Enrypt the password. 
		$password = md5($password . "BLACKBERRY"); 

		$set = mysqli_query($con, $query); 

		while($row = mysqli_fetch_array($set))
		{ 
			if($row['username'] == $username && $row['Password'] == $password)
			{
				session_start(); 
				echo "Passed"; 

				$_SESSION['id'] = $row['testerID']; 
				$_SESSION['name'] = $row['username']; 

				$_SESSION['fName'] = $row['fName']; 
				$_SESSION['lName'] = $row['lName']; 

				$_SESSION['num'] = $row['MobileNo']; 
				$_SESSION['plocation'] = $row['PLocation'];
				$_SESSION['DLocation'] = $row['DLocation']; 

				
				header('Location: home.php');
			}
			else
			{
				echo '<div class="alert alert-danger" role="alert">';
  				echo '<a href="#" class="alert-link">Error - Check your Username and Password. </a>';
				echo '</div>';
				include 'index.php'; 
			}
		}


	}
	else
	{
		header('Location: index.php'); 
	}


?>