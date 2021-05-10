<?php
include 'includes/config.php';
  if (isset($_POST['query'])) 
  {
    $inpText = $_POST['query'];
    $sql = "SELECT * FROM post WHERE post_title LIKE '%".$inpText."%' limit 5";
    $result = mysqli_query($con,$sql);
    $output ="";
    if (mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result))
      {
        $output.= "<a href='#' class='list-group-item list-group-item-action border-1'>".$row['post_title']."</a>";
      } 
    }
    else
    {
      $output = '<p class="list-group-item border-1" >No Record</p>';
    }
    echo $output;
  }
?>