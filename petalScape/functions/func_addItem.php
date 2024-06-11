<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
}

include_once 'functions/func_adminCheck.php';

include '../constants/config.php';

$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$quantity = addslashes($_POST['quantity']);
$category = addslashes($_POST['category']);
$price = addslashes($_POST['price']);

$fileName = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$folder = "../uploads/" . $fileName;

if (!is_dir('../uploads')) {
    mkdir('../uploads', 0755, true);
}

// Move the uploaded file to the desired folder
if (move_uploaded_file($tempName, $folder)) {
    // Insert data into the database
    $query = "INSERT INTO `products`(`name`, `description`, `price`, `quantity`, `category`, `img`) VALUES ('$name', '$description', '$price', '$quantity', '$category', '$fileName')";
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo "<script>location.href='../adminCatalogue.php'</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Failed to upload file.";
}