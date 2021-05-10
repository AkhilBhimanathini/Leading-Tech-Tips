<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <title>LTT | SignUp and SignIn</title>
       <!-- add icon link -->
  <link rel = "icon" href =  "images/Capture4.svg" type = "image/x-icon"> 
  <link rel="stylesheet" type="text/css" href="styles/style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    #success-ret{
    background: #DEF1D8;
    color: green;
    padding: 10px;
    margin: 10px;
    display: none;
    position: absolute;
    right: 15px;
    top : 15px;
  }
  #error-ret{
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

  
  </head>
  <body>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <!-- signin-->
          <form id="logform" class="sign-in-form"> 
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="username" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Password" />
            </div>
            <a href="#" style="text-decoration: none; color: black;">Forgot Your Password</a>
            <input id="sublogin" type="submit" name="login" class="btn solid" name="signin" >

          <div id="error-ret"></div>
          <div id="success-ret"></div>
          </form>

          <!-- signup-->
          <form id="addForm" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="name" name="username" placeholder="Name" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
                <input type="email"  id ="email" name="email" placeholder="Email">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
            <input type="password" id="pass" name="password" placeholder="Password">
            </div>
            <input type="submit" id="save-data" class="btn" class="btn btn-info" name="signup">

          <div id="error-message"></div>
          <div id="success-message"></div>
          </form>


        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Hello, Friend!</h3>
            <p>
              Enter your details and start journey with us
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="images/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Welcome Back!</h3>
            <p>
              To keep connected with us please login with your personal info
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>

          <img src="images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="js/app.js"></script>
     <script type="text/javascript">  
        /* Function to Generat Captcha */  
        function GenerateCaptcha() {  
            var chr1 = Math.ceil(Math.random() * 10) + '';  
            var chr2 = Math.ceil(Math.random() * 10) + '';  
            var chr3 = Math.ceil(Math.random() * 10) + '';  
  
            var str = new Array(4).join().replace(/(.|$)/g, function () { return ((Math.random() * 36) | 0).toString(36)[Math.random() < .5 ? "toString" : "toUpperCase"](); });  
            var captchaCode = str + chr1 + ' ' + chr2 + ' ' + chr3;  
            document.getElementById("txtCaptcha").value = captchaCode  
        }  
  
        /* Validating Captcha Function */  
        function ValidCaptcha() {  
            var str1 = removeSpaces(document.getElementById('txtCaptcha').value);  
            var str2 = removeSpaces(document.getElementById('txtCompare').value);  
  
            if (str1 == str2) return true;  
            return false;  
        }  
  
        /* Remove spaces from Captcha Code */  
        function removeSpaces(string) {  
            return string.split(' ').join('');  
        }  
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      $("#save-data").on("click",function(e){
      e.preventDefault();
      var name=$("#name").val();
      var email=$("#email").val();
      var password=$("#pass").val();
      if(name == "" || email == "" || password == "")
      {
        $("#error-message").html("All fields are required").slideDown();
        $("#success-message").slideUp();
      }
      else if(password.length <8){
        $("#error-message").html("Password >= 8").slideDown();
        $("#success-message").slideUp();
      }
      else{
      $.ajax({
        url : "php/register.php",
        type : "POST",
        data : {name : name, email:email, password : password},
        success : function(data){
          if(data ==1){
            $("#addForm").trigger("reset");
            $("#success-message").html("Sucesssfully Registered").slideDown();
            $("#error-message").slideUp();
          }
          else if(data==0){
              $("#error-message").html("Can't Save Records.").slideDown();
              $("#success-message").slideUp();
          }
        }
      });
    }
    })
    });
    </script>


    <script type="text/javascript">
      $(document).ready(function(){

      $("#sublogin").on("click",function(e){
      e.preventDefault();
      var name=$("#username").val();
      var password=$("#password").val();
      if(name == "" || password == "")
      {
        $("#error-ret").html("All fields are required").slideDown();
        $("#success-ret").slideUp();
      }
      else{
      $.ajax({
        url : "php/userlogin.php",
        type : "POST",
        data : {name : name, password : password},
        success : function(data){
          if(data ==1){
            $("#logform").trigger("reset");
            $(location).attr('href', 'index.php');

          }
          else{
              $("#error-ret").html("Invalid Credentials").slideDown();
              $("#success-ret").slideUp();
          }
          
        }
      });
    }
    })
      });
    </script>
  </body>
</html>
