<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include 'constants/config.php';
    include_once 'functions/func_adminCheck.php';

    // Fetch total revenue (sum of amount * quantity from completed orders)
    $revenueQuery = "SELECT SUM(o.quantity * p.price) AS totalRevenue 
                     FROM orders o
                     JOIN products p ON o.productId = p.id
                     WHERE o.status = 3"; // Status 3 indicates 'Order Complete'
    $revenueResult = mysqli_query($conn, $revenueQuery);
    $revenueRow = mysqli_fetch_assoc($revenueResult);
    $totalRevenue = $revenueRow['totalRevenue'];

    // Fetch total orders
    $ordersQuery = "SELECT COUNT(*) AS totalOrders FROM orders";
    $ordersResult = mysqli_query($conn, $ordersQuery);
    $ordersRow = mysqli_fetch_assoc($ordersResult);
    $totalOrders = $ordersRow['totalOrders'];

    // Fetch total users excluding admin
    $usersQuery = "SELECT COUNT(*) AS totalUsers FROM accounts WHERE isAdmin = 0"; // Assuming 'isAdmin' column exists and admin users have isAdmin = 1
    $usersResult = mysqli_query($conn, $usersQuery);
    $usersRow = mysqli_fetch_assoc($usersResult);
    $totalUsers = $usersRow['totalUsers'];

    // Calculate percentages
    $totalRevenuePercentage = ($totalOrders > 0) ? ($totalRevenue / $totalOrders) : 0;
    $totalOrdersPercentage = ($totalUsers > 0) ? ($totalOrders / $totalUsers) : 0;

    $recentOrdersQuery = "SELECT o.id, p.name AS product, o.quantity, DATE_FORMAT(o.orderDate, '%M %d, %Y') AS orderDate, o.status 
                          FROM orders o 
                          JOIN products p ON o.productId = p.id 
                          ORDER BY o.orderDate DESC 
                          LIMIT 5";
    $recentOrdersResult = mysqli_query($conn, $recentOrdersQuery);

    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/admindashboard.css">
</head>

<body>

    <div class="main-container">
        <div class="admin-bg">
            <?php
            include 'constants/sidebar.php';
            ?>
        </div>

        <div class="adminDashboard-cont">
            <div class="dashboard-txt">
                <h1>Dashboard</h1>
            </div>
            <div class="main-dashboard">
                <div class="revenue-orders-user-cont">
                    <div class="revenue">
                        <p>PHP<?php echo number_format($totalRevenue, 2); ?></p>
                        <p class="total-rev-txt">Total Revenue</p>
                        <p class="total-percent-txt"><?php echo number_format($totalRevenuePercentage, 2); ?>%</p>
                    </div>
                    <div class="orders">
                        <p><?php echo $totalOrders; ?></p>
                        <p class="total-order-txt">Orders</p>
                        <p class="total-percent-txt"><?php echo number_format($totalOrdersPercentage, 2); ?>%</p>
                    </div>
                    <div class="users">
                        <p><?php echo $totalUsers; ?></p>
                        <p class="total-user-txt">Users</p>
                        <!-- <p class="total-percent-txt"><?php echo number_format(100, 2); ?>%</p> -->
                    </div>
                </div>

                <div class="total-income">
                    <!-- Add content for total income here -->
                </div>

                <div class="best-sellers">
                    <!-- Add content for best sellers here -->
                </div>

                <div class="recent-orders">
                    <h2>Recent Orders</h2>
                    <table class="tbl-recent-order">
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        while ($recentOrder = mysqli_fetch_assoc($recentOrdersResult)) {
                            $orderId = $recentOrder['id'];
                            $product = $recentOrder['product'];
                            $quantity = $recentOrder['quantity'];
                            $orderDate = $recentOrder['orderDate'];
                            $status = $recentOrder['status'];
                            $statusText = "";

                            switch ($status) {
                                case 0:
                                    $statusText = "Waiting For Payment";
                                    break;
                                case 1:
                                    $statusText = "Payment Accepted/To be shipped";
                                    break;
                                case 2:
                                    $statusText = "Out for delivery";
                                    break;
                                case 3:
                                    $statusText = "Order Complete";
                                    break;
                                case 4:
                                    $statusText = "Cancelled";
                                    break;
                                default:
                                    $statusText = "Error";
                                    break;
                            }
                        ?>
                            <tr>
                                <td><?php echo $orderId; ?></td>
                                <td><?php echo $product; ?></td>
                                <td><?php echo $quantity; ?></td>
                                <td><?php echo $orderDate; ?></td>
                                <td><?php echo $statusText; ?></td>
                                <td><a href="orderPage.php?orderId=<?php echo $orderId; ?>">Edit</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>