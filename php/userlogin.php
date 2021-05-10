<?php
session_start();
include 'config.php';

    $username = mysqli_real_escape_string($con,$_POST['name']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

        $sql_query = "select count(*) as cntUser from register where username='".$username."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['username'] = $username;
           echo "1";
        }
?>