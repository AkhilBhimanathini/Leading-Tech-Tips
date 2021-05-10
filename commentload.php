<?php
include 'includes/config.php';
$com_id = $_POST['com_id'];
$post_id = $_POST['post_id'];
$data=mysqli_query($con,"select *from comments where com_id < '".$com_id."' and post_id='".$post_id."'  order by com_id DESC limit 5");
$output="";
$cons=0;
	
if($data->num_rows > 0)
{
  $output .='<ul class="comment_list">';
while ($row_post = mysqli_fetch_assoc($data)) {
	                      $com_id = $row_post['com_id'];
                          $post_id = $row_post['post_id'];
                          $username = $row_post['username'];
                          $comment = $row_post['comment'];
                          $date = $row_post['date'];
                          
                          ?>
                          <ul class="comment_list">
                        <li class="comment" id="comment">
                          <div class="comment_body" >
                            <div class="comment_panel d-flex flex-row align-items-center justify-content-start">
                              <div class="comment_author_image"><div><img src="images/comment_author_1.jpg" alt=""></div></div>
                              <small class="post_meta"><a href="#"><?php echo $username; ?></a><span><?php echo $date;  ?></span></small>
                            </div>

                            <div class="comment_content">
                              <p><?php echo $comment; ?></p>
                            </div>
                          </div>
                        </li>
                      </ul>
                        <?php
                        $cons=$com_id;
                    }
                             $output .='
     <div class="load_more" id="remove_row">
            <div id="load_more" date-id="'.$cons.'" class="load_more_button text-center trans_200">Load More</div>
          </div>';

          echo $output;
                }
          else
          {
          	?>
          	<h3>No comments</h3>

          	<?php
          }
                    

?>