<?php

session_start();
$id = $_SESSION['id'];
include '../constants/config.php';
$query = "SELECT * FROM `accounts` where `id` = '$id'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($result);
$adminCheck = $rows["isAdmin"];
if ($adminCheck == 1){
    echo "<script>location.href='../adminCatalogue.php'</script>";
}
else {
    echo "<script>location.href='../profile.php'</script>";
}
