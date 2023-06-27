<?php
include "connect.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $customerName = $_POST['customer_name'];
  $customerSurname = $_POST['customer_surname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $totalAmount = $_GET['total_amount'];
  $orderDate = $_POST['order_date'];
  $paymentMethod = $_POST['payment_method'];
  $transactionId = $_POST['transaction_id'];

  // Insert data into the orders table
  $insertOrderQuery = "INSERT INTO orders (customer_name, customer_surname, email, address, total_amount, order_date) VALUES ('$customerName', '$customerSurname', '$email', '$address', '$totalAmount', '$orderDate')";
  if ($db->query($insertOrderQuery) === true) {
    $orderId = $db->insert_id;

    // Insert data into the payments table
    $insertPaymentQuery = "INSERT INTO payments (order_id, payment_method, transaction_id) VALUES ('$orderId', '$paymentMethod', '$transactionId')";
    if ($db->query($insertPaymentQuery) === true) {
      // Payment and order inserted successfully
      // You can perform any additional actions here (e.g., send email notifications, update inventory, etc.)
      echo 'Payment and order inserted successfully!';
      // Remove items from the cart
      $deleteCartItemsQuery = "DELETE FROM cart";
      if ($db->query($deleteCartItemsQuery) === true) {
          echo 'Items removed from the cart!';
      } else {
          echo 'Error removing items from the cart: ' . $db->error;
      }

    } else {
      // Error inserting payment
      echo 'Error inserting payment: ' . $db->error;
    }
  } else {
    // Error inserting order
    echo 'Error inserting order: ' . $db->error;
  }

  // Close the database connection
  $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Include necessary CSS and other dependencies -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="assets/css/style.css"/>
  <link rel="stylesheet" href="assets/css/checkout.css"/>
  <link rel="stylesheet" href="assets/css/style.css"/>
  
</head>
<body>
    <!--navbar -->
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
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Contact us</a>
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
      <a href="cartview.php"> <i class="fas fa-shopping-cart"></i></a>
      </li>
    </ul>

      </div>
    </div>
  </nav>
  <!-- Your HTML code for the checkout form goes here -->
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h2>Shipping Address</h2>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <label for="customer_name">First Name:</label>
              <input type="text" id="customer_name" name="customer_name" required>
              <br>
              <label for="customer_surname">Last Name:</label>
              <input type="text" id="customer_surname" name="customer_surname" required>
              <br>
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" required>
              <br>
              <label for="address">Address:</label>
              <textarea id="address" name="address" required></textarea>
              <br>
              <label for="order_date">Date:</label>
              <input type="date" id="order_date" name="order_date" required>
              <br>
            </div>
          </div>
        </div>
      
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h2>Payment Information</h2>
            </div>
            <div class="card-body">
             
              <label for="payment_method">Payment Method:</label>
              <select id="payment_method" name="payment_method" required>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
              </select>
              <br>
              <label for="transaction_id">Transaction ID:</label>
              <input type="text" id="transaction_id" name="transaction_id" required>
              <br>

              <input type="hidden" name="total_amount" id="total_amount" value="">
              <input type="submit" value="Submit" >
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--footer -->
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
  

  <!-- Include necessary JavaScript and jQuery dependencies -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script stc="assets/js/checkout.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
