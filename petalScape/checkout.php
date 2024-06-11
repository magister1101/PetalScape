<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
}

include 'constants/config.php';

$userId = $_SESSION['id'];

$Query = "SELECT * FROM `cart` WHERE `accountId` = '$userId'";
$Result = mysqli_query($conn, $Query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="functions/func_checkout.php" method="post">
        <div class="contact-information">

            <label for="fn">FIRST NAME</label>
            <input type="text" name="firstName" id="firstName" required> <br>
            <label for="ln">LAST NAME</label>
            <input type="text" name="lastName" id="lastName" required> <br>
            <label for="num">PHONE NUMBER</label>
            <input type="number" name="phoneNumber" id="phoneNumber" required> <br>
            <label for="email">EMAIL ADDRESS</label>
            <input type="email" name="email" id="email" required> <br>

        </div>

        <div class="shipping-address">
            <label for="streetAddress">STREET ADDRESS</label>
            <input type="text" name="streetAddress" id="streetAddress" required> <br>
            <label for="country">COUNTRY</label>
            <select name="country" id="country" required>
                <option value="philippines">Philippines</option>
            </select> <br>
            <label for="city">TOWN / CITY</label>
            <input type="text" name="city" id="city" required> <br>
            <label for="state">STATE</label>
            <input type="text" name="state" id="state" required>
            <label for="zip">ZIP CODE</label>
            <input type="text" name="zip" id="zip" required> <br>
        </div>

        <div class="payment-method">
            <input type="radio" name="payment" id="payment" class="payment" value="cod" required> <label for="cod">Cash on Delivery</label> <br>
            <input type="radio" name="payment" id="payment" class="payment" value="gcash" required> <label for="gcash">GCASH</label>
        </div>

        <div class="message">
            <label for="message">Attach Message</label>
            <input type="text" name="message" id="message">
        </div>

        <div class="cart-summary">

            <?php

            $id = $_SESSION['id'];
            $query = "SELECT * FROM `cart` where accountId = $id";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {

                $productId = $row['productId'];
                $productQuantity = $row['quantity'];
                $prodouctQuery = "SELECT * FROM `products` where id = $productId";
                $productResult = mysqli_query($conn, $prodouctQuery);
                while ($productRow = mysqli_fetch_assoc($productResult)) {
            ?>
                    <div class="product-list">
                        <img src="uploads/<?php echo $productRow['img'] ?>">
                        <p><?php echo $productQuantity ?></p>
                        <p><?php echo $productRow['price'] ?></p>
                        <?php
                        ?>
                    </div>

            <?php
                }
            }
            ?>

            <input type="submit" value="Place Order">
        </div>
    </form>
</body>

</html>