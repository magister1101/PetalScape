<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    session_start();
    include 'constants/config.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>

    <?php

    $query = "SELECT * FROM `products`";
    $result = mysqli_query($conn, $query);

    ?>
</head>

<body>
    <?php
    include 'constants/navbar.php'
    ?>

    <?php

    $categoryQuery = "SELECT * FROM `category`";
    $categoryResults = mysqli_query($conn, $categoryQuery);

    ?>

    <label>CATEGORIES:</label>
    <select name="category" id="category">
        <?php
        while ($categoryRows = mysqli_fetch_assoc($categoryResults)) {
        ?>
            <option value="<?php echo $categoryRows['name']; ?>"><?php echo $categoryRows['name']; ?> </option>
        <?php
        }
        ?>
    </select>

    <label>PRICE:</label>
    <select name="price" id="price">
        <option value="allPrices">all Prices</option>
    </select>

    <div class="items">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $img = $row['img'];
            $name = $row['name'];
            $description = $row['description'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $category = $row['category'];
        ?>
            <div>
                <img src="uploads/<?php echo $img ?>" alt="">
                <p><?php echo $name ?></p>
                <p><?php echo $description ?></p>
                <p><?php echo $price ?> PHP</p>
                <a href="functions/func_addToCart.php">add to cart</a>
            </div>

        <?php
        }
        ?>
    </div>


    <button onclick="topFunction()" id="myBtn" title="Go to top">back to top</button>
    <script src="javascript/backToTop.js"></script>


</body>

</html>