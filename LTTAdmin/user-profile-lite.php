<?php

include ('config.php');
session_start();

if (!$_SESSION['username']) {
   header('Location: index.php');
}
?>

<?php

if (isset($_POST['submit'])) {
  move_uploaded_file($_FILES['file']['tmp_name'],"images/avatars/".$_FILES['file']['name']);
  
  $sql="UPDATE adminlogin SET image= '".$_FILES['file']['name']."' WHERE a_name= '".$_SESSION['username']."' ";

  $sql1="UPDATE post SET image= '".$_FILES['file']['name']."' WHERE admin_name= '".$_SESSION['username']."' ";

  mysqli_query($con,$sql);
  mysqli_query($con,$sql1);
  
}

?>



<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>LTT | User Profile</title>
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

   <style>
     
  #success-message {
    background: #DEF1D8;
    color:green;
    padding:10px;
    margin:10px;
    display:none;
    position: fixed;
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
              </li>
              <li class="nav-item">
                <a class="nav-link " href="futureevents.php">
                  <i class="material-icons">note_add</i>
                  <span>Future Events</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="manageposts.php">
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
                <a class="nav-link active " href="user-profile-lite.php">
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
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">User Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->

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

            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">

                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?php echo 'images/avatars/'.$img  ?>" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0"><?php echo $_SESSION['username']; ?></h4>
                    <span class="text-muted d-block mb-2">Choose Photo</span>

                    <input type="file" name="file" class="mb-2 btn btn-primary mr-2" value="Choose Photo" >

                    <button type="submit" name="submit" class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2">
                      <i class="material-icons mr-1">person</i>Upload</button>
                  </div>
                 </form>

                 <?php
              }
              ?>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Workload</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                            <span class="progress-value">74%</span>
                          </div>
                        </div>
                      </div>
                    </li>

                    <?php

                     $sql= "SELECT *FROM adminlogin where a_name = '".$_SESSION['username']."' ";

                     $result=mysqli_query($con,$sql);


                     while ($admin = mysqli_fetch_assoc($result) ) 
                    {
                   
                      ?>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span><?php echo $admin['description'];  ?></span>
                    </li>

                    <?php
                    }
                    ?>

                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Admin Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form >
                            <div class="form-row">
                              <div class="form-group col-md-6">

                               <?php

                               $sql= "SELECT *FROM adminlogin where a_name = '".$_SESSION['username']."' ";

                               $result=mysqli_query($con,$sql);

            
                                while ($admin = mysqli_fetch_assoc($result) ) 
                                {

                               ?>
                           <label for="feFirstName">First Name</label>
                                <input type="text" class="form-control" id="feFirstName" placeholder="First Name" value="<?php echo $admin['firstname'];?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="feLastName">Last Name</label>
                                <input type="text" class="form-control" id="feLastName" placeholder="Last Name" value="<?php echo $admin['lastname']; ?>" ></div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" id="feEmailAddress" placeholder="Email" value="<?php echo $admin['a_email']; ?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Password</label>
                                <input type="password" class="form-control" id="fePassword" placeholder="Password" value="<?php echo $admin['a_pass']; ?>" > </div>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Address</label>
                              <input type="text" class="form-control" id="feInputAddress" placeholder="Address" value="<?php echo $admin['address']; ?>" > </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">City</label>
                                <input type="text" class="form-control" id="feInputCity" placeholder="City" value="<?php echo $admin['city']; ?>"> </div>
                              <div class="form-group col-md-4">
                                <label for="feInputState">State</label>
                                <select id="feInputState" class="form-control" >
                                  <?php
                                    if ($admin['state']=="") {

                                      ?>
                                        <option>Choose the State...</option>
                                        <?php
                                    }
                                    else
                                    {
                                 ?>
                                  <option selected><?php echo $admin['state']; ?></option>  <?php  }  ?>
                                  <option>Andra Pradesh</option>
                                  <option>Maharastra</option>
                                  <option>Karnataka</option>
                                  <option>Kerala</option>
                                  <option>Telangana</option>
                                  <option>Tamil Nadu</option>
                                  <option>Uttar Pradesh</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" value="<?php echo $admin['zip']; ?>"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Description</label>
                                <textarea class="form-control" id="feDescription" rows="5" ><?php echo $admin['description']; ?></textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-accent" id="update">Update Account</button>

                          </form>


                          <?php
                                }
                            
                           ?>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->


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
     
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
      
      $(document).ready(function() {

        $("#update").on("click",function(e){
          e.preventDefault();

          var a_name="<?php echo $_SESSION['username']; ?>";
          var fname=$("#feFirstName").val();
          var lname=$("#feLastName").val();
          var email=$("#feEmailAddress").val();
          var pass=$("#fePassword").val();
          var address=$("#feInputAddress").val();
          var city=$("#feInputCity").val();
          var state=$("#feInputState").val();
          var zip=$("#inputZip").val();
          var desc=$("#feDescription").val();

 
       $.ajax({
            url: "php/profile.php",
            type:"POST",
            data: {a_name:a_name,firstname:fname,lastname:lname,email:email,pass:pass,address:address,city:city,state:state,zip:zip,feDescription:desc},
            success:function(data) {

              if (data==1) {   
               $("#success-message").html("Profile has been updated successfully").slideDown();
               $("#error-message").slideUp();      
               
              }
              else
              {
                a$("#error-message").html("Unable to update the profile").slideDown();
               $("#success-message").slideUp();
              }
            }
          });

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
  </body>
</html>



