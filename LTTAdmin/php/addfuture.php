<?php

include('config.php');

    $future_event = $_POST['future_event'];
    $future_month = $_POST['future_month'];
    $future_day = $_POST['future_day'];
    $admin_name = $_POST['admin_name'];
    $e_place=$_POST['event_place'];
        
    $insert_post =  "INSERT INTO future_events(future_month,future_day,future_event ,future_date,admin_name,event_place) VALUES('$future_month','$future_day','$future_event',NOW(),'$admin_name','$e_place')";
        //header('location: index.php');
    $run_post = mysqli_query($con,$insert_post);

    if($run_post){
    
    echo 1;
}
else{
    echo 0;
}

?>