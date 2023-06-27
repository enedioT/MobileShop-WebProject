<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$DATABASE = 'register';

$db = mysqli_connect($HOSTNAME, $USERNAME, '', $DATABASE);

if ($db) {
    // Connection successful
} else {
    die(mysqli_error($db));
}
?>
