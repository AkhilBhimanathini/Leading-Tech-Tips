<?php
include 'includes/config.php';
session_start();
include 'includes/weather.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php
  if($_REQUEST['submit']){
  $post_title = mysqli_real_escape_string($con,$_POST['posttitle']);
  $sql = "select * from post where post_title='".$post_title."' ";
  $results = mysqli_query($con, $sql);
  if($results)
    echo "<script>alert('$post_title');</script>";
  else
    echo "<script>alert('NO');</script>";
  if($row_post =  $results->fetch_array())
  {
    $post_title = $row_post['post_title'];

  ?>
<title>LTT | <?php echo $post_title; ?></title>
<?php
}
}

?>
 <!-- add icon link -->
<link rel = "icon" href =  "images/Capture4.svg" type = "image/x-icon"> 
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Demo project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery.mb.YTPlayer-3.1.12/jquery.mb.YTPlayer.css">
<link rel="stylesheet" type="text/css" href="styles/post_nosidebar.css">
<link rel="stylesheet" type="text/css" href="styles/post_nosidebar_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/twitterlike.css">
</head>
<style type="text/css">
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #000000;
  min-width: 50px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  opacity: 70%;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #2C0A03;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #2C0A03;}
</style>

<style type="text/css">
  #success-message{
    background: #DEF1D8;
    color: green;
    padding: 10px;
    margin: 10px;
    display: none;
    position: absolute;
    right: 15px;
    top : 15px;
  }
  #error-message{
    background: #EFDCDD;
    color: red;
    padding: 10px;
    margin: 10px;
    display: none;
    position: absolute;
    right: 15px;
    top : 15px;
  }
</style>
<body>

<div class="super_container">

  <!-- Header -->

 <header class="header">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="header_content d-flex flex-row align-items-center justify-content-start">
            <div class="logo"><a href="index.php">LTT</a></div>
            <nav class="main_nav">
              <ul>
              <li class="menu_mm"><a href="news.php">News</a></li>
              <li class="menu_mm"><a href="howto.php">HowTo</a></li>
              <li class="menu_mm">
                <div class="dropdown">
                  <a href="best.php">BestOf</a>
                  <div class="dropdown-content">
                    <a href="best.php?cat_id=1">Andriod</a>
                    <a href="best.php?cat_id=2">IOS</a>
                  </div>
                </div>
              </li>
              <li class="menu_mm">
                <div class="dropdown">
                  <a href="apps.php">Apps</a>
                  <div class="dropdown-content">
                    <a href="apps.php?cat_id=1">Andriod</a>
                    <a href="apps.php?cat_id=2">IOS</a>
                    <a href="apps.php?cat_id=3">Windows</a>
                    <a href="apps.php?cat_id=4">Linux</a>
                  </div>
                </div>
              </li>
              <li class="menu_mm">
                <div class="dropdown">
                  <a href="accessories.php">Accessories</a>
                  <div class="dropdown-content">
                    <a href="accessories.php?cat_id=5">Laptops</a>
                    <a href="accessories.php?cat_id=6">Desktops</a>
                    <a href="accessories.php?cat_id=7">Mobiles</a>
                  </div>
                </div>
              </li>
              <li class="menu_mm">
                <div class="dropdown">
                  <a href="#">More</a>
                  <div class="dropdown-content">
                    <a href="contact.php">Contact</a>
                    <a href="about.php">Aboutus</a>
                  </div>
                </div>
              </li>
              <?php
              if(!isset($_SESSION['username'])){
                ?>
                <li class="menu_mm"><a href="login.php">Login</a></li>
                <?php
              }
              else{
                ?>
                <li class="menu_mm"><a href="#">
                <div class="dropdown">
                  <a href="#"><?php echo $_SESSION['username'] ;?></a>
                  <div class="dropdown-content">
                    <a href="logout.php">Logout</a>
                  </div>
                </div>
                </a></li>
                <?php
              }
              ?>
              </ul>
            </nav>
            <div class="search_container ml-auto">
              <div class="weather">
                <div class="temperature"><?php echo $data->main->temp_max; ?>°C</div>
                <img class="weather_icon" src="images/cloud.png" alt="">
              </div>
              <form action="details.php">
                <input type="search"  class="header_search_input" required="required" placeholder="Type to Search...">
                <img class="header_search_icon" src="images/search.png" alt="">
              </form>
              
            </div>
            <div class="hamburger ml-auto menu_mm">
              <i class="fa fa-bars trans_200 menu_mm" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- Menu -->


  <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
    <div class="logo menu_mm"><a href="index.php">LTT<sub>Leading Tech Tips</sub></a></div>
    <div class="search">
      <form action="#">
        <input type="search" class="header_search_input menu_mm" required="required" placeholder="Type to Search...">
        <img class="header_search_icon menu_mm" src="images/search_2.png" alt="">
      </form>
    </div>
    <nav class="menu_nav">
      <ul class="menu_mm">
      <li class="menu_mm"><a href="#">News &nbsp;&nbsp;</a></li>
      <li class="menu_mm"><a href="#">HowTo &nbsp;&nbsp;</a></li>
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Best Of</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="best.php?cat_id=1">Andriod</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="best.php?cat_id=2">IOS</a>
            </div>
          </li><br>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Apps</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="apps.php?cat_id=1">Andriod</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="apps.php?cat_id=2">IOS</a>
                 <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="apps.php?cat_id=3">Windows</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="apps.php?cat_id=4">Linux</a>
            </div>
          </li><br>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Accessories</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="accessories.php?cat_id=5">Laptops</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="accessories.php?cat_id=6">Destops</a>
                 <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="accessories.php?cat_id=7">Mobiles</a>
            </div>
          </li><br>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">More</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="contact.php">Contact</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="about.php">About</a>
            </div>
          </li><br>
      <?php
      if(!isset($_SESSION['username'])){
        ?>
        <li class="menu_mm"><a href="login.php">Login</a></li>
        <?php
      }
      else{
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Welcome <?php echo $_SESSION['username'] ;?></a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>
        </a></li>
        <?php
      }
      ?>
      </ul>
    </nav>
  </div>
  
  <!-- Home -->
    <?php
  if(isset($_GET['search'])){
  $post_title = $_GET['search'];
  $sql = "select * from post where post_title='".$post_title."'";
  $results = mysqli_query($con, $sql);
  if($row_post =  $results->fetch_assoc())
  {
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
  <div class="home">
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?php echo $slider_img;?>" data-speed="0.8"></div>
    <div class="home_content">
      <div class="post_category trans_200"><a href="post-tag.php?post_tag=<?php echo $post_tag;?> " class="trans_200"><?php echo $post_tag; ?></a></div>
      <div class="post_title"><?php echo $post_title; ?></div>
      <div class="post_author d-flex flex-row align-items-center justify-content-center">
        <div class="author_image"><div><img src="images/author.jpg" alt=""></div></div>
        <div class="post_meta"><a href="#"><?php echo $admin_name; ?></a><span><?php echo $date; ?></span></div>
      </div>
    </div>
  </div>
  
  <!-- Page Content -->

  <div class="page_content">
    <div class="container">
      <div class="row">

        <!-- Post Content -->

        <div class="col-lg-10 offset-lg-1">
          <div class="post_content">

            <!-- Post Body -->

            <div class="post_body">
              <p class="post_p">
                <?php echo $post_desc; ?>
              </p>

              <!-- Post Tags and Share-->
              <div class="tags_share d-flex flex-row align-items-center justify-content-start">
                <div class="post_tags">
                  <ul>
                    <li class="post_tag"><a href="post-tag.php?post_tag=<?php echo $post_tag;?>"><?php echo $post_tag; ?></a></li>
                  </ul>
                </div>
                <div class="post_share ml-sm-auto">
                  <span>share</span>
                  <ul class="post_share_list">
                    <li class="post_share_item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="post_share_item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="post_share_item"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
              </div>

            <div style="padding-left: 45%;"><h3 style="float: left; padding-top: 45px; font-size: 15px; font-weight: 5px;" id="likecount" ></h3>
            <input type="checkbox"  class="checkbox" id="checkbox" style="padding-left: 50%;" />
            <label for="checkbox">
             <svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">
               <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                  <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAB8C2"/>
                 <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5"/>

                 <g id="grp7" opacity="0" transform="translate(7 6)">
                    <circle id="oval1" fill="#9CD8C3" cx="2" cy="6" r="2"/>
                   <circle id="oval2" fill="#8CE8C3" cx="5" cy="2" r="2"/>
                  </g>

                 <g id="grp6" opacity="0" transform="translate(0 28)">
                    <circle id="oval1" fill="#CC8EF5" cx="2" cy="7" r="2"/>
                   <circle id="oval2" fill="#91D2FA" cx="3" cy="2" r="2"/>
                  </g>

                  <g id="grp3" opacity="0" transform="translate(52 28)">
                    <circle id="oval2" fill="#9CD8C3" cx="2" cy="7" r="2"/>
                    <circle id="oval1" fill="#8CE8C3" cx="4" cy="2" r="2"/>
                  </g>

                 <g id="grp2" opacity="0" transform="translate(44 6)">
                    <circle id="oval2" fill="#CC8EF5" cx="5" cy="6" r="2"/>
                    <circle id="oval1" fill="#CC8EF5" cx="2" cy="2" r="2"/>
                  </g>

                  <g id="grp5" opacity="0" transform="translate(14 50)">
                   <circle id="oval1" fill="#91D2FA" cx="6" cy="5" r="2"/>
                    <circle id="oval2" fill="#91D2FA" cx="2" cy="2" r="2"/>
                 </g>

                  <g id="grp4" opacity="0" transform="translate(35 50)">
                    <circle id="oval1" fill="#F48EA7" cx="6" cy="5" r="2"/>
                   <circle id="oval2" fill="#F48EA7" cx="2" cy="2" r="2"/>
                  </g>
        
                 <g id="grp1" opacity="0" transform="translate(24)">
                   <circle id="oval1" fill="#9FC7FA" cx="2.5" cy="3" r="2"/>
                   <circle id="oval2" fill="#9FC7FA" cx="7.5" cy="2" r="2"/>
                 </g>
                </g>
              </svg>
            </label>
                </div>


            </div>
          </div>
        </div>

      </div>
                <?php
            }
          }
          ?>
<!--
      <div class="row">
        <div class="col">
          !-- Similar Posts --
          <div class="similar_posts">
            <div class="grid clearfix">
              <-- Small Card With Image --

               <?php
                      //$get = "select post_tag from post where post_title='".$_GET['search']."' ";
                      //$run =  mysqli_query($con,$get);
                      //if($row = mysqli_fetch_array($run))
                      //{
                      //  $post_tag=$row['post_tag'];
                      //}
                      //$get_post = "select * from post where post_tag='".$post_tag."' limit 4";
    
                      //$run_post = mysqli_query($con,$get_post);
    
                      //while($row_post=mysqli_fetch_array($run_post)){
                      //  $post_id = $row_post['post_id'];
                      //  $post_cat = $row_post['p_cat_id'];
                     //  $cat = $row_post['cat_id'];
                      //  $date = $row_post['date'];
                      //  $admin_name = $row_post['admin_name'];
                     //$post_title = $row_post['post_title'];
                      //$post_tag = $row_post['post_tag'];
                      //$slider_img = $row_post['slider_img'];
                      //$mini_slider_img = $row_post['mini_slider_img'];
                      //$post_mini_desc = $row_post['post_mini_desc'];
                      //  $post_desc = $row_post['post_desc'];
                  ?>
                <div class="card card_small_with_image grid-item">
                  //<img class="card-img-top" src="<?php //echo $slider_img;?>" alt="https://unsplash.com/@jakobowens1">
                  <div class="card-body">
                   // <div class="card-title card-title-small"><a href="post.php?post_id=<?php //echo $post_id;?>//">//<?php// echo $post_title;  ?></a></div>
                   // //<small class="post_meta"><a href="#"><?php //echo $admin_name;  ?></a><span><?php// echo $date;  ?></span></small>
                  </div>
                </div>
              <?php  ?>

              </div>

            </div>
          </div>
          
        </div>
      </div
    -->

      <div class="row">
        <div class="col-lg-6 offset-lg-3">

          <!-- Post Comment -->
        <?php
                if(!isset($_SESSION['username']))
                {
                ?>
          <div class="post_comment">
            <div class="post_comment_title">Post Comment</div>
            <div class="post_comment_form_container">
            <form id="addForm" >
                        <input type="text" id="name" class="comment_input comment_input_name" placeholder="Your Name" required="required" name="name">
                        <input type="email" id="email" class="comment_input comment_input_email" placeholder="Your Email" required="required" name="email">
                        <textarea id="comment" class="comment_text" placeholder="Your Comment" required="required" name="comment"></textarea>
                        <input type="submit" id="save-comment" class="comment_button" name="submit" placeholder="Post Comment">
                      </form>
            </div>
          </div>
          
          <div id="error-message"></div>
                  <div id="success-message"></div>

          <?php
          }
          else
          {
           ?>
           <div class="post_comment">
            <div class="post_comment_title">Post Comment</div>
            <div class="post_comment_form_container">
            <form id="addForm" >
                        <textarea id="comment" class="comment_text" placeholder="Your Comment" required="required" name="comment"></textarea>
                        <input type="submit" id="save-comment" class="comment_button" name="submit" placeholder="Post Comment">
                      </form>
            </div>
          </div>

          <div id="error-message"></div>
          <div id="success-message"></div>
          <?php
          }
          ?>
          <!-- Comments -->
          <div class="comments">
            <div class="comments_title">Comments <span></span></div>
            <div class="comments_container">
              <ul id="comlist" class="comment_list">

              </ul>
            </div>
          </div>

          <!--
          <div class="load_more" id="remove_row">
            <div id="load_more" data-id="<?php //echo $com_id;?>" class="load_more_button text-center trans_200">Load More</div>
          </div>
        -->
        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->

  <footer class="footer">
    <div class="container">
      <div class="row row-lg-eq-height">
        <div class="col-lg-9 order-lg-1 order-2">
          <div class="footer_content">
            <div class="footer_logo"><a href="index.php">LTT<sub>Leading Tech Tips</sub></a></div>
            <div class="footer_social">
              <ul>
                <li class="footer_social_facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li class="footer_social_twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li class="footer_social_pinterest"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li class="footer_social_vimeo"><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                <li class="footer_social_instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li class="footer_social_google"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
              </ul>
            </div>
            <div class="copyright">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by LTT
            </div>
          </div>
        </div>
        <div class="col-lg-3 order-lg-2 order-1">
          <div class="subscribe">
            <div class="subscribe_background"></div>
            <div class="subscribe_content">
              <div class="subscribe_title">Subscribe</div>
              <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=Nirupamvas', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" method="post">
                <input type="email" class="sub_input" placeholder="Your Email" required="required">
                <input type="hidden" value="Nirupamvas" name="uri"/><input type="hidden" name="loc" value="en_US"/>

                <button class="sub_button">
                  <svg version="1.1" id="link_arrow_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="19px" height="13px" viewBox="0 0 19 13" enable-background="new 0 0 19 13" xml:space="preserve">
                    <polygon fill="#FFFFFF" points="12.475,0 11.061,0 17.081,6.021 0,6.021 0,7.021 17.038,7.021 11.06,13 12.474,13 18.974,6.5 "/>
                  </svg>
                </button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </footer>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/masonry/masonry.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/post_nosidebar.js"></script>


<!-- Commnet insertion -->
<script type="text/javascript">
  $(document).ready(function(){
    var post_id=<?php echo $_GET['post_id']; ?>;
    function loadTable(){
      $.ajax({
        url : "php/load-def-comments.php",
        type : "POST",
        data : {post_id : post_id},
        success: function(data){
          $("#comlist").html(data);
        }
      });
    }
    loadTable();

    $("#save-comment").on("click",function(e){
      e.preventDefault();
      var name=$("#name").val();
      var email=$("#email").val();
      var comment=$("#comment").val();
      var post_id=<?php echo $_GET['post_id']; ?>;
      if(name == "" || email == "" || comment == "")
      {
        $("#error-message").html("All fields are required").slideDown();
        $("#success-message").slideUp();
      }
      else{
      $.ajax({
        url : "php/post-comment.php",
        type : "POST",
        data : {name : name, email:email, comment : comment, post_id:post_id},
        success : function(data){
          if(data ==1){
            $("#addForm").trigger("reset");
            $("#success-message").html("Comment Posted.").slideDown();
            $("#error-message").slideUp();
            loadTable();
          }
          else{
              $("#error-message").html("Can't Save Records.").slideDown();
              $("#success-message").slideUp();
          }
        }
      });
    }
    })
  });
</script>


<!-- Loading Comments -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','#load_more',function(event){
      event.preventDefault();

      var com_id = $('#load_more').data('id');
      var post_id = <?php echo $_GET['post_id'];?>;
      $.ajax({
        url : "commentload.php",
        type : "post",
        data : {com_id:com_id,post_id:post_id},
        success:function(response){
          $('#remove_row').remove();
          $('#comment').append(response);
        }
      });
    });
  });
</script>

<!-- Liking posts by users -->
<script type="text/javascript">
  $(document).ready(function(){
  var post_id  = <?php echo $_GET['post_id'];?>;
   function loadLike(){
      $.ajax({
        url : "php/load-likes.php",
        type : "POST",
        data : {post_id : post_id},
        success: function(data){
          $("#likecount").html(data);
        }
      });
    }
    loadLike();

    $(function () {
        $("#checkbox").click(function () {
            if ($(this).prop('checked', true)) {
               var post_id = <?php echo $_GET['post_id'];?>;
            var username = "<?php echo $_SESSION['username'];?>";
            $.ajax({
              url : "php/likes.php",
              type : "post",
              data : {post_id:post_id,username:username},
              success : function(data){
                if(data ==1)
                  loadLike();
                else
                  loadLike();
              }
            });
        
            }
            else if(!$(this).prop('checked')){
            var post_id = <?php echo $_GET['post_id'];?>;
            var username = "<?php echo $_SESSION['username'];?>";
            $.ajax({
              url : "php/likes-delete.php",
              type : "post",
              data : {post_id:post_id,username:username},
              success : function(data){
                if(data ==1)
                  loadLike();
                else
                  loadLike();
              }
            });
            }


        });
    });


});
</script>

</body>
</html>