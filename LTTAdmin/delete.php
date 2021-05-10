<?php

include('config.php');

$id = $_GET['post_id'];

    
    $sql=  "DELETE FROM post WHERE post_id='$id'";
    
    if (mysqli_query($con,$sql)) {

      echo "<script>window.open('manageposts.php','_self')</script>";

    } else {
        echo "Error Deleting record" . mysqli_error($con);
    }
    

    

?>
