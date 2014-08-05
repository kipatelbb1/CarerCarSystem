<?php

	//If the file has been posted too then try login operation. 
	if(isset($_POST['name']))
	{
		//Connect to the database. 
		include 'connection.php';

		//Store the name and password in variables. 
		$username = $_POST['name']; 
		$password = $_POST['password']; 


		//Enrypt the password + SALT. 
		$password = md5($password . "BLACKBERRY"); 
		//Determine if the username AND password are in the database. 
		$query = "SELECT * FROM tester WHERE username='$username' AND Password='$password' ";

		//Execute the query. 
		$set = mysqli_query($con, $query); 

		//Cycle through the records(Should be 1). 
		while($row = mysqli_fetch_array($set))
		{ 
			//If the username and password match then create a session. 
			if($row['username'] == $username && $row['Password'] == $password)
			{
				//If there is no session then start one. 
				if(!isset($_SESSION)) 
				{ 
					 session_start(); 
				} 

				//Set cookie reg to expire long into the future. 
				setcookie("reg", 1, time() + (10 * 365 * 24 * 60 * 60)); 

				//STORE Session variables - Accessed throughout the system. 
				$_SESSION['id'] = $row['testerID']; 
				$_SESSION['name'] = $row['username']; 

				$_SESSION['fName'] = $row['fName']; 
				$_SESSION['lName'] = $row['lName']; 

				$_SESSION['num'] = $row['MobileNo']; 
				$_SESSION['plocation'] = $row['PLocation'];
				$_SESSION['DLocation'] = $row['DLocation']; 

				//Redirect to home.php
				header('Location: home.php');
				//Stop any processing? 
				exit(); 
			}
			
		}

		//If the code gets to this point then the username or password was wrong. 
		//Bootstrap error is displayed and they are shown to log in again. 
		echo '<div class="alert alert-danger" role="alert">';
  		echo '<a href="#" class="alert-link">Error - Check your Username and Password. </a>';
		echo '</div>';
		include 'index.php'; 
	}
	else
	{
		//If the page was NOT posted too and the page was accessed directly from browser then redirect to log in. 
		header('Location: index.php'); 
	}
?>