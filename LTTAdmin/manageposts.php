<?php

include ('config.php');
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
    <title>LTT | Manage Posts</title>

    <link rel = "icon" href =  "images/LTTlogo.svg" type = "image/x-icon"> 
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <style>
  

  table {
      padding-left: 50px;
      width:100%;
      background: #FFFFFF;
      border-radius: 2px;
   }
   
   th  {
    text-align: left;
     padding: 8px;
     height: 50px;
   
   }

   td {
    text-align: left;
     padding: 8px;
     height: 150px;
   }


    </style>


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
                <li class="nav-item">
                <a class="nav-link " href="futureevents.php">
                  <i class="material-icons">note_add</i>
                  <span>Future Events</span>
                </a>
              </li>
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
            <div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Manage Blog Posts</h3>
              </div>
            </div>
            <!-- End Page Header -->
        

        
            

            
              <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h5 class="m-0">Post Details</h5>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">


                        <tr>
                          <th scope="col" class="border-0">S.No</th>
                          <th scope="col" class="border-0">Post Title</th>
                          <th scope="col" class="border-0">Mini Slider Image</th>
                          <th scope="col" class="border-0">Post Date & Time</th>
                          <th scope="col" class="border-0">Post Catogory</th>
                          <th scope="col" class="border-0">Catogory</th>
                          <th scope="col" class="border-0">Post Tag</th>
                          <th scope="col" class="border-0">Edit</th>
                          <th scope="col" class="border-0">Delete</th>
                        </tr>
                      </thead>
                      <tbody>

                      
                      <?php

                      $sql = "SELECT *FROM post WHERE admin_name= '".$_SESSION['username']."' ORDER BY date DESC";

                      $result = mysqli_query($con,$sql);

                       $i=1;

                      while($post = mysqli_fetch_array($result)) 
                      {
                       

                        $sql = "SELECT category.cat_title,category.cat_id,post.cat_id FROM category,post WHERE category.cat_id= '".$post['cat_id']."' ";

                        $res = mysqli_query($con,$sql);

                        $cat = mysqli_fetch_array($res);

                        $sql1 = "SELECT post_category.p_cat_title,post_category.p_cat_id,post.p_cat_id FROM post_category,post WHERE post_category.p_cat_id= '".$post['p_cat_id']."' ";

                        $res = mysqli_query($con,$sql1);

                        $pcat = mysqli_fetch_array($res);


    
                         ?>

                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $post['post_title'] ?></td>
                        <td><img src="<?php echo $post['mini_slider_img']; ?>" width="200px" height="125px" alt="Mini Slider Image"> </img></td>
                        <td><?php echo $post['date']; ?></td>
                        <td><?php echo $pcat['p_cat_title']; ?></td>
                        <td><?php echo $cat['cat_title']; ?></td>
                        <td><?php echo $post['post_tag']; ?></td>
                        <td><a href="edit.php?post_id=<?php echo $post['post_id'];?>" class="mb-2 btn btn-primary mr-2">Edit</a></td>
                        <td><a href="delete.php?post_id=<?php echo $post['post_id'];?>" class="mb-2 btn btn-sm btn-danger mr-1">Delete</a></td>

                     <?php
    
                     $i++;
                    }
                    ?>

                   </tr>
                                
                      </tbody>
                    </table>
                  </div>
                </div>
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
  
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-components-overview.1.1.0.js"></script>
  </body>
</html>