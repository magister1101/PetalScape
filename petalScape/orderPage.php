<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    error_reporting(0);
    session_start();
    include 'constants/config.php';
    include_once 'functions/func_adminCheck.php'; //for admin pages only, checks if the user is an admin
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>

    <style>
        .alert {
            padding: 15px;
            background-color: #7bc53a;
            color: white;
            margin-bottom: 15px;
        }
    </style>


    <?php

    $orderId = $_GET['orderId'];

    $query = "SELECT * FROM `orders` WHERE id = '$orderId'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_assoc($result);

    //customer
    $name = $rows['name'];
    $email = $rows['email'];
    $contactNumber = $rows['contactNumber'];

    //order info
    $mop = $rows['modeOfPayment'];
    $status = $rows['status'];

    //delivery info
    $address = $rows['address'];

    //message
    $message = $rows['message'];


    $accountId = $rows['accountId'];


    //product
    $quantity = $rows['quantity'];
    $productId = $rows['productId'];
    $prodouctQuery = "SELECT * FROM `products` where id = $productId";
    $productResult = mysqli_query($conn, $prodouctQuery);
    $productRow = mysqli_fetch_assoc($productResult);
    ?>
</head>

<body>
    <?php
    if ($_GET['message'] == 'changed') {
        echo '<div class="alert">Status Changed</div>';
    }
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.querySelector('.alert');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.classList.add('fade-out');
                }, 5000);
                setTimeout(() => {
                    alertBox.remove();
                }, 5500);
            }
        });
    </script>
    <h1>Order Details</h1>

    <div>
        <div class="order-id">
            <h2>
                Order ID: #<?php echo $orderId ?>
                <span class="status"> <?php if ($status == 0) { ?>Waiting For Payment<?php } else if ($status == 1) { ?>Payment Accepted/To be ship<?php } else if ($status == 2) { ?>Out for delivery<?php } else if ($status == 3) { ?><p>Order Complete<?php } else { ?>Error<?php } ?></span>
            </h2>

            <form action="functions/func_updateOrderStatus.php" method="post">
                <input type="hidden" name="orderId" value="<?php echo $orderId; ?>">
                <label for="status">Status:</label>
                <select name="status" id="status">
                    <option value="0" <?php if ($status == 0) echo 'selected'; ?>>Waiting For Payment</option>
                    <option value="1" <?php if ($status == 1) echo 'selected'; ?>>Payment Accepted/To be Shipped</option>
                    <option value="2" <?php if ($status == 2) echo 'selected'; ?>>Out for Delivery</option>
                    <option value="3" <?php if ($status == 3) echo 'selected'; ?>>Order Complete</option>
                </select>
                <button type="submit">Update Status</button>
            </form>
        </div>

        <div class="customer-info">
            <h2>Customer</h2>
            <p>Full Name: <?php echo $name ?></p>
            <p>Email: <?php echo $email ?></p>
            <p>Phone: <?php echo $contactNumber ?></p>
        </div>

        <div class="order-info">
            <h2>Order Info</h2>
            <p>Payment Method: <?php if ($mop == 'cod') { ?>Cash On Delivery<?php } else { ?> Gcash Payment<?php } ?></p>
            <p>Status: <?php if ($status == 0) { ?>Waiting For Payment<?php } else if ($status == 1) { ?>Payment Accepted/To be ship<?php } else if ($status == 2) { ?>Out for delivery<?php } else if ($status == 3) { ?>
            <p>Order Complete<?php } else { ?>Error<?php } ?></p>
        </div>

        <div class="delivery-info">
            <h2>Deliver to</h2>
            <p>Address: <?php echo $address ?></p>
        </div>

        <div class="message">
            <h2>Note</h2>
            <p><?php echo $message ?></p>
        </div>


        <div class="product-info">

            <div class="product-info-table">
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Proudct Id</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $productNameInfo = $productRow['name'];
                    $productIdInfo = $productRow['id'];
                    $productPriceInfo = $productRow['price'];

                    $total = $productPriceInfo * $quantity;
                    ?>

                    <tr>
                        <td><?php echo $productNameInfo ?></td>
                        <td><?php echo $productIdInfo ?></td>
                        <td><?php echo $quantity ?></td>
                        <td><?php echo $total ?></td>
                    </tr>
                </table>
            </div>

            <div class="total-info">
                <p>Subtotal: ₱<?php echo $total ?></p>
                <p>Discount: ₱0</p>
                <p>Shipping Fee: ₱0</p>
                <p>Total: <?php echo $total ?></p>
            </div>
        </div>


    </div>
</body>

</html>