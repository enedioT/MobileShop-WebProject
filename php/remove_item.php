<?php
include "connect.php";

if (isset($_POST['id'])) {
  $itemId = $_POST['id'];

  // Remove the item from the cart table
  $sql = "DELETE FROM cart WHERE id = '$itemId'";
  if ($db->query($sql) === TRUE) {
    echo 'success';
  } else {
    echo 'Error removing item from the cart.';
  }
} else {
  echo 'Invalid request.';
}

$db->close();
?>
