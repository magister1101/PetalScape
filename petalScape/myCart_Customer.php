<!DOCTYPE html>
<html lang="en">

<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/myCart_Customer.css">
    <style>
        .myCart-header{
           background-image: url('img/bg2-header.png');
           background-repeat: no-repeat;
           background-size: cover;
            position: relative;
            height: 260px;
            margin-top: -9%;
            z-index: -1;
        }
       
        footer{
            background-image: url('img/bg.png');
            background-repeat: no-repeat;
            background-size: 100%;
            height: 670px;
            margin-top: 15%;
        }

        footer hr{
            border: 1px solid #61AE4C;
            opacity: 30%;
        }

    </style>
</head>

<body>
    <div class="container">
            <?php
             include 'constants/navbar.php'
            ?> 
        <div class="myCart-header">
               <!-- container with navbar -->
        </div>
         
        <div class="myCart-container">
            <div class="item-list-cont">
                    <div class="mycart-txt">
                        <h1>My Cart</h1>
                    </div>

                    <div class="return-update-btn">
                        <div class="return-btn">
                            <button>Return to Shop</button>
                        </div>
                            <div class="update-btn">
                                <button>Update Cart</button>
                            </div>
                           
                    </div>

                    <div class="product-info">
                        <span style="margin-right:6%;font-size: 16px; font-family: Poppins, sans-serif;  font-weight: 600;";>Product</p></span><p>
                        <p>Quantity</p>
                        <p>Price</p>
                        <p>Subtotal</p>
                       
                    </div>
                    <hr>
                    <div class="product-list">
                            <img src="img/flower4.png">
                            <p>2</p>
                            <p>P 2,140</p>
                            <p>P 2,140</p>
                    </div>
                    <div class="product-list">
                            <img src="img/flower4.png">
                            <p>2</p>
                            <p>P 2,140</p>
                            <p>P 2,140</p>
                    </div>
                    
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
                              <span style="margin-left:60%";><p>$1750</p></span> 
                            </div>
                            <hr>
                            <div class="shipping-text">
                                <p>Shipping:</p>
                                <span style="margin-left:60%";><p>FREE</p></span> 
                            </div>
                            <hr>
                            <div class="total-text">
                                <p>Total:</p>
                                <span style="margin-left:68%";><p>$1750</p></span> 
                            </div>
                            <hr>

                            <div class="checkout-btn">
                                <button>Procced to checkout</button>
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