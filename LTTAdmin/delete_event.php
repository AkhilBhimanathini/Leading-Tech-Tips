<?php

include ('config.php');

$id = $_GET['event_id'];

    
    $sql=  "DELETE FROM future_events WHERE future_id='$id' ";
    
    if (mysqli_query($con,$sql)) {

      echo "<script>window.open('managefuture.php','_self')</script>";

    } else {
        echo "Error Deleting record" . mysqli_error($con);
    }
    

    

?>
