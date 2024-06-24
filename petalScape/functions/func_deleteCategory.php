<?php
session_start();
error_reporting(0);

include '../constants/config.php';

if (!isset($_SESSION['id'])) {
    echo "failed";
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the category name to be deleted
    $categoryQuery = "SELECT `name` FROM `category` WHERE `id`='$id'";
    $categoryResult = mysqli_query($conn, $categoryQuery);
    if ($categoryResult && mysqli_num_rows($categoryResult) > 0) {
        $categoryRow = mysqli_fetch_assoc($categoryResult);
        $categoryName = $categoryRow['name'];

        // Ensure "No category" exists
        $noCategoryQuery = "SELECT `id` FROM `category` WHERE `name`='No category'";
        $noCategoryResult = mysqli_query($conn, $noCategoryQuery);
        if (!$noCategoryResult || mysqli_num_rows($noCategoryResult) == 0) {
            $createNoCategoryQuery = "INSERT INTO `category` (`name`) VALUES ('No category')";
            mysqli_query($conn, $createNoCategoryQuery);
        }

        // Update items with the deleted category to "No category"
        $updateItemsQuery = "UPDATE `products` SET `category`='No category' WHERE `category`='$categoryName'";
        mysqli_query($conn, $updateItemsQuery);

        // Delete the category
        if ($categoryName !== 'No category') {
            $deleteCategoryQuery = "DELETE FROM `category` WHERE `id`='$id'";
            if (mysqli_query($conn, $deleteCategoryQuery)) {
                echo "success";
            } else {
                echo "failed";
            }
        } else {
            echo "failed";
        }
    } else {
        echo "failed";
    }
} else {
    echo "failed";
}
?>
