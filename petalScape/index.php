<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    include 'constants/config.php';
    session_start();
    ?>
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Ecommerce</title>
    <style>
        /* Deal the day container */
    .deal-the-day-cont{
        height: 900px;
        width: 100%;
        background-image: url("img/bg1.png");
        background-size: cover;
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: center;
        }

    </style>
</head>

<body background="img/bg.png"> 
    <?php
    include 'constants/navbar.php'
    ?>   
    <!-- <a href="registration.php">register</a> <br>
    <a href="login.php">login</a> -->
    <?php
    if (isset($_SESSION['id'])) {
    ?>
        <!-- <a href="functions/func_logout.php">logout</a> -->
    <?php
    }
    ?>
    <div class="container">
            <div class="furrever-text">
                <h1>Furrever <br>The <span style="color:#FF3939;font-style:italic";>Perfect Gift</span><br>That Never Wilts</h1>
                <p>Say it with fuzz! Celebrate any occasion with lovely handcrafted  flowers with <span style="font-weight:600";>Petalscape<span>.</p>
            </div>

            <div class="shop-now-text">
                <a href="catalogue.php"><button>Shop now</button></a>
            </div>
        
            <div class="bg-flower-yellow">
                <img src="img/bg-flower-yellow.png">
            </div>
       
        <div class="bg-hairpin">
            <img src="img/bg-hairpin.png">
        </div>
        <div class="why-choose-us-cont">
            <h1>Why Choose Us?</h1>
                <div class="why-choose-icons">
                        <div class="shipping-icon">
                            <img src="img/shipping-icon.png">
                            <h1>Fast Shipping</h1>
                            <p>4-day delivery time and an expedited delivery option.</p>
                        </div>
                        <div class="flower-icon">
                            <img src="img/flower-option-icon.png">
                            <h1>15+ Flower Options</h1>
                            <p>Wide variety of flower options you can choose from.</p>
                        </div>
                        <div class="quality-icon">
                            <img src="img/quality-icon.png">
                            <h1>Quality Guaranteed</h1>
                            <p>Ensured that all products are with the best quality.</p>
                        </div>
                </div>
        </div>

        <div class="deal-the-day-cont">
                <h2>DEAL THE DAY!</h2>
                <div class="sample-flower-cont">
                        <img src="img/flower3.png">
                        <div class="sample-flower-text">
                            <h1>Mint and Honey</h1>
                            <p>Vibrant green flowers adds elegance and freshness to<br> anyone’s eyes, perfect for brightening up your day.</p>
                            <h1>P 1,899</h1>
                        </div>                       
                </div>
        </div>


        <div class="top-selling-cont">
            
        </div>



        <div class="test">

        </div>
    <!-- <h1>Our Top Selling</h1> 
    <a href="catalogue.php">See more</a> -->
    </div>
  

</body>






</html>