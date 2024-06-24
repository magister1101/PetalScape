<?php
session_start();
error_reporting(0);

include '../constants/config.php';

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    $query = "UPDATE `products` SET `archive` = 0 WHERE id = '$itemId'";
    $update = mysqli_query($conn, $query);
    
     echo "<script>location.href='../adminCatalogue.php?message=updated'</script>";

}
