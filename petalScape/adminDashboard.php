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
</head>

<body>
    <div class="main-dashboard">
        <div class="revenue"> <!-- place holder lang value nito muna -->
            <p>PHP100,000</p>
            <p>Total Revenue</p>
            <p>22.45%</p>
        </div>

        <div class="orders"> <!-- place holder lang value nito muna -->
            <p>2,101</p>
            <p>Orders</p>
            <p>22.45%</p>
        </div>

        <div class="users"> <!-- place holder lang value nito muna -->
            <p>2,101</p>
            <p>Users</p>
            <p>22.45%</p>
        </div>

        <div class="total-income">
            <!-- lagyan munang place holder -->
        </div>

        <div class="best-sellers">
            <!-- lagyan munang place holder -->
        </div>

        <div class="recent-orders">
            <div>
                <p class="orderId">#532002</p> <p class="product">LiliesBlush</p> <p class="quantity">2</p> <p class="date">June 3, 2024</p> <p class="status">Compelted</p> <a href="functions/func_manageOrder">Edit</a>
            </div>
        </div>

    </div>
</body>

</html>