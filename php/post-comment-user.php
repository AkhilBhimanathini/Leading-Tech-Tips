<?php

$username = $_POST['name'];


include 'config.php';

$sql = 'select * from register where username="'.$username.'" ';
$results = mysqli_query($con, $sql);
  if($row_post =  $results->fetch_assoc())
  {
    $email = $row_post['email'];
  }
$comment = $_POST['comment'];
$post_id = $_POST['post_id'];
$query=mysqli_query($con,"insert into comments(post_id,date,username,email,comment) values('$post_id',NOW(),'$username','$email','$comment')");


if($query){
	echo 1;
}
else{
	echo 0;
}
?>