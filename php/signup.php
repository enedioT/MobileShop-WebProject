<?php
session_start();
include "connect.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/9cfc78147e.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Mukta&family=Open+Sans&family=Overpass&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="assets/css/signup.css"/>


  </style>
  <title>Sign up</title>
</head>
<body >
  <div class = "container py-5">
    <div class = "row d-flex justify-content-center align-items-center">
      <div class = "col-xs-5 col-md-7 col-lg-7 d-flex align-items-center">
        <div class = " card card-body  p-4 p-lg-7 text-black "
            style="border: 1px solid; padding: 10px; --bs-card-border-radius: none">
            <form name = "SignUp" action="" method = "POST">
            <div class = "d-flex align-items-center justify-content-center mb-3 pb-1 ">
            <span class="h1 mb-0" >Mobile Shop</span>
            </div>
            <h5 class="mb-3 pb-3">Register</h5>
            <div class = "form-outline mb-4">
              <input name = "name" class="form-control form-control-lg" minlength='3' required>
              <label class = "formLabel" name = "nname">First Name</label>
            </div>
            <div class = "form-outline mb-4">
              <input name = "surname" class = "form-control form-control-lg"  minlength='3' required>
              <label class = "formLabel" name = "sname">Last Name</label>
            </div>
            <div class = "form-outline mb-4">
              <input name = "email" class = "form-control form-control-lg">
              <label class = "formLabel" name = "email">Email</label>
              <br>
              
            </div>
            <div class = "form-outline mb-4">
              <input name = "user" class = "form-control form-control-lg">
              <label class = "formLabel" name = "username">Username</label>
              <br>
            </div>
           <div class="form-outline mb-4">
            <input type = "password" name = "pass" class = "form-control form-control-lg"  minlength='8' required>
              <label class = "formLabel" name = "Password">Password</label>
            </div>
            <div class = "form-outline mb-4">
              <input type = "password" name = "conpass" class = "form-control form-control-lg"  minlength='8' required>
              <label class = "formLabel" name = "Confirm_password">Confirm Password</label>

            </div>
            <div class = "form-outline mb-4">
              <select name = "country" id="country" class="selectBox" required>
                <option value="" selected disabled>Select country</option>
              </select>
              <input type="phone" id="phone" name="phonenr" placeholder="Enter your phone number">
              <br>
              <label class = "formLabel" name = "phone">Phone Number</label>
              <br>
              <?php include "validateSignup.php"?>
            </div>
       
              <div class = "pt-1 mb-4 text-center">
                <button class = "btn btn-default btn-dark btn-lg btn-block "
                        type = "submit" name = "signUp" >Register</button>
              </div>
             <script src="assets/js/ApI.js">
          </form>
        </div>
      </div>
    </div>
  </div>

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