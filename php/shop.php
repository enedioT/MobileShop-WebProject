<?php
include "connect.php";



// Retrieve products with category names
$query = "SELECT p.name, p.price, p.description, c.name AS category_name
          FROM products p
          JOIN categories c ON p.category_id = c.id";
$result = $db->query($query);

// Display the products
// Display the products
while ($row = $result->fetch_assoc()) {
    echo '<div>';
    echo '<h3>' . $row['name'] . '</h3>';
    echo '<img src="assets/images/14pro.png" alt="' . $row['name'] . '">';
    echo '<p>Price: $' . $row['price'] . '</p>';
    echo '<p>' . $row['description'] . '</p>';
    echo '<p>Category: ' . $row['category_name'] . '</p>';
    echo '</div>';
}

// Close the database connection
$db->close();
?>
