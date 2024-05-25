<?php
session_start();

include '../constants/config.php';



$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$quantity = addslashes($_POST['quantity']);
$category = addslashes($_POST['category']);

$fileName = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$folder = "../uploads/" . $fileName;

$query = "INSERT INTO `products`(`name`, `description`, `quantity`, `category`, `img`) VALUES ('$name','$description','$quantity','$category', '$fileName')";
$insert = mysqli_query($conn, $query);



echo "<script>location.href='../adminCatalogue.php'</script>";