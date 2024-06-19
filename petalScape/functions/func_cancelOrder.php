<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
}

include '../constants/config.php';

if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $accountId = $_SESSION['id'];

    // Update the order status to 4 (Cancelled)
    $updateQuery = "UPDATE `orders` SET `status` = 4 WHERE `productId` = '$productId' AND `accountId` = '$accountId'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo "<script>alert('Order has been cancelled successfully.'); location.href='../profile.php?section=view-orders';</script>";
    } else {
        echo "<script>alert('Failed to cancel the order.'); location.href='../profile.php?section=view-orders';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); location.href='../profile.php?section=view-orders';</script>";
}
?>
