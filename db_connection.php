<?php
// Database credentials
$host = 'mysql';
$user = 'my_user';
$password = 'my_password';
$database = 'my_database';


// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
