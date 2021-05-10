<?php
session_start();
include 'includes/weather.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LTT | Aboutus</title>
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
<link rel="stylesheet" type="text/css" href="styles/regular.css">
<link rel="stylesheet" type="text/css" href="styles/regular_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/post_nosidebar.css">
<link rel="stylesheet" type="text/css" href="styles/post_nosidebar_responsive.css">
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
							<li class="menu_mm"><a href="best.php">BestOf</a></li>
							<li class="menu_mm">
							<div class="dropdown">
								<a href="apps.php">Apps</a>
  							<div class="dropdown-content">
						    	<a href="#">Andriod</a>
						    	<a href="#">IOS</a>
						    	<a href="#">Windows</a>
						    	<a href="#">Linux</a>
						  	</div>
							</div></li>
							<li class="menu_mm"><a href="accessories.php">Accessories</a></li>
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
							<form action="#">
								<input type="search" class="header_search_input" required="required" placeholder="Type to Search...">
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

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/tri.jpg" data-speed="0.8"></div>
		<div class="home_content">
			<div class="post_title"><img src="images/Capture4.svg" height="100px"><h1>About LTT</h1></div>
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
							<p class="post_p">LTT is a Consumer technology website aimed at helping people understand and use technology in a better way. We serve the hottest tech news in the town through our website, help our audience make a better decision through our detailed reviews on the tech that actually matters most of the end consumers. It is used to share the information about the technology updates. It also contains the info about the newly released electronic gadgets.</p>

						</div>
					</div>
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
<script src="js/regular.js"></script>
</body>
</html>