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
    <link rel="stylesheet" href="css/adminOrders.css">
    <style>
        .admin-bg{
            background-image: url('img/admin-bg.png');
            background-repeat: no-repeat;
            height: 100vh;
            width: 25%;
       
        }
    </style>

    <?php

    $query = "SELECT * FROM `orders`";
    $result = mysqli_query($conn, $query);


    ?>
</head>

<body>
    <div class="main-container">

        <div class="admin-bg">
            <?php
            include 'constants/sidebar.php'
            ?>
        </div>
        
        <div class="admin-orders-cont">
            <div class="order-list-txt">
                <h2>Order List</h2>
            </div>
             
            
            <div class="recent-orders-cont">
                <div class="recent-order-txt">
                    <h2>Recent Orders</h2>
                </div>
              
            <div class="recent-order-info">
            <div class="#">
                    <table class="recent-order-info-header">
                            <tr>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                                    
                        <?php
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $orderId = $rows['id'];
                            $productId = $rows['productId'];
                            $quantity = $rows['quantity'];
                            $status = $rows['status'];
                        ?>
                         </table>
                         
                            <div class="#">
                                <table  class="orders">                  
                                <tr>
                                    <td><?php echo $orderId ?></td>
                                    <td><?php echo $productId ?></td>
                                    <td><?php echo $quantity ?></td>
                                    <td><?php if ($status == 0) {
                                        ?><p>Waiting For Payment</p><?php
                                                                } else if ($status == 1) {
                                                                    ?><p>Payment Accepted/To be ship</p><?php
                                                                        } else if ($status == 2) {
                                                                            ?><p>Out for delivery</p><?php
                                                                        } else if ($status == 3) {
                                                                    ?><p>Order Complete</p><?php
                                                                        } else {
                                                                ?><p>Error</p><?php
                                                                        } ?></td>

                                    <td><a href="orderPage.php?orderId=<?php echo $orderId ?>">edit</a></td>
                                </tr>
                                
                                </table>
                            </div>
                            
                        
                        <?php
                        }
                        ?>
                    
               
                    </div> 
                </div>
            </div>
        </div>

    </div>
    
  
</body>

</html>