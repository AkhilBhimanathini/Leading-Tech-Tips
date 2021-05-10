<?php
session_start();
include 'config.php';
$post_id = $_POST['post_id'];

$sql = "select count(*) as cntUser from likes where post_id = '".$post_id."' ";

$results = mysqli_query($con,$sql);
$row = mysqli_fetch_array($results);
$count = $row['cntUser'];

if($count>0)
	echo $count;
else
	echo 0;
?>