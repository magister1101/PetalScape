<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo "<script>location.href='../login.php'</script>";
}

include 'constants/config.php';

$userId = $_SESSION['id'];

$Query = "SELECT * FROM `cart` WHERE `accountId` = '$userId'";
$Result = mysqli_query($conn, $Query);

if (mysqli_num_rows($Result) == 0) {
    header("Location: myCart_Customer.php?message=no_items");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/checkout.css">
    <style>
        .myCart-header {
            background-image: url('img/bg2-header.png');
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            height: 260px;
            margin-top: -9%;
            z-index: -1;
        }

        footer {
            background-image: url('img/bg.png');
            background-repeat: no-repeat;
            background-size: 100%;
            height: 670px;
            margin-top: 15%;
        }

        footer hr {
            border: 1px solid #61AE4C;
            opacity: 30%;
        }
    </style>

    <script>
        function handleSubmit(event) {
            event.preventDefault();

            var paymentMethod = document.querySelector('input[name="payment"]:checked').value;

            if (paymentMethod === 'gcash') {
                var gcashFile = document.getElementById('gcashFile').files[0];
                if (!gcashFile) { 
                    alert('Please upload a GCASH payment screenshot.');
                    return;
                }
                // Optionally, you can add more validation for file type and size here.
            }
            event.target.submit();
        }

        function toggleGcashUpload() {
            var paymentMethod = document.querySelector('input[name="payment"]:checked').value;
            var gcashUpload = document.getElementById('gcash-upload');
            if (paymentMethod === 'gcash') {
                gcashUpload.style.display = 'block';
            } else {
                gcashUpload.style.display = 'none';
            }
        }
    </script>

</head>

<body>
    <?php
    include 'constants/navbar.php';
    $subtotal = 0;
    $itemTotal = 0;
    ?>
    <div class="myCart-header">
        <!-- container with navbar -->
    </div>

    <div class="checkout-txt">
        <h1>Checkout</h1>
    </div>
    <!-- main container -->
    <div class="main-container">
        <!-- checkout txt -->
        <div class="checkout-container">
            <div class="leftside-container">
                <form action="functions/func_checkout.php" method="post" enctype="multipart/form-data">
                    <div class="contact-information">
                        <h3>Contact Information</h3>
                        <div class="fname-lname">
                            <div class="fname">
                                <label for="fn">FIRST NAME</label>
                                <input type="text" name="firstName" id="firstName" required> <br>
                            </div>
                            <div class="lname">
                                <label for="ln">LAST NAME</label>
                                <input type="text" name="lastName" id="lastName" required> <br>
                            </div>
                        </div>

                        <div class="phone-email">
                            <label for="num">PHONE NUMBER</label>
                            <input type="number" name="phoneNumber" id="phoneNumber" required> <br>
                            <label for="email">EMAIL ADDRESS</label>
                            <input type="email" name="email" id="email" required>
                        </div>

                    </div>

                    <div class="shipping-address">
                        <h3>Shipping Address</h3>
                        <div class="street-country-town">
                            <label for="streetAddress">STREET ADDRESS</label>
                            <input type="text" name="streetAddress" id="streetAddress" required> <br>
                            <label for="country">COUNTRY</label>
                            <select name="country" id="country" required>
                                <option value="philippines">Philippines</option>
                            </select> <br>
                            <label for="city">TOWN / CITY</label>
                            <input type="text" name="city" id="city" required> <br>
                        </div>

                        <div class="state-zip">
                            <div class="state">
                                <label for="state">STATE</label>
                                <input type="text" name="state" id="state" required>
                            </div>
                            <div class="zip">
                                <label for="zip">ZIP CODE</label>
                                <input type="text" name="zip" id="zip" required>
                            </div>
                        </div>
                    </div>

                    <div class="message">
                        <label for="message">Attach Message</label><br>
                        <textarea input type="text" name="message" id="message" placeholder="Your Message    (Ex. “Happy Anniversary!”, “Happy Birthday!”)"></textarea>


                    </div>

            </div>

            <div class="rightside-container">

                <div class="payment-method">
                    <h3>Payment Method</h3>
                    <div class="cod-payment">
                        <input type="radio" name="payment" id="payment_cod" class="payment" value="cod" onclick="toggleGcashUpload()" required> <label for="payment_cod">Cash on Delivery</label> <br>
                    </div>
                    <div class="gcash-payment">
                        <input type="radio" name="payment" id="payment_gcash" class="payment" value="gcash" onclick="toggleGcashUpload()" required> <label for="payment_gcash">GCASH</label>
                    </div>
                </div>

                <div id="gcash-upload" style="display:none;">
                    <div class="gcash-upload">
                        <div class="gcash-img">
                            <img src="img/qr3.jpg" alt="">
                        </div>
                        
                        <div class="gcash-label-input">
                            <label for="gcashFile">Upload GCASH Payment Screenshot:</label>
                            <input type="file" name="gcashFile" id="gcashFile" accept="image/*">
                        </div>
                    </div>    
                </div>


                <div class="cart-summary">
                    <div class="product-list">
                        <div class="product-quant-price-txt">
                            <h3>Product</h3>
                            <h3>Name</h3>
                            <h3>Quantity</h3>
                            <h3>Price</h3>
                        </div>
                        <hr>
                    </div>

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

                            <div class="cart-info">

                                <img src="uploads/<?php echo $productRow['img'] ?>">
                                <span style="margin-left:-8%;margin-top:5%" ;>
                                    <p>Name</p>
                                </span>
                                <p><?php echo $productQuantity ?></p>
                                <p><?php echo $productRow['price'] ?></p>
                                <?php
                                $itemTotal = $productRow['price'] * $productQuantity;
                                $subtotal = $subtotal + $itemTotal;
                                ?>

                            </div>

                    <?php

                        }
                    }
                    ?>
                    <div class="cart-summary-cont">
                        <h1>Cart Summary</h1>
                        <div class="sub-text">
                            <p>Subtotal:</p>
                            <span style="margin-left:60%" ;>
                                <p>₱ <?php echo $subtotal ?></p>
                            </span>
                        </div>
                        <hr>
                        <div class="shipping-text">
                            <p>Shipping:</p>
                            <span style="margin-left:60%" ;>
                                <p>₱ 0</p>
                            </span>
                        </div>
                        <hr>
                        <div class="total-text">
                            <p>Total:</p>
                            <span style="margin-left:68%" ;>
                                <p class="total-amount">₱ <?php echo $subtotal ?></p>
                            </span>
                        </div>
                        <hr>
                        <div class="placeorder-btn">
                            <input class="placeorder-submit" type="submit" value="Place Order">
                        </div>
                    </div>



                </div>
                </form>


            </div>
        </div>
    </div>

</body>
<footer>
    <hr>
    <div class="contact-info">
        <div class="phone-info">
            <img src="img/phone.png">
            <div class="contact-text">
                <H1>Contact us</H1>
                <p>0915 670 0925</p>
            </div>

        </div>
        <div class="email-info">
            <img src="img/email.png">
            <div class="email-text">
                <H1>Email us</H1>
                <p>petalscape@gmail.com</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="petalscape-info">
        <div class="footer-logo">
            <h1>Petalscape</h1>
            <img src="img/Logo.png">

            <div class="footer-icons">
                <p>Get in touch</p>
                <img src="img/facebook.png">
                <img src="img/insta.png">
            </div>
        </div>

        <div class="location-footer">
            <h1>Location</h1>
            <p>Bacoor, Cavite <br>Philippines</p>
            <div class="office-hour-footer">
                <h1>Office Hours</h1>
                <p>Monday to Saturday<br>8:00am - 6:00pm</p>
            </div>
        </div>

        <div class="legal-info-footer">
            <h1>Legal information</h1>
            <p>Delivery Information</p>
            <p>Privacy/ Policy</p>
            <p>Terms & conditions</p>
        </div>
    </div>
    <hr>
    <div class="rights-reserved">
        <p>© 2024. Petalscape PH. All Rights Reserved.</p>
    </div>
</footer>

</html>