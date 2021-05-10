<?php
include 'includes/config.php';
 
  if (isset($_POST['query'])) {
     
    $query = "SELECT * FROM post WHERE post_title LIKE '{$_POST['query']}%' LIMIT 3";
    $result = mysqli_query($con, $query);
 
  if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      echo $user['post_title']."<br/>";
    }
  } else {
    echo "<p style='color:red'>User not found...</p>";
  }
 
}
?>