<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    session_start();
    include 'constants/config.php';
    include_once 'functions/func_adminCheck.php'; //for admin pages only, checks if the user is an admin
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>

    <?php

    $query = "SELECT * FROM `orders`";
    $result = mysqli_query($conn, $query);

    $orderId = $_GET['orderId'];

    ?>
</head>

<body>

</body>

</html>