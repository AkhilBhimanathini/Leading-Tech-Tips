<?php  
include_once('config.php');
if(isset($_POST['submit']))
{
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$query=mysqli_query($con,"INSERT INTO signup (name, email, password) 
VALUES ('$name', '$email', '$password')");
if($query)
{
  echo "<script>alert('Successfully Registered. You can login now');</script>";
}
else
{
  echo "<script>alert('Unsuccessfully Registered.');</script>";
}
}

?>




















