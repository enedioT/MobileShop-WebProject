<?php

include "connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel = "stylesheet" href = "../assets/css/login.css">
  <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
  rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
  crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap"
  rel="stylesheet">
  <link rel="stylesheet" href="assets/css/login.css"/>

  <title>Login Page</title>
</head>
<body>

<section>
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col col-xl-10">
          <div class="card" style="border: 1px solid; padding: 10px; --bs-card-border-radius: none">
            <div class="row g-0">
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form name = "LoginPage" action = "" method = "post">
  
                    <div class="d-flex align-items-center justify-content-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">Mobile Shop</span>
                    </div>
  
                    <h5 class="mb-3 pb-3" >Sign in to your account</h5>
                    <div class="form-outline mb-4">
                      <input type="username" id="form2Example17" name = "username"
                      class="form-control form-control-lg" style="border-radius:3"/>
                      <label class="formReq form-label" for="form2Example17">Username</label>
                    </div>
  
                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" name = "password"
                      class="form-control form-control-lg" style="border-radius:3" />
                      <label class="formReq form-label" for="form2Example27">Password</label>
                      <br>
                      <?php include "validateDataLogin.php"?>
                    </div>
  
                    <div class="pt-1 mb-4 align-items-center justify-content-center">
                      <button class="btn btn-default btn-dark   btn-lg btn-block"
                      name = "loginButton" type="submit">Login</button>
                    </div>
  
                    <!--<a class="small text-muted" href="#!">Forgot password?</a>-->
                    <p class="formReq mb-5 pb-lg-2" style="font-family:Poppins;">Don't have an account? <a href= "signup.php" id="reg"
                        style="color: black; font-family: Poppins;">Register here</a></p>
                    <a href="#!" class="link small text-muted">Terms of use.</a>
                    <a href="#!" class="link small text-muted">Privacy policy</a>
                  </form>
                </div>
              </div>
              <div class="col-md-6 col-lg-5">
                <div class="card-image">
                  <img src="assets/images/logo.jpg" alt="Image" class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <img src="assets/images/logo.jpg" class="footer-logo" alt="Image 3" >
        </div>
        
        <div class="col-md-3">
          <h5>Categories</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="phones">Phones</a></li>
            <li><a href="#" class="acc">Accessories</a></li>
          </ul>
        </div>
        
        <div class="col-md-3">
          <h5>Contact Us</h5>
          <p>Email: info@example.com</p>
          <p>Phone: +1 123-456-7890</p>
        </div>
        
        <div class="col-md-3">
          <h5>Follow Us</h5>
          <ul class="list-inline social-icons">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook" id="icon"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter" id="icon"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram" id="icon"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>&copy; 2023 Your Company. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
 <script>
  
</body>
</html>