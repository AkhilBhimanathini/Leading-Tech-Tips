<?php 

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'ltt');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert post </title>

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
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert post
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Insert post 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Admin Name </label> 
            
                          
                          <input name="admin_name" type="text" class="form-control" required>
                        


                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Post Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
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
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Category </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
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
                              
                          </select><!-- form-control Finish -->
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Post Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="post_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Post Tag</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="post_tag" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   Slider image : 
                  <textarea id='long_desc' name='long_desc' ></textarea><br>

                  Mini_Slider image : 
                  <textarea id='long_desc' name='long_desc' ></textarea><br>
                   
                   Slider image : 
                  <textarea id='long_desc' name='long_desc' ></textarea><br>

                  Post desc : 
                  <textarea id='long_desc' name='long_desc' ></textarea><br>
                       
                   </div><!-- form-group Finish -->
                   
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
        
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script> 
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
  <!-- Script -->
  <script type="text/javascript">
  
    // Initialize CKEditor
    CKEDITOR.inline( 'short_desc');

    CKEDITOR.replace('long_desc',{

      width: "500px",
          height: "200px"
   
    }); 
  
      
  </script>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $post_title = $_POST['post_title'];
    $post_cat = $_POST['post_cat'];
    $cat = $_POST['cat'];
    $post_price = $_POST['post_price'];
    $post_keywords = $_POST['post_keywords'];
    $post_desc = $_POST['post_desc'];
    
    $post_img1 = $_FILES['post_img1']['name'];
    $post_img2 = $_FILES['post_img2']['name'];
    $post_img3 = $_FILES['post_img3']['name'];
    
    $temp_name1 = $_FILES['post_img1']['tmp_name'];
    $temp_name2 = $_FILES['post_img2']['tmp_name'];
    $temp_name3 = $_FILES['post_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"post_images/$post_img1");
    move_uploaded_file($temp_name2,"post_images/$post_img2");
    move_uploaded_file($temp_name3,"post_images/$post_img3");
    
    $insert_post = "insert into post (p_cat_id,cat_id,date,post_title,post_img1,post_img2,post_img3,post_price,post_keywords,post_desc) values ('$post_cat','$cat',NOW(),'$post_title','$post_img1','$post_img2','$post_img3','$post_price','$post_keywords','$post_desc')";
    
    $run_post = mysqli_query($con,$insert_post);
    
    if($run_post){
        
        echo "<script>alert('post has been inserted sucessfully')</script>";
        echo "<script>window.open('insert_post.php','_self')</script>";
        
    }
    
}


?>