<?php

include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/contact.css"/>
  <link rel="stylesheet" href="assets/css/style.css"/>
<style>
  .cart{
    color:black;
  }
  </style>
</head>
<body>

 <!--Navbar-->
 <nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
    <div class="container-fluid">
      <a class="navbar-brand" >Mobile Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    Phones
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="category.php?category_id=1">ioS</a></li>
    <li><a class="dropdown-item" href="category.php?category_id=2">Android</a></li>
  </ul>
</li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Accessories
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="category.php?category_id=3">Cover</a></li>
              <li><a class="dropdown-item" href="category.php?category_id=4">Charger</a></li>
              <li><a class="dropdown-item" href="category.php?category_id=5">Headphones</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">Contact us</a>
          </li>
        </ul>
        <form class="d-flex" role="search" method="Get" action="search.php">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_query">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  
    <div class="dropdown">
      <a href="#" class="nav-item">
        <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-content" id="dropdown-content">
        <a href="login.php" id="login-link">Log In</a>
      </div>
    </div>

      <ul class="navbar-nav">
        <li class="nav-item">
      <a href="cartview.php" class="cart"> <i class="fas fa-shopping-cart"></i></a>
      </li>
    </ul>

      </div>
    </div>
  </nav>
  <!-- Contact -->
  <div class="container">
    <div class="card">
      <h1>Contact Us</h1>
      <div class="contact-info">
        <div class="icon">
          <i class="fas fa-phone"></i>
          <div class="contact-details">
            Phone: +1234567890
          </div>
        </div>
        <div class="icon">
          <i class="fas fa-map-marker-alt"></i>
          <div class="contact-details">
            Address: Rruga Durresit
          </div>
        </div>
        <div class="icon">
          <i class="fas fa-envelope"></i>
          <div class="contact-details">
            Email: mobileshop@gmail.com
          </div>
        </div>
      </div>

      <form action="send_email.php" method="POST">
 
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message" style="vertical-align: top;">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>

   <!--footer-->
   <footer class="footer">
    <div class="con">
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
          <p>Email: mobileshop@gmail.com</p>
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
      <div class="con">
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
</body>
</html>
