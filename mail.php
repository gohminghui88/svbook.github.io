<?php

if( isset($_POST['name'])) {
	
	$to = "gohminghui88@gmail.com";
	$from = $_POST["email"];
	$name = $_POST["name"];
	
	
	$subject = "Form Submission";
	$subject2 = "copy of your form submission";
	
	$message = $name . " wrote the following: " . "\n\n" . $_POST["comments"];
	$message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST["comments"];
	
	
	$headers = "From: " . $from;
	$headers2 = "From: " . $to;
	
	mail($to, $subject, $message, $headers);
	mail($from, $subject2, $message2, $headers2);
	
	echo "Mail Sent. Thank You. " . $name . ", we will contact you shortly. " ;
	

}	

?>