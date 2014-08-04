<?php 


$to = "admin@localhost.com";
$subject = "Hi!";
$body="test".PHP_EOL;
$body.="Hello World.just want to test my localhost server".PHP_EOL;
$body.="Regards".PHP_EOL;
$body.="tutorit".PHP_EOL;
$body.="http://tutorit.wordpress.com&#8221;".PHP_EOL;
$headers = "From: root@localhost.com";

if (mail($to, $subject, $body, $headers))
 {
echo("Message successfully sent!");
} 
else {
echo("Message delivery failed…");
}
?>