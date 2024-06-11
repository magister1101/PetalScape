<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
}

include_once 'functions/func_adminCheck.php';

include '../constants/config.php';

$name = addslashes($_POST['categoryName']);

$query = "INSERT INTO `category`(`name`) VALUES ('$name')";
$insert = mysqli_query($conn, $query);

if ($insert) {
    echo "<script>location.href='../adminCatalogue.php'</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
