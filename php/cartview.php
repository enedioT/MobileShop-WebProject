<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="assets/css/style.css"/>
  <link rel="stylesheet" href="assets/css/cartview.css"/>
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
    <?php
 $sql = "SELECT * FROM cart";
 $result = $db->query($sql);
 $totalAmount = 0; // Initialize the total amount variable
 // Display the items in a table
 if ($result->num_rows > 0) {
     echo '<table>';
     echo '<tr><th>Item</th><th>Quantity</th><th>Price</th><th>Total Price</th><th>Action</th></tr>';
    

     while ($row = $result->fetch_assoc()) {
        $itemtotal=0;
        $quantity = $row['quantity'];
        $price = $row['price'];
        $itemTotal = $quantity * $price;
         echo '<tr>';
         echo '<td>' . $row['product_name'] . '</td>';
         echo '<td>'.$row['quantity'].'</td>';
         echo '<td>$' . $row['price'] . '</td>';
         
         echo '<td>$'.$itemTotal.'</td>';
         echo '<td><button class="remove-btn" onclick="removeItem(' . $row['id'] . ')">Remove</button></td>';
         echo '</tr>';
         $totalAmount += $itemTotal;

        
     }

     echo '</table>';
     echo '<p>Total Amount: $' . $totalAmount . '</p>'; // Display the total amount
     echo '<button class="checkout-btn" onclick="checkout(' . $totalAmount . ')">Checkout</button>';

} else {
     echo 'Your cart is empty.';
   }


 
 // Close the database connection
 $db->close();
 ?>


  
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   

  <script>
    function removeItem(itemId) {
      $.ajax({
        type: 'POST',
        url: 'remove_item.php',
        data: { id: itemId },
        success: function(response) {
          if (response === 'success') {
            $('#item-' + itemId).hide(); // Hide the table row for the removed item
          } else {
            console.error('Error removing item: ' + response);
          }
        },
        error: function(xhr, status, error) {
          console.error('AJAX request error: ' + error);
        }
      });
    }
  </script>
   <script>
    function checkout(totalAmount) {
      $.ajax({
        type: 'POST',
        url: 'checkout.php',
        data: { totalamount: totalAmount },
        success: function(response) {
          // Handle the response from checkout.php
          // For example, you can display a success message or redirect to another page
          window.location.href =  'checkout.php?total_amount=' + totalAmount;
       
         
        },
        error: function(xhr, status, error) {
          // Handle error if the AJAX request fails
          console.error('AJAX request error: ' + error);
        }
      });
    }
  </script>
</body>
</html>

