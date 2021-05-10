<?php
include 'includes/config.php';
if(isset($_POST['submit']))
{
$username=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$post_id = $_GET['post_id'];
$query=mysqli_query($con,"insert into comments(post_id,date,username,email,comment) values('$post_id',NOW(),'$username','$email','$comment')");
}
function test_input($data)
{
  $data = trim($data);
  $data = stripcslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
?>