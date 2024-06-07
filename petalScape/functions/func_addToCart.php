<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
}

include '../constants/config.php';

$userId = $_SESSION['id'];
$itemId = addslashes($_POST['itemId']);
$quantity = addslashes($_POST['quantity']);

$checkQuery = "SELECT * FROM `cart` WHERE `accountId` = '$userId' AND `productId` = '$itemId'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // If it exists, update the quantity by adding the specified amount
    $updateQuery = "UPDATE `cart` SET `quantity` = `quantity` + '$quantity' WHERE `accountId` = '$userId' AND `productId` = '$itemId'";
    $updateResult = mysqli_query($conn, $updateQuery);
} else {
    // If it does not exist, insert a new row with the given quantity
    $insertQuery = "INSERT INTO `cart`(`accountId`, `productId`, `quantity`) VALUES ('$userId','$itemId','$quantity')";
    $insertResult = mysqli_query($conn, $insertQuery);
}

echo "<script>location.href='../catalogue.php'</script>";
