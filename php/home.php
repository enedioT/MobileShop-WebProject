<?php
session_start();

if (isset($_POST[ 'login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  

}

$message = $_GET['message'] ?? ''; // Get the message query parameter

if ($message === 'success') {
    echo '<script>alert("Product added to cart successfully!");</script>';
} elseif ($message === 'error') {
    echo '<script>alert("Error adding product to cart.");</script>';
} elseif ($message === 'notfound') {
    echo '<script>alert("Product not found in the database.");</script>';
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
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
  
    <?php if (isset($_SESSION['username'])) { ?>
    <div class="dropdown">
        <a href="#" class="nav-item">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-content" id="dropdown-content">
            <span>Welcome, <?php echo $_SESSION['username']; ?></span>
            <a href="logout.php" id="logout-link">Log Out</a>
        </div>
    </div>
<?php } else { ?>
    <div class="dropdown">
        <a href="#" class="nav-item">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-content" id="dropdown-content">
            <a href="login.php" id="login-link">Log In</a>
        </div>
    </div>
<?php } ?>


      <ul class="navbar-nav">
        <li class="nav-item">
      <a href="cartview.php" class="cart"> <i class="fas fa-shopping-cart"></i></a>
      </li>
    </ul>

      </div>
    </div>
  </nav>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
  <div class="carousel-item active">
    <img src="assets/images/14pro.png" alt="Image 1" class="d-block w-100 carousel-img">
    <button class="carousel-button">Shop now</button>
  </div>
  <div class="carousel-item">
    <img src="assets/images/s23.jpeg" alt="Image 2" class="d-block w-100 carousel-img">
    <button class="carousel-button">Shop now</button>
  </div>
  <div class="carousel-item">
    <img src="assets/images/xiaomi.jpeg" alt="Image 3" class="d-block w-100 carousel-img">
    <button class="carousel-button">Shop now</button>
  </div>
</div>


    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  



   <!--footer-->
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
 <script src="assets/js/home.js"></script>
</body>
</html>
