<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'constants/config.php';
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>

    <?php

    $query = "SELECT * FROM `orders`";
    $result = mysqli_query($conn, $query);

    ?>
    <style>
        .tabs {
            display: flex;
            cursor: pointer;
            padding: 10px;
        }

        .tab {
            flex: 1;
            padding: 10px;
            text-align: center;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            margin-right: 2px;
        }

        .tab.active {
            background-color: #ccc;
        }

        .tab-content {
            display: none;
            padding: 10px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>
</head>

<body>
    <div class="main-container">

        <div class="admin-orders-cont">
            <div class="order-list-txt">
                <h2>Order List</h2>
            </div>

            <div class="tabs">
                <div class="tab active" data-tab="active-orders">Active Orders</div>
                <div class="tab" data-tab="completed-orders">Completed Orders</div>
                <div class="tab" data-tab="cancelled-orders">Cancelled Orders</div>
            </div>

            <div class="tab-content active" id="active-orders">
                <h2>Active Orders</h2>
                <table class="orders">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    mysqli_data_seek($result, 0);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        if ($rows['status'] == 0 || $rows['status'] == 1 || $rows['status'] == 2) {
                            $orderId = $rows['id'];
                            $quantity = $rows['quantity'];
                            $status = $rows['status'];
                            $date = date('Y-m-d', strtotime($rows['orderDate']));

                            $productId = $rows['productId'];
                            $productQuery = "SELECT * FROM products where id = '$productId'";
                            $productResult = mysqli_query($conn, $productQuery);
                            $productRows = mysqli_fetch_assoc($productResult);
                            $productName = $productRows['name'];
                    ?>
                            <tr>
                                <td><?php echo $orderId ?></td>
                                <td><?php echo $date ?></td>
                                <td><?php echo $productName ?></td>
                                <td><?php echo $quantity ?></td>
                                <td><?php if ($status == 0) {
                                    ?><p>Waiting For Payment</p><?php
                                                            } else if ($status == 1) {
                                                                ?><p>Payment Accepted/To be shipped</p><?php
                                                                                                    } else if ($status == 2) {
                                                                                                        ?><p>Out for delivery</p><?php
                                                                                                                                } ?></td>
                                <td><a href="functions/func_cancelOrder.php?productId=<?php echo $productId ?>">Cancel</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <div class="tab-content" id="completed-orders">
                <h2>Completed Orders</h2>
                <table class="orders">
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    mysqli_data_seek($result, 0);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        if ($rows['status'] == 3) {
                            $orderId = $rows['id'];
                            $quantity = $rows['quantity'];
                            $status = $rows['status'];
                            $date = date('Y-m-d', strtotime($rows['orderDate']));

                            $productId = $rows['productId'];
                            $productQuery = "SELECT * FROM products where id = '$productId'";
                            $productResult = mysqli_query($conn, $productQuery);
                            $productRows = mysqli_fetch_assoc($productResult);
                            $productName = $productRows['name'];
                    ?>
                            <tr>
                                <td><?php echo $orderId ?></td>
                                <td><?php echo $productName ?></td>
                                <td><?php echo $quantity ?></td>
                                <td><?php echo $date ?></td>
                                <td>
                                    <p>Order Complete</p>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <div class="tab-content" id="cancelled-orders">
                <h2>Cancelled Orders</h2>
                <table class="orders">
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    mysqli_data_seek($result, 0);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        if ($rows['status'] == 4) {
                            $orderId = $rows['id'];
                            $quantity = $rows['quantity'];
                            $status = $rows['status'];
                            $date = date('Y-m-d', strtotime($rows['orderDate']));

                            $productId = $rows['productId'];
                            $productQuery = "SELECT * FROM products where id = '$productId'";
                            $productResult = mysqli_query($conn, $productQuery);
                            $productRows = mysqli_fetch_assoc($productResult);
                            $productName = $productRows['name'];
                    ?>
                            <tr>
                                <td><?php echo $orderId ?></td>
                                <td><?php echo $productName ?></td>
                                <td><?php echo $quantity ?></td>
                                <td><?php echo $date ?></td>
                                <td>
                                    <p>Order Cancelled</p>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));

                tab.classList.add('active');
                document.getElementById(tab.getAttribute('data-tab')).classList.add('active');
            });
        });
    </script>
</body>

</html>