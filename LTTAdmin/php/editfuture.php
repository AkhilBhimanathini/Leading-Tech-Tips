<?php

include('config.php');


    $id=$_POST['fid'];
    $future_event = $_POST['future_event'];
    $future_month = $_POST['future_month'];
    $future_day = $_POST['future_day'];
    $admin_name = $_POST['admin_name'];
    $e_place=$_POST['event_place'];
        
    $insert_post =  "UPDATE future_events SET future_month='$future_month',future_day='$future_day',future_event='$future_event',future_date=NOW(),admin_name='$admin_name',event_place='$e_place' WHERE future_id='$id' ";
        //header('location: index.php');
    $run_post = mysqli_query($con,$insert_post);

    if($run_post){
    
    echo 1;
}
else{
    echo 0;
}

?>