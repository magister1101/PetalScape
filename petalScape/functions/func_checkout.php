<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
}

$id = $_SESSION['id'];

include '../constants/config.php';

//contact info
$name = addslashes($_POST['firstName'] . " " . $_POST['lastName']);
$number = addslashes($_POST['phoneNumber']);
$email = addslashes($_POST['email']);

//address
$address = addslashes($_POST['streetAddress'] . ", " . $_POST['city'] . ", " . $_POST['state'] . ", " . $_POST['country'] . ", " . $_POST['zip']);

//payment method
$modeOfPayment = addslashes($_POST['payment']);

//message
$message = addslashes($_POST['message']);

//Get cart items for the user
$query = "SELECT * FROM `cart` WHERE accountId = $id";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['productId'];
        $quantity = $row['quantity'];

        //Insert each item as a new row in the orders table
        $orderQuery = "INSERT INTO `orders`(`accountId`, `productId`, `name`, `quantity`, `email`, `address`, `contactNumber`, `modeOfPayment`, `message`) VALUES ('$id', '$productId', '$name', '$quantity', '$email', '$address', '$number', '$modeOfPayment', '$message')";
        mysqli_query($conn, $orderQuery);
    }

    //Clear the cart after placing the order
    $clearCartQuery = "DELETE FROM `cart` WHERE accountId = $id";
    mysqli_query($conn, $clearCartQuery);

    echo "<script>location.href='../order_confirmation.php'</script>";
} else {
    echo "Failed to retrieve cart items or cart is empty.";
}
