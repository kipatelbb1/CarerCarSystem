<?php

	require_once('class.phpmailer.php');

	ini_set("display_errors", 1);
	ini_set("track_errors", 1);
	ini_set("html_errors", 1);
	error_reporting(E_ALL);

	$mail = new PHPMailer(true);

	//Send mail using gmail
	
	    // $mail->IsSMTP(); // telling the class to use SMTP
	    // $mail->SMTPAuth = true; // enable SMTP authentication
	    // $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
	    // $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
	    // $mail->Port = 446; // set the SMTP port for the GMAIL server
	    // $mail->Username = "careycarbb@gmail.com"; // GMAIL username
	    // $mail->Password = "ftstesting"; // GMAIL password

	    $mail->SMTPSecure = "ssl";  
$mail->Host='smtp.gmail.com';  
$mail->Port=465   
$mail->Username   = 'careycarbb@gmail.com'; // SMTP account username  
$mail->Password   = 'ftstesting';  
$mail->SMTPKeepAlive = true;  
$mail->Mailer = "smtp"; 
$mail->IsSMTP(); // telling the class to use SMTP  
$mail->SMTPAuth   = true;                  // enable SMTP authentication  
$mail->CharSet = 'utf-8';  
$mail->SMTPDebug  = 0;   


	

	//Typical mail data
	$mail->AddAddress("kipatel@blackberry.com", "Kiran");
	$mail->SetFrom("root@localhost", "localhost");
	$mail->Subject = "My Subject";
	$mail->Body = "Mail contents";

	try{
	    $mail->Send();
	    echo "Success!";
	} catch(Exception $e){
	    //Something went bad
	    echo "Fail :(";
	   	echo $e; 
	}


?>