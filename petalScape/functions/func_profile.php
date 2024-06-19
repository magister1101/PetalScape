<?php

session_start();


if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    include '../constants/config.php';
    $query = "SELECT * FROM `accounts` where `id` = '$id'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_assoc($result);
    $adminCheck = $rows["isAdmin"];

    if ($adminCheck == 1) {
        echo "<script>location.href='../adminDashboard.php'</script>";
    } else {
        echo "<script>location.href='../profile.php?section=manage-account'</script>";
    }
}
else {
    echo "<script>location.href='../login.php'</script>";
}
