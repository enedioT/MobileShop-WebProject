<?php
include "connect.php";

if (isset($_POST['addCart'])) {
    $productName = $_POST['Product_name'];
    $productPrice = $_POST['Product_price'];
    $quantity = $_POST['quantity'];

    // Retrieve the product details from the database based on the product name
    $query = "SELECT id, name,price FROM products WHERE name = '$productName'";
  
    $result = $db->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productId = $row['id'];
        $productName = $row['name'];

        // Insert the product into the cart table
        $query = "INSERT INTO cart (id, product_name, quantity,price) VALUES ('$productId', '$productName', '$quantity',' $productPrice')";
        $result = $db->query($query);

        if ($result) {
            // Redirect back to the home page with success message
            header("Location: home.php?message=success");
            exit();
        } else {
            // Redirect back to the home page with error message
            header("Location: home.php?message=error");
            exit();
        }
    } else {
        // Redirect back to the home page with not found message
        header("Location: home.php?message=notfound");
        exit();
    }

    $db->close();
}
?>

