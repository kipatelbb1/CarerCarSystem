<?php

	ini_set("display_errors", 1);
	ini_set("track_errors", 1);
	ini_set("html_errors", 1);
	error_reporting(E_ALL);

	$to = "kipatel@blackberry.com";
	$subject = "Hi!";
	$body="test".PHP_EOL;
	$body.="Hello World. If all went well then you can see this mail in your Inbox".PHP_EOL;
	$body.="Regards".PHP_EOL;
	$body.="Idrish Laxmidhar".PHP_EOL;
	$body.="http://i-tech-life.blogspot.com".PHP_EOL;

	$headers = "From: root@localhost.com"; 

	if (mail($to, $subject, $body, $headers)) {
	echo("Message successfully sent!
	");
	} else {
	echo("Message delivery failed...
	");
	}


?>