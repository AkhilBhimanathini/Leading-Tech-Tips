<?php 
include('config.php');

session_start();

if (!$_SESSION['username']) {
  header('Location: index.php');

}
?>



<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LTT | Edit Post</title>
        <!-- add icon link -->
        <link rel = "icon" href =  "images/LTTlogo.svg" type = "image/x-icon"> 

    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> 

	<!-- CSS -->
	<style type="text/css">
	.cke_textarea_inline{
		border: 1px solid black;
	}

  #success-message {
    background: #DEF1D8;
    color:green;
    padding:10px;
    margin:10px;
    display:none;
    position:fixed;
    right:15px;
    top:90px;
    z-index:100;
  }

  
  #error-message {
    background: #EFDCDD;
    color:red;
    padding:10px;
    margin:10px;
    display:none;
    position:fixed;
    right:15px;
    top:90px;
    z-index:100;
  }

  textarea {
	width: 400px;
	height: 100px;
	border: 1px solid #cccccc;
  border-radius:5px;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
}
textarea:focus { 
    outline: none !important;
    border-color: #719ECE;
    box-shadow: 0 0 10px #719ECE;
}

input {
  border: 1px solid #cccccc;
  border-radius:5px;
  background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
}

input:focus { 
    outline: none !important;
    border-color: #719ECE;
    box-shadow: 0 0 10px #719ECE;
}


	</style>

	<!-- CKEditor -->	
	<script src="ckeditor/ckeditor.js" ></script>

</head>
  <body class="h-100">
    
    
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="dashboard.php" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                   src="images/LTTlogo.svg" alt="LTT Dashboard">
                  <span class="d-none d-md-inline ml-1">LTT Dashboard</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="dashboard.php">
                  <i class="material-icons">edit</i>
                  <span>Blog Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="components-blog-posts.php">
                  <i class="material-icons">vertical_split</i>
                  <span>Blog Posts</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="add-new-post.php">
                  <i class="material-icons">note_add</i>
                  <span>Add New Post</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="futureevents.php">
                  <i class="material-icons">note_add</i>
                  <span>Future Events</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="manageposts.php">
                  <i class="material-icons">view_module</i>
                  <span> Manage Posts</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="managefuture.php">
                  <i class="material-icons">view_module</i>
                  <span> Manage Events</span>
                </a>
              </li>
           
              <li class="nav-item">
                <a class="nav-link " href="user-profile-lite.php">
                  <i class="material-icons">person</i>
                  <span>User Profile</span>
                </a>
              </li>
          
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </form>

              <?php

$sql= "SELECT *FROM adminlogin where a_name = '".$_SESSION['username']."' ";

$result=mysqli_query($con,$sql);


 while ($admin = mysqli_fetch_assoc($result) ) 
  {

    if($admin['image']==""){
      $img='default.jpg';
    }
    else {
      $img=$admin['image'];
    }

?>
              
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?php echo 'images/avatars/'.$img ?>" alt="User Avatar">
                    <span class="d-none d-md-inline-block"><?php echo $_SESSION['username']; ?></span>
                  </a>

                  <?php
  }
  ?>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="user-profile-lite.php">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <a class="dropdown-item" href="components-blog-posts.php">
                      <i class="material-icons">vertical_split</i> Blog Posts</a>
                    <a class="dropdown-item" href="add-new-post.php">
                      <i class="material-icons">note_add</i> Add New Post</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Blog Posts</span>
                <h3 class="page-title">Edit Post</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
              <div class="col-lg-9 col-md-12">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                  <div class="card-body">

        <?php

        $id=$_GET['post_id'];
   
        $sql="SELECT *FROM post WHERE post_id= '$id' ";
        
        
        $result = mysqli_query($con,$sql);

        while($post = mysqli_fetch_array($result)) 
        {
          
          $sql = "SELECT category.cat_title,category.cat_id,post.cat_id FROM category,post WHERE category.cat_id= '".$post['cat_id']."' ";

          $res = mysqli_query($con,$sql);

          $cat = mysqli_fetch_array($res);

          $sql1 = "SELECT post_category.p_cat_title,post_category.p_cat_id,post.p_cat_id FROM post_category,post WHERE post_category.p_cat_id= '".$post['p_cat_id']."' ";

          $res = mysqli_query($con,$sql1);

          $pcat = mysqli_fetch_array($res);

         
   
         ?>

     
					
		<form id="postdata">
		Admin Name:
		<input id="admin_name" type="text" value="<?php echo $_SESSION['username']; ?>"class="form-control" required><br>
		Post Category:
		 <select id="post_cat" class="form-control"><!-- form-control Begin -->
                              
            <option value="<?php echo $pcat['p_cat_id']; ?>"><?php echo $pcat['p_cat_title']; ?> </option>
             <option> Select a Post Category </option>
                              
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
                              
        </select> <br>

        Category:
         <select id="cat" class="form-control"><!-- form-control Begin -->

         <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_title']; ?> </option>
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
		<textarea id='post_title' ><?php echo $post['post_title']; ?></textarea><br>

		Post Tag : 
		<input type="text" id="post_tag" value="<?php echo $post['post_tag'];?>"><br>  <br>

		Slider Image: <br>
		<textarea id="slider_img" ><?php echo $post['slider_img'];?></textarea><br>

		Mini Slider Image:   <br>
		<textarea id="mini_slider_img" ><?php echo $post['mini_slider_img'];?></textarea><br>

    Mini Description:    <br>
		<textarea id="post_mini_desc" ><?php echo $post['post_mini_desc'];?></textarea><br>



		 Description: 
		<textarea id="post_desc" ><?php echo $post['post_desc'];?></textarea><br>

    <div style="text-align:center">
		<input type="submit" class="mb-2 btn btn-primary mr-2" id="update" value="Update"> </div>
  </form>
  <?php
        }
?>

                  </div>
                </div>
                <!-- / Add New Post Form -->
              </div>
              <div class="col-lg-3 col-md-12">
                <!-- Post Overview -->
                <div class='card card-small mb-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                  </div>
                  <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">flag</i>
                          <strong class="mr-1">Status:</strong> Draft
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">visibility</i>
                          <strong class="mr-1">Visibility:</strong>
                          <strong class="text-success">Public</strong>
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">calendar_today</i>
                          <strong class="mr-1">Schedule:</strong> Now
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex">
                          <i class="material-icons mr-1">score</i>
                          <strong class="mr-1">Readability:</strong>
                          <strong class="text-warning">Ok</strong>
                        </span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <button class="btn btn-sm btn-outline-accent">
                          <i class="material-icons">save</i> Save Draft</button>
                        <button class="btn btn-sm btn-accent ml-auto">
                          <i class="material-icons">file_copy</i> Publish</button>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- / Post Overview -->
                <!-- Post Overview -->
                <div class='card card-small mb-3'>
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Categories</h6>
                  </div>
                  <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item px-3 pb-2">
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category1" checked>
                          <label class="custom-control-label" for="category1">Uncategorized</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category2" checked>
                          <label class="custom-control-label" for="category2">Design</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category3">
                          <label class="custom-control-label" for="category3">Development</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category4">
                          <label class="custom-control-label" for="category4">Writing</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category5">
                          <label class="custom-control-label" for="category5">Books</label>
                        </div>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-white px-2" type="button">
                              <i class="material-icons">add</i>
                            </button>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- / Post Overview -->
              </div>
            </div>
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2020
              <a href="dashboard.php" rel="nofollow">LTT Dashboard</a>
            </span>
          </footer>
        </main>
      </div>
  </div>
  
  <div id="error-message"></div>
  <div id="success-message"></div>  
	
		
	<!-- Script -->
	<script type="text/javascript">
	
		// Initialize CKEditor
		CKEDITOR.inline( 'post_title');
    CKEDITOR.inline( 'post_mini_desc');

		CKEDITOR.replace('post_desc',{

			width: "700px",
        	height: "350px"
   
		}); 
	  	
	</script>

  
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
      
      $(document).ready(function() {

        $("#update").on("click",function(e){
          e.preventDefault();

          var pid="<?php echo $id; ?>";
          var a_name=$("#admin_name").val();
          var p_cat=$("#post_cat").val();
          var category=$("#cat").val();
          var p_title= CKEDITOR.instances.post_title.getData();
          var p_tag=$("#post_tag").val();
          var image=$("#slider_img").val();
          var mini_image=$("#mini_slider_img").val();
          var p_mini_desc=CKEDITOR.instances.post_mini_desc.getData();
          var p_desc=CKEDITOR.instances.post_desc.getData();
      
 
          if (a_name=="" || p_cat=="" || category=="" || p_tag == "" || p_title=="" || image=="" || mini_image=="" || p_mini_desc=="" || p_desc=="")
          {
            $("#error-message").html("All fields are required").slideDown();
            $("#success-message").slideUp();
          }
          else {

       $.ajax({
            url: "php/editpost.php",
            type:"POST",
            data: {post_id:pid,admin_name:a_name,post_cat:p_cat,cat:category,post_title:p_title,post_tag:p_tag,slider_img:image,mini_slider_img:mini_image,post_mini_desc:p_mini_desc,post_desc:p_desc},
            success:function(data) {

              if (data==1) {   
               $("#success-message").html("Post has been updated successfully").slideDown();
               $("#error-message").slideUp();
              
              }
              else
              {
                $("#error-message").html("Unable to update the post").slideDown();
               $("#success-message").slideUp();
              }

            }
          });

        }

        })
      });
    </script>

    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
    <script src="scripts/app/app-blog-new-post.1.1.0.js"></script>
  </body>
</html>