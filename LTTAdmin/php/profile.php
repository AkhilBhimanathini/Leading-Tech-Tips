
<?php

include('config.php');


  $a_name=$_POST['a_name'];
  $fname=$_POST['firstname'];
  $lname=$_POST['lastname'];
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $address=$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $zip=$_POST['zip'];
  $desc=$_POST['feDescription'];

  $sql= " UPDATE adminlogin SET firstname='$fname', lastname='$lname', a_email='$email', a_pass='$pass', address='$address', city='$city', state='$state', zip='$zip', description='$desc' WHERE a_name= '$a_name' ";

  if (mysqli_query($con,$sql))
  {
    echo 1;
  }

  else {
    echo 0;
  }
  

?>