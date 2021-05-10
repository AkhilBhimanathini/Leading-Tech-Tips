<?php
include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$to = "contact.leadingtechtips@gmail.com";
if(mail($to,$subject,$message,$email)){
	echo 1;
}
else{
	echo 0;
}

?>