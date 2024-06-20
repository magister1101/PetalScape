<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    error_reporting(0);
    session_start();
    include 'constants/config.php';
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/myCart_Customer.css">
    <style>
        .nav-header {
            background-image: url('img/bg2-header.png');
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            height: 260px;
        

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

        .alert {
            padding: 15px;
            color: white;
            margin-bottom: 15px;
            position: absolute;
            width: 100%;
            z-index: 2;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.querySelector('.alert');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.classList.add('fade-out');
                }, 3000);
                setTimeout(() => {
                    alertBox.remove();
                }, 3500);
            }
        });
    </script>
</head>

<body>
    <?php
    if ($_GET['message'] == 'no_items') {
        echo '<div class="alert" style="background-color: #f44336;">No items in cart.</div>';
    } else if ($_GET['message'] == 'checkout') {
        echo '<div class="alert" style="background-color: #61ae4c;">Item Ordered.</div>';
    }
    ?>
    <div class="container">
        
        <div class="nav-header">
            <!-- container with navbar -->
            <?php
        include 'constants/navbar.php'
        ?>
        </div>

        <div class="myCart-container">
            <div class="item-list-cont">
                <div class="mycart-txt">
                    <h1>My Cart</h1>
                </div>

                <div class="return-update-btn">
                    <div class="return-btn">
                        <a href="catalogue.php">Return to Shop</a>
                    </div>
                </div>


                <div class="product-info">
                    <span style="margin-right:6%;font-size: 16px; font-family: Poppins, sans-serif;  font-weight: 600;" ;>Product</p></span>
                    <p>
                    <p>Quantity</p>
                    <p>Price</p>
                    <p>Subtotal</p>
                    <p>Edit</p>

                    <?php
                    $id = $_SESSION['id'];
                    $query = "SELECT * FROM `cart` where accountId = $id";
                    $result = mysqli_query($conn, $query);

                    ?>
                </div>
                <hr>
                <?php
                $allItemsTotal = 0;
                $shippingFee = 0;
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
                            $subTotal = $productRow['price'] * $productQuantity;
                            $allItemsTotal = $allItemsTotal + $subTotal;
                            ?>
                            <p><?php echo $subTotal ?></p>
                            <form action="functions/func_removeToCart.php" method="post">
                                <input type="text" name="removeId" id="removeId" value="<?php echo $row['productId'] ?>" hidden>
                                <input type="submit" value="remove" style="background-color: transparent;border-style:none;font-family:Poppins,San-serif;font-weight:500;font-size:15px;cursor:pointer;">
                            </form>
                        </div>

                <?php
                    }
                }
                ?>

            </div>

            <div class="coupon-cart-summary-cont">
                <div class="coupon-cont">
                    <h1>Have a coupon?</h1>
                    <p>Add your code for an instant cart discount</p>
                    <input type="text" placeholder="Coupon Code">
                </div>
                <div class="cart-summary-cont">
                    <h1>Cart Summary</h1>
                    <div class="sub-text">
                        <p>Subtotal:</p>
                        <span style="margin-left:60%" ;>
                            <p>₱<?php echo $allItemsTotal ?></p>
                        </span>
                    </div>
                    <hr>
                    <div class="shipping-text">
                        <p>Shipping:</p>
                        <span style="margin-left:60%" ;>
                            <p><?php echo $shippingFee ?></p>
                        </span>
                    </div>
                    <hr>
                    <div class="total-text">
                        <p>Total:</p>
                        <span style="margin-left:68%" ;>
                            <p class="total-amount">₱<?php echo $allItemsTotal + $shippingFee ?></p>
                        </span>
                    </div>
                    <hr>

                    <div class="checkout-btn">
                        <button class="checkout-submit" onclick="location.href = 'checkout.php'">Procced to checkout</button>
                    </div>
                </div>
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