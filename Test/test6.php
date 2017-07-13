<?php
/*
require_once "Mail.php";

$from = "no-reply@teloslist.com";
$to = "triyantri@gmail.com";
$subject = "Hi!";
$body = "Hi,\n\nHow are you?";

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = "tmail@teloslist.com";
$password = "isthebest";

$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = @Mail::factory('smtp',
  array ('host' => $host,
	'port' => $port,
	'auth' => true,
	'username' => $username,
	'password' => $password));

for ($i = 0; $i <= 1000; $i++) {
	@$mail = $smtp->send($to, $headers, $body, "-no-reply@teloslist.com");	

	if (@PEAR::isError($mail)) {
	  echo("<p>" . $mail->getMessage() . "</p>");
	 } else {
	  echo("<p>Message successfully sent!</p>");
	 }
 }
 */
?>