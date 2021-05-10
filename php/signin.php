<?php

include_once('config.php');
if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($email != "" && $password != ""){

        $sql_query = "SELECT count(*) as total from signup WHERE email = '".$email."' and 
	password = '".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['total'];

        if($count > 0){
            $_SESSION['email'] = $email;
            echo "i am available";
            //include "main.php";
        }
        else{
        	echo "<script>alert('Unsuccessfully Registered.');</script>";
        }
       }
   }

?>