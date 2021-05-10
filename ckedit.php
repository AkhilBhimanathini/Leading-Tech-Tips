<?php 
include('includes\config.php');

// Insert record
if(isset($_POST['submit'])){
		$admin_name = $_POST['admin_name'];
    	$post_cat = $_POST['post_cat'];
    	$cat = $_POST['cat'];
		$post_title = $_POST['post_title'];
		$post_tag = $_POST['post_tag'];
		$slider_img = $_POST['slider_img'];
		$mini_slider_img = $_POST['mini_slider_img'];
		$post_desc = $_POST['post_desc'];

			
		$insert_post =  "INSERT INTO post(p_cat_id,cat_id,date,admin_name,post_title,post_tag,slider_img,mini_slider_img,post_desc) VALUES('$post_cat','$cat',NOW(),'$admin_name','$post_title','$post_tag','$slider_img','$mini_slider_img','$post_desc')";
			//header('location: index.php');
		$run_post = mysqli_query($con,$insert_post);
    
    	if($run_post){
        
        echo "<script>alert('post has been inserted sucessfully')</script>";
        echo "<script>window.open('ckedit.php','_self')</script>";
        
    }
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ckeditor Insert product</title>

	<!-- CSS -->
	<style type="text/css">
	.cke_textarea_inline{
		border: 1px solid black;
	}
	</style>

	<!-- CKEditor -->	
	<script src="ckeditor/ckeditor.js" ></script>
</head>
<body>

	<form method='post' action=''>
		Admin Name:
		<input name="admin_name" type="text" class="form-control" required><br>
		Post Category:
		 <select name="post_cat" class="form-control"><!-- form-control Begin -->
                              
             <option> Select a Category post </option>
                              
             <?php 
                              
             $get_p_cats = "select * from post_category";
             $run_p_cats = mysqli_query($con,$get_p_cats);
             
             while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                 $p_cat_id = $row_p_cats['p_cat_id'];
                 $p_cat_title = $row_p_cats['p_cat_title'];
                                  
                 echo "
                                  
                 <option value='$p_cat_id'> $p_cat_title </option>
                                  
                 ";
                                  
             }
                              
             ?>
                              
        </select>

        Category:
         <select name="cat" class="form-control"><!-- form-control Begin -->
                              
           <option> Select a Category </option>
                              
              <?php 
                              
              $get_cat = "select * from category";
              $run_cat = mysqli_query($con,$get_cat);
                              
              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                  $cat_id = $row_cat['cat_id'];
                  $cat_title = $row_cat['cat_title'];
                                  
                  echo "
                                  
                  <option value='$cat_id'> $cat_title </option>
                                  
                  ";
                                  
              }
                              
              ?>
                              
          </select><br>

		Post Title: 
		<textarea id='short_desc' name='post_title' style='border: 1px solid black;'  ></textarea><br>

		Post Tag : 
		<input type="text" name="post_tag" ><br>

		Slider Image: <br>
		<textarea id='short_desc' name='slider_img' style='border: 1px solid black;'  ></textarea><br>

		Mini Slider Image: 
		<textarea id='short_desc' name='mini_slider_img' style='border: 1px solid black;'  ></textarea><br>


		 Description: 
		<textarea id='long_desc' name='post_desc' ></textarea><br>

		<input type="submit" name="submit" value="Submit">
	</form>
	
	<!-- Script -->
	<script type="text/javascript">
	
		// Initialize CKEditor
		CKEDITOR.inline( 'short_desc');

		CKEDITOR.replace('long_desc',{

			width: "500px",
        	height: "200px"
   
		}); 
	
    	
	</script>
</body>
</html>