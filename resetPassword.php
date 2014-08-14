<?php


	if(isset($_POST['email']))
	{
		include 'connection.php'; 
		$email = $_POST['email']; 
		$pass1 = $_POST['password1']; 
		$pass1 = md5($pass1 . "BLACKBERRY"); 
		//$pass2 = $_POST['password2']; 

		$query = "UPDATE tester SET Password='$pass1' WHERE email='$email'";
		mysqli_query($con, $query) or die("Check DB connection"); 
		//header('Location: index.php');
		echo "Password Changed"; 
	}
	else
	{

		echo "<form method='POST' action='resetPassword.php'>";
			echo "Email: <input type='text' name='email'/>";
			echo "Password  <input type='password' name='password1'/>";
			echo "<input type='submit'>";
		echo "</form>";

	}




?>