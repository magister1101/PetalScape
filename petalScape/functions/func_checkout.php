<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
}

$id = $_SESSION['id'];

include '../constants/config.php';

// Contact info
$name = addslashes($_POST['firstName'] . " " . $_POST['lastName']);
$number = addslashes($_POST['phoneNumber']);
$email = addslashes($_POST['email']);

// Address
$address = addslashes($_POST['streetAddress'] . ", " . $_POST['city'] . ", " . $_POST['state'] . ", " . $_POST['country'] . ", " . $_POST['zip']);

// Payment method
$modeOfPayment = addslashes($_POST['payment']);

// Message
$message = addslashes($_POST['message']);

// Get current date and time
$orderDate = date('Y-m-d H:i:s');

// Handle GCASH payment screenshot upload
$gcashImage = null;
if ($modeOfPayment == 'gcash') {

    $gcashImage = $_FILES["gcashFile"]["name"];
    $tempName = $_FILES["gcashFile"]["tmp_name"];
    $folder = "../uploads/" . $gcashImage;

    if (!is_dir('../uploads')) {
        mkdir('../uploads', 0755, true);
    }
}



if (move_uploaded_file($tempName, $folder)) {
} else {
    echo "failed";
}

// Insert data into the database
$query = "SELECT * FROM `cart` WHERE accountId = $id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['productId'];
        $quantity = $row['quantity'];

        // Insert each item as a new row in the orders table
        $orderQuery = "INSERT INTO `orders`(`accountId`, `productId`, `name`, `quantity`, `email`, `address`, `contactNumber`, `modeOfPayment`, `message`, `orderDate`, `receipt`) VALUES ('$id', '$productId', '$name', '$quantity', '$email', '$address', '$number', '$modeOfPayment', '$message', '$orderDate', '$gcashImage')";
        mysqli_query($conn, $orderQuery);
    }

    // Clear the cart after placing the order
    $clearCartQuery = "DELETE FROM `cart` WHERE accountId = $id";
    mysqli_query($conn, $clearCartQuery);

    echo "<script>location.href='../myCart_Customer.php?message=checkout'</script>";
} else {
    echo "Failed to retrieve cart items or cart is empty.";
}
