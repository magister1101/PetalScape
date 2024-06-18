<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    session_start();
    include 'constants/config.php';
    include_once 'functions/func_adminCheck.php'; //for admin pages only, checks if the user is an admin
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/admindashboard.css">
    <style>
        .admin-bg{
            background-image: url('img/admin-bg.png');
            background-repeat: no-repeat;
            height: 100vh;
            width: 25%;
       
        }
    </style>
</head>

<body>

<div class="main-container">
    <div class="admin-bg">
        <?php
        include 'constants/sidebar.php'
        ?>
    </div>

    <div class="adminDashboard-cont">
        <div class="dashboard-txt">
            <h1>Dashboard</h1>
        </div>
        <div class="main-dashboard">
            <div class="revenue-orders-user-cont">
                <div class="revenue"> <!-- place holder lang value nito muna -->
                    <p>PHP100,000</p>
                    <p class="total-rev-txt">Total Revenue</p>
                    <p class="total-percent-txt">22.45%</p>
                </div>
                <div class="orders"> <!-- place holder lang value nito muna -->
                    <p>2,101</p>
                    <p class="total-order-txt">Orders</p>
                    <p class="total-percent-txt">22.45%</p>
                </div>
                <div class="users"> <!-- place holder lang value nito muna -->
                    <p>2,101</p>
                    <p class="total-user-txt">Users</p>
                    <p class="total-percent-txt">22.45%</p>
                </div>
            </div>
                

            <div class="total-income">
                    <!-- lagyan munang place holder -->
                </div>

                <div class="best-sellers">
                    <!-- lagyan munang place holder -->
                </div>

                <div class="recent-orders">
                    <h2>Recent Orders</h2>
                    <table class="tbl-recent-order">
                        <tr>
                            <td>Order ID</td>
                            <td>Product</td>
                            <td>Quantity</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                    </table>
                    <div class="recent-order-details-cont">
                        <p class="orderId">#532002</p> <p class="product">LiliesBlush</p> <p class="quantity">2</p> <p class="date">June 3, 2024</p> <p class="status">Compelted</p> <a href="functions/func_manageOrder">Edit</a>
                    </div>
                   
                </div>

        </div>
    </div>
</div>
    
</body>

</html>