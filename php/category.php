<?php
include "connect.php";

// Retrieve the category parameter from the URL
if (isset($_GET['category_id'])) {
  $category_id = $_GET['category_id'];

  // Retrieve the product data from the database
  $query = "SELECT * FROM products WHERE category_id = '$category_id'";

  // Check if price filter is set and update the query accordingly
  if (isset($_GET['price_filter'])) {
    $price_filter = $_GET['price_filter'];
    if ($price_filter == 'low_to_high') {
      $query .= " ORDER BY price ASC";
    } elseif ($price_filter == 'high_to_low') {
      $query .= " ORDER BY price DESC";
    }
  }

  $result = $db->query($query);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Catalog</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

<link rel="stylesheet" href="assets/css/category.css"/>
  <link rel="stylesheet" href="assets/css/style.css"/>
 



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
<!-- Rest of your HTML code -->

<?php if (isset($_GET['category_id'])): ?>
  <div class="filter d-flex justify-content-end">
      <form action="category.php" method="get" class="form">
        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
        <label for="price_filter">Filter by Price:</label>
        <select name="price_filter" id="price_filter">
          <option value="">All</option>
          <option value="low_to_high">Low to High</option>
          <option value="high_to_low">High to Low</option>
        </select>
        <button type="submit" class="btn btn-dark filter-button">Filter</button>
      </form>
    </div>
  <div class="container">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="col-md-4">
        <div class="product-card">
          <img src="<?php echo $row['images']; ?>" >
          <h3><?php echo $row['name']; ?></h3>
          <p>Price: $<?php echo $row['price']; ?></p>
          
          <form action="addcart.php" method="post">
            <input type="hidden" name="Product_name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="Product_price" value="<?php echo $row['price']; ?>">
            <input type="number" name="quantity" value="1" class="form-control">
            <div class="add-to-cart-btn">
              <button type="submit" name="addCart" class="btn btn-dark">Add to Cart <i class="fas fa-shopping-cart"></i></button>
            </div>
          </form>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

<?php endif; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
