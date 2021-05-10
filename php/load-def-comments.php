<?php
include 'config.php';
$post_id = $_POST['post_id'];
$sql = "SELECT *from comments where post_id= '".$post_id."' order by com_id desc ";
$results = mysqli_query($con,$sql) or die("SQL Query Failed");
$output ="";
if(mysqli_num_rows($results)>0){
	$output = "";
	while ($row = mysqli_fetch_assoc($results)) {
		?>					<li class='comment'>
							<div class="comment_body">
										<div class="comment_panel d-flex flex-row align-items-center justify-content-start">
											<div class="comment_author_image"><div><img src="images/comment_author_1.jpg" alt=""></div></div>
											<small class="post_meta"><a href="#"><?php echo $row['username']; ?></a><span><?php echo $row['date'];?></span></small>
										</div>
										<div class="comment_content">
											<p><?php echo $row['comment'];?></p>
										</div>
									</div> 
								</li>
									<?php
	}
	$output .="</li>";

	mysqli_close($con);

	echo $output;
}
else{
	
	echo '<h3 style="position: center;"> No Comments</h3>';
}
?>