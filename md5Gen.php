<?php 

	echo "<form method='POST' action='md5Gen.php'>";

		echo "<input type='password' name='pass' />";
		echo "<input type='submit' value='Encrypt' />";


	echo "</form>";


	if(isset($_POST['pass']))
	{
		$value = $_POST['pass']; 
		$salt = "BLACKBERRY"; 

		$hashedValue = md5($value . $salt); 

		echo $hashedValue; 

	}
	

?>