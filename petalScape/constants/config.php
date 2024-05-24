<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

$conn = new mysqli($host, $username, $password, $database);

date_default_timezone_set('Asia/Manila'); 

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
