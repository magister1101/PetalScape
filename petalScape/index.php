<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    include 'constants/config.php';
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
</head>

<body>
    <div class="navbar">
        <p style="display: inline">[LOGO]</p>
        <a href="index.php">Home</a>
        <a href="catalogue.php">Explore</a>
        <form action="functions/func_search.php" method="post" style="display: inline">
            <input type="submit" value="search">
            <input type="text" name="search_value">
        </form>
        <a href="cart.php">cart</a>
        <a href="profile.php">profile</a>
    </div>

    <a href="catalogue.php">Shop Now</a>

    <h1>Our Top Selling</h1> <a href="catalogue.php">See more</a>
</body>






</html>