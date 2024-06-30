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
    <link rel="stylesheet" href="css/catalogue.css">
    <style>
        * {
            scroll-behavior: smooth;
        }

        .header-nav {
            background-image: url("img/bg.png");
            background-repeat: no-repeat;
            background-size: cover;
            height: 950px;
            position: relative;
            z-index: 10;
        }

        .header-nav::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255, 1));
            pointer-events: none;
            z-index: 20;
        }

        footer {
            background-image: url('img/bg.png');
            background-repeat: no-repeat;
            background-size: 100%;
            height: 670px;

        }

        footer hr {
            border: 1px solid #61AE4C;
            opacity: 30%;
        }

        .popup {
            display: none;
            flex-direction: column;
            align-items: center;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .popup-content {
            margin: auto;
            display: flex;
            width: 80%;
            max-width: 700px;
        }

        .popup-content,
        .close {
            animation-name: zoom;
            animation-duration: 0.4s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <?php

    $query = "SELECT * FROM `products` WHERE `archive` != '1'";
    $result = mysqli_query($conn, $query);

    ?>
</head>

<body>


    <div class="header-nav">

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

        <?php
        if ($_GET['message'] == 'addToCart') {
            echo '<div class="alert" style="background-color: #61ae4c;font-family:Poppins,San-Serif;padding-left:5%;height:3%;padding-top:.3%;color:#FFFFFF;">Added to cart.</div>';
        }
        ?>
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
                        <option value="allCategories">All Categories</option>
                        <?php
                        while ($categoryRows = mysqli_fetch_assoc($categoryResults)) {
                            if ($categoryRows['name'] !== "No category") {
                                echo '<option value="' . $categoryRows['name'] . '">' . $categoryRows['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="price-select">
                    <label>PRICE:</label><br>
                    <select name="price" id="price">
                        <option value="allPrices">All Prices</option>
                        <option value="0-500">0 - 500 PHP</option>
                        <option value="501-1000">501 - 1000 PHP</option>
                        <option value="1001-2000">1001 - 2000 PHP</option>
                        <option value="2001-1000000">2001+ PHP</option>
                    </select>
                </div>
            </div>


            <div class="items-cont">
                <?php
                if (isset($_GET['search'])) {
                    $search_query = $_GET['search'];
                    $search_query = mysqli_real_escape_string($conn, $search_query);

                    $query = "SELECT * FROM products WHERE (name LIKE '%$search_query%' OR description LIKE '%$search_query%') AND archive != '1'";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $img = $row['img'];
                            $name = $row['name'];
                            $description = $row['description'];
                            $price = $row['price'];
                            $quantity = $row['quantity'];
                            $category = $row['category'];
                            $id = $row['id'];

                            // Display search results
                            echo "<div class='item-list'>";
                            echo "<img src='uploads/$img' alt=''>";
                            echo "<span style='font-size:23px;font-weight:600;font-family:Poppins,sans-serif;margin-top:7%'>";
                            echo "<p>$name</p>";
                            echo "</span>";
                            echo "<span style='width:a;height:auto;margin-top:3%;font-weight:500;font-family:Poppins,sans-serif;font-size:12px;'>";
                            echo "<p>$description</p>";
                            echo "</span>";
                            echo "<div class='price-addBtn' data-category='$category'>";
                            echo "<p>$price PHP</p>";
                            echo "<form action='functions/func_addToCart.php' method='post'>";
                            echo "<input type='text' name='itemId' id='itemId' value='$id' hidden>";
                            echo "<input type='text' name='quantity' id='quantity' value='1' hidden>";
                            echo "<div class='cartImg'>";
                            echo "<input type='image' src='img/cart.png' value='add to cart'>";
                            echo "</div>";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "No results found";
                    }
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $img = $row['img'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $category = $row['category'];
                        $id = $row['id'];

                        echo "<div class='item-list'>";
                        echo "<img src='uploads/$img' alt='$name' data-img='uploads/$img' class='clickable-image'>";
                        echo "<span style='font-size:23px;font-weight:600;font-family:Poppins,sans-serif;margin-top:7%'>";
                        echo "<p>$name</p>";
                        echo "</span>";
                        echo "<span style='width:a;height:auto;margin-top:3%;font-weight:500;font-family:Poppins,sans-serif;font-size:12px;'>";
                        echo "<p>$description</p>";
                        echo "</span>";
                        echo "<div class='price-addBtn' data-category='$category'>";
                        echo "<p>$price PHP</p>";
                        echo "<form action='functions/func_addToCart.php' method='post'>";
                        echo "<input type='text' name='itemId' id='itemId' value='$id' hidden>";
                        echo "<input type='text' name='quantity' id='quantity' value='1' hidden>";
                        echo "<div class='cartImg'>";
                        echo "<input type='image' src='img/cart.png' value='add to cart'>";
                        echo "</div>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>
                <div class="backToTopBtn">
                    <button onclick="topFunction()" id="myBtn" title="Go to top">back to top</button>
                    <script src="javascript/backToTop.js"></script>
                </div>
            </div>
        </div>




    </div>
    <script>
        document.getElementById('price').addEventListener('change', updateFilters);
        document.getElementById('category').addEventListener('change', updateFilters);

        function updateFilters() {
            var selectedPriceRange = document.getElementById('price').value;
            var selectedCategory = document.getElementById('category').value;

            var items = document.querySelectorAll('.item-list .price-addBtn');

            items.forEach(function(item) {
                var category = item.getAttribute('data-category');
                var price = parseInt(item.querySelector('p').textContent);

                var showItem = false;
                if ((selectedCategory === 'allCategories' || selectedCategory === category) &&
                    (selectedPriceRange === 'allPrices' || isPriceInRange(price, selectedPriceRange))) {
                    showItem = true;
                }

                if (showItem) {
                    item.closest('.item-list').style.display = 'flex';
                } else {
                    item.closest('.item-list').style.display = 'none';
                }
            });
        }

        function isPriceInRange(price, range) {
            if (range === '1000+') {
                return price >= 1000;
            } else {
                var minMax = range.split('-');
                var minPrice = parseInt(minMax[0]);
                var maxPrice = parseInt(minMax[1]);
                return price >= minPrice && price <= maxPrice;
            }
        }
    </script>
    <div id="imagePopup" class="popup">
        <span class="close">&times;</span>
        <img class="popup-content" id="popupImg">
    </div>


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

    <script>
        var popup = document.getElementById('imagePopup');
        var popupImg = document.getElementById('popupImg');
        var closeBtn = document.getElementsByClassName('close')[0];

        document.querySelectorAll('.clickable-image').forEach(function(img) {
            img.addEventListener('click', function() {
                popup.style.display = 'flex';
                popupImg.src = this.getAttribute('data-img');
            });
        });

        closeBtn.onclick = function() {
            popup.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == popup) {
                popup.style.display = 'none';
            }
        }
    </script>

</body>

</html>