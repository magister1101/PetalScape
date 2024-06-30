<?php
session_start();
include 'constants/config.php';

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $query = "SELECT productId, status FROM orders WHERE accountId = '$userId' ORDER BY orderDate DESC";
    $result = mysqli_query($conn, $query);

    $orderStatuses = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['productId'];
        $status = $row['status'];

        // Fetch product name for better readability (if needed)
        $productQuery = "SELECT name FROM products WHERE id = '$productId'";
        $productResult = mysqli_query($conn, $productQuery);
        $productName = mysqli_fetch_assoc($productResult)['name'];

        $orderStatuses[] = "Product: $productName - Status: $status";
    }

    echo json_encode($orderStatuses);
}
?>
