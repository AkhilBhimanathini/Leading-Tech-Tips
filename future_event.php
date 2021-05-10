<?php 
include('includes\config.php');

// Insert record
if(isset($_POST['submit'])){
		$future_event = $_POST['future_event'];
    	$future_month = $_POST['future_month'];
    	$future_day = $_POST['future_day'];
		$admin_name = $_POST['admin_name'];
			
		$insert_post =  "INSERT INTO future_events(future_month,future_day,future_event ,future_date,admin_name) VALUES('$future_month','$future_day','$future_event',NOW(),'$admin_name')";
			//header('location: index.php');
		$run_post = mysqli_query($con,$insert_post);
    
    	if($run_post){
        
        echo "<script>alert('post has been inserted sucessfully')</script>";
        echo "<script>window.open('future_event.php','_self')</script>";
        
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
		Future Month:
		<input name="future_month" type="text" class="form-control" required>
		<br>

		Future Day:
		<input name="future_day" type="text" class="form-control" required>
		<br>

		Future event:
		<input name="future_event" type="text" class="form-control" required><br>

		Admin name: 
		<input type="text" name="admin_name" ><br>

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