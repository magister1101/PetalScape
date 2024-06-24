<?php
session_start();
error_reporting(0);

include '../constants/config.php';

if (!isset($_SESSION['id'])) {
    echo 'error';
    exit;
}

$userId = $_SESSION['id'];
$itemId = addslashes($_POST['removeId']);

echo $userId;
echo $itemId;

$query = "DELETE FROM `cart` WHERE `accountId` = '$userId' AND `productId` = '$itemId'";
$result = mysqli_query($conn, $query);


echo "<script>location.href='../myCart_Customer.php'</script>";
