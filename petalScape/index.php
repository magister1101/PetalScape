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
    <?php
    include 'constants/navbar.php'
    ?>
    
    <a href="registration.php">register</a> <br>
    <a href="login.php">login</a>
    <?php
    if (isset($_SESSION['id'])) {
    ?>
        <a href="functions/func_logout.php">logout</a>
    <?php
    }
    ?>

    <a href="catalogue.php">Shop Now</a>

    <h1>Our Top Selling</h1> <a href="catalogue.php">See more</a>
</body>






</html>