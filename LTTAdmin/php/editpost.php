<?php

include('config.php');


  $id=$_POST['post_id'];
// Insert record
  $admin_name = $_POST['admin_name'];
  $post_cat = $_POST['post_cat'];
  $cat = $_POST['cat'];
  $post_title = $_POST['post_title'];
  $post_tag = $_POST['post_tag'];
  $slider_img = $_POST['slider_img'];
  $mini_slider_img = $_POST['mini_slider_img'];
  $post_mini_desc = $_POST['post_mini_desc'];
  $post_desc = $_POST['post_desc'];

    
  $insert_post =  "UPDATE post SET p_cat_id='$post_cat',cat_id='$cat',date=NOW(),admin_name='$admin_name',post_title='$post_title',post_tag='$post_tag',slider_img='$slider_img',mini_slider_img='$mini_slider_img',post_mini_desc='$post_mini_desc',post_desc='$post_desc' WHERE post_id='$id'";


  if(mysqli_query($con,$insert_post)) {
    echo 1;
}

else {
   echo 0;
}


?>





