<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    session_start();
    include 'constants/config.php';
    ?>
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/catalogue.css">
    <style>
      .header-nav{
        background-image: url("img/bg.png");
        background-repeat: no-repeat;
        position: relative;
        background-size: 100%;
        height: 950px;
        z-index: 10;
     
    }
    footer{
            background-image: url('img/bg.png');
            background-repeat: no-repeat;
            background-size: 100%;
            height: 670px;
        }

        footer hr{
            border: 1px solid #61AE4C;
            opacity: 30%;
        }
    </style>
    <?php

    $query = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $query);

    ?>
</head>

<body>

    <div class="header-nav">
     <?php
     include 'constants/navbar.php'
        ?>
    </div>
    <div class="circle">
         
    </div>

    <div class="container">
        <h1>Catalog</h1>
        <!-- Category and price drop down -->
        <div class="catalogue-cont">
        
                    <div class="cat-price">
                        <?php

                            $categoryQuery = "SELECT * FROM `category`";
                            $categoryResults = mysqli_query($conn, $categoryQuery);

                            ?>
                            <div class="category-select">
                                <label>CATEGORIES</label><br>
                                <select name="category" id="category">
                                    <?php
                                    while ($categoryRows = mysqli_fetch_assoc($categoryResults)) {
                                    ?>
                                        <option value="<?php echo $categoryRows['name']; ?>"><?php echo $categoryRows['name']; ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                           <div class="price-select">
                            <label>PRICE:</label><br>
                                    <select name="price" id="price">
                                        <option value="allPrices">all Prices</option>
                            </select>
                           </div>
                            
                    </div>
       
                    <div class="items-cont">
                      
                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                $img = $row['img'];
                                $name = $row['name'];
                                $description = $row['description'];
                                $price = $row['price'];
                                $quantity = $row['quantity'];
                                $category = $row['category'];
                            ?>
                                  <div class="item-list">
                                    <img src="uploads/<?php echo $img ?>" alt="">
                                    <span style="font-size:23px;font-weight:600;font-family:Poppins,sans-serif;margin-top:7%"><p><?php echo $name ?></p></span>
                                    <span style="width:a;height:auto;margin-top:3%;font-weight:500;font-family:Poppins,sans-serif;font-size:12px;"><p><?php echo $description ?></p></span>
                                        <div class="price-addBtn">
                                            <p><?php echo $price ?> PHP</p>
                                            <a href="functions/func_addToCart.php"><img src="img/cart.png"></a>
                                        </div>
                                </div>

                            <?php
                            }
                            ?>
                   <div class="backToTopBtn">
                            <button onclick="topFunction()" id="myBtn" title="Go to top">back to top</button>
                            <script src="javascript/backToTop.js"></script>
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