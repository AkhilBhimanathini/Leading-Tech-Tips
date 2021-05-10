<?php

$username = $_POST['username'];
$post_id = $_POST['post_id'];

include 'config.php';

$gets = "select * from register where username='".$username."' ";

$cont = 0;
$res = mysqli_query($con,$gets);
if($row = mysqli_fetch_assoc($res)){
	$cont = $row['id'];
}
$made =  "select count(*) as cntUser from likes where post_id='".$post_id."' and user_id='".$cont."' ";
$res = mysqli_query($con,$made);
$row = mysqli_fetch_array($res);
$count = $row['cntUser'];
if($count>0){
$sql = "delete * from likes where user_id='".$cont."' ";
if(mysqli_query($con,$sql)){
	echo 1;
}
}
else{
	echo 0;
}


?>