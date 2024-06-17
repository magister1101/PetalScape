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


    ?>
</head>

<body>
    <?php
    include 'constants/sidebar.php'
    ?>
    <div class="recent-orders">
        <h2>Order List</h2>

        <table>

            <tr>
                <th>Order Id</th>
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
                <div class="orders">
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
                </div>


            <?php
            }
            ?>
        </table>
    </div>

</body>

</html>