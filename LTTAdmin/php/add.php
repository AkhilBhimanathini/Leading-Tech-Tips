<?php

include('config.php');

$admin_name = $_POST['admin_name'];
$post_cat = $_POST['post_cat'];
$cat = $_POST['cat'];
$post_title = $_POST['post_title'];
$post_tag = $_POST['post_tag'];
$slider_img = $_POST['slider_img'];
$mini_slider_img = $_POST['mini_slider_img'];
$post_mini_desc = $_POST['post_mini_desc'];
$post_desc = $_POST['post_desc'];

$insert_post =  "INSERT INTO post(p_cat_id,cat_id,date,admin_name,post_title,post_tag,slider_img,mini_slider_img,post_mini_desc,post_desc) VALUES('$post_cat','$cat',NOW(),'$admin_name','$post_title','$post_tag','$slider_img','$mini_slider_img','$post_mini_desc','$post_desc')";
//header('location: index.php');

if(mysqli_query($con,$insert_post)) {
     echo 1;
}

else {
    echo 0;
}



?>