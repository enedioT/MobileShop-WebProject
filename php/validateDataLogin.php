<?php

include "connect.php";

if (isset($_POST['loginButton'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform database query to check username and password
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $count = mysqli_num_rows($result);
    $result=$result->fetch_assoc();

    if ($count == 1) {
    
      $_SESSION['user']=$result;
      $_SESSION['username']=$username;
      $_SESSION['password']=$password;
    
     
     
      // Username and password match, redirect to home.php
        header("Location: home.php");
        exit();
    } else {
      ?>
      <i class="fa-solid fa-circle-info" id="warningIcon"></i>
      <label style = "color:red;" id="warningText">Username or password is invalid</label>
    <?php
    }
}
?> 