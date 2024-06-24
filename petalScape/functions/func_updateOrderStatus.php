<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
    exit();
}

include '../constants/config.php';

$orderId = $_POST['orderId'];
$newStatus = $_POST['status'];

$updateQuery = "UPDATE `orders` SET `status` = '$newStatus' WHERE `id` = '$orderId'";
if (mysqli_query($conn, $updateQuery)) {
    echo "<script>location.href='../orderPage.php?orderId=$orderId&message=changed'</script>";
} else {
    echo "<script>location.href='../orderPage.php.php?orderId=$orderId&message=error'</script>";
}
