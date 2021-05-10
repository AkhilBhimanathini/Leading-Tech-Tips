<?php
session_start();
include 'config.php';

    $post_title = mysqli_real_escape_string($con,$_POST['name']);

    $sql = "select * from post where post_title='".$post_title."' ";
	$results = mysqli_query($con, $sql);
  	if($row_post =  $results->fetch_assoc())
  	{
    	echo $row['post_id'];
  	}
    else{
        echo 5;
    }
?>