<?php

$username = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$post_id = $_POST['post_id'];

include 'config.php';

$sql = "insert into comments(post_id,date,username,email,comment) values('$post_id',NOW(),'$username','$email','$comment')";
if(mysqli_query($con,$sql)){
	echo 1;
}
else{
	echo 0;
}
?>