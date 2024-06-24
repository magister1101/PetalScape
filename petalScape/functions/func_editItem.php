<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
    exit();
}

include '../constants/config.php';

$id = $_POST['id'];
$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$category = addslashes($_POST['category']);

// Handle file upload if a new image is uploaded
if (!empty($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];
    $target = "../uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $updateQuery = "UPDATE `products` SET `name`='$name', `description`='$description', `price`='$price', `quantity`='$quantity', `category`='$category', `image`='$image' WHERE `id`='$id'";
    } else {
        echo "<script>alert('Failed to upload image'); location.href='../adminCatalogue.php'</script>";
        exit();
    }
} else {
    $updateQuery = "UPDATE `products` SET `name`='$name', `description`='$description', `price`='$price', `quantity`='$quantity', `category`='$category' WHERE `id`='$id'";
}

if (mysqli_query($conn, $updateQuery)) {
    echo "<script>alert('Product updated successfully'); location.href='../adminCatalogue.php'</script>";
} else {
    echo "<script>alert('Failed to update product'); location.href='../adminCatalogue.php'</script>";
}
