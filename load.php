<?php 
include 'includes/config.php';
if(isset($_GET['offset']) && isset($_GET['limit'])){
	$limit = $_GET['limit'];
	$offset = $_GET['offset'];
	$get_post = "select * from post where p_cat_id=2 order by post_id DESC limit {$limit} offset {$offset}";
    
	$run_post = mysqli_query($con,$get_post);

while($row_post=mysqli_fetch_array($run_post)){
    		$post_id = $row_post['post_id'];
    		$post_cat = $row_post['p_cat_id'];
    		$cat = $row_post['cat_id'];
    		$date = $row_post['date'];
    		$admin_name = $row_post['admin_name'];
			$post_title = $row_post['post_title'];
			$post_tag = $row_post['post_tag'];
			$slider_img = $row_post['slider_img'];
			$mini_slider_img = $row_post['mini_slider_img'];
			$post_mini_desc = $row_post['post_mini_desc'];
			$post_desc = $row_post['post_desc'];
	?>
									<div class="card card_small_with_image grid-item">
										<img class="card-img-top" src="<?php echo $slider_img; ?>" alt="https://unsplash.com/@jakobowens1">
										<div class="card-body">
											<div class="card-title card-title-small"><a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a></div>
											<small class="post_meta"><a href="#"><?php echo $admin_name ?></a><span><?php echo $date; ?></span></small>
										</div>
									</div>
<?php
}
}
?>