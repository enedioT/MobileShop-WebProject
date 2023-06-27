<?php
include "connect.php";
?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/search.css"/>

  
</head>
<body>

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
            <a class="nav-link active" href="#">Contact us</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
        <i class="fas fa-shopping-cart"></i>
      </li>
    </ul>

      </div>
    </div>
</nav>
<?php
    if (isset($_GET['search_query'])) {
  $searchQuery = $_GET['search_query'];

  // Perform the SQL query to fetch the matching products based on the search query
  $sql = "SELECT * FROM products WHERE name LIKE '%$searchQuery%'";
  $result = mysqli_query($db, $sql);
echo '<div class="container">';
if (mysqli_num_rows($result) > 0) {
    // Display the search results
    while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="col-md-4">';
  echo '<div class="product-card">';
  echo '<img src="' . $row['images'] . '" >';
  echo '<h3>' . $row['name'] . '</h3>';
  echo '<p>Price: $' . $row['price'] . '</p>';
  echo '<p>' . $row['description'] . '</p>';
  echo '<form action="addcart.php" method="post">';
  echo '<input type="hidden" name="Product_name" value="' . $row['name'] . '">';
  echo '<input type="hidden" name="Product_price" value="' . $row['price'] . '">';
  echo '<div class="add-to-cart-btn">';
  echo '<button type="submit" name="addCart" class="btn btn-dark">Add to Cart <i class="fas fa-shopping-cart"></i></button>';
  echo '</form>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}

echo '</div>'; // Close container

// Close the database connection
$db->close();
}
else{
    echo "No devices found" ;
}
}
?>
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