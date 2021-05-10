<?php
session_start();
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

include 'config.php';

$sql = "insert into register(username,email,password) values('".$username."','".$email."','".$password."')";
if(mysqli_query($con,$sql)){
	echo 1;
}
else{
	echo 0;
}
?>