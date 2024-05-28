<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    session_start();
    include 'constants/config.php';
    include_once 'functions/func_adminCheck.php'; //for admin pages only, checks if the user is an admin
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>

    <?php

    $query = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $query);

    ?>
</head>

<body>
    <?php
    include 'constants/navbar.php'
    ?>
    <br>
    <div>
        <form action="functions/func_addItem.php" method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">  <br>
            <label for="description">Description</label>
            <input type="text" name="description" id="description">  <br>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" min="1" max="100000">  <br>
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" min="1" max="100000">  <br>
            <label for="category">Category</label>
            <select name="category" id="category">
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?> </option>
                <?php
                }
                ?>
            </select>  <br>
            <label for="photo">Add Image</label>
            <input type="file" name="image" id="image">  <br>

            <input type="submit" value="Add Item">

        </form>
    </div>


    <?php
    if (isset($_SESSION['id'])){
    ?>
    <a href="functions/func_logout.php">logout</a>
    <?php
    }
    ?>

</body>

</html>