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
    <div class="addingOfItems">
        <form action="functions/func_addItem.php" method="post" enctype="multipart/form-data">
            <label for="name">Item Name</label>
            <input type="text" name="name" id="name" required> <br>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" required> <br>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" min="1" max="100000" required> <br>
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" min="1" max="100000" required> <br>
            <label for="category">Category</label>
            <select name="category" id="category" required>
                <?php
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?> </option>
                <?php
                }
                ?>
            </select> <br>
            <label for="photo">Add Image</label>
            <input type="file" name="image" id="image" required> <br>

            <input type="submit" value="Add Item">

        </form>
    </div>
    <br> <!-- remove this, ginamit ko lang para separator sa dalawang tab -->
    <div class="addingOfCategory">
        <form action="functions/func_addCategory.php" method="popen">
            <label for="categoryName">Category Name:</label>
            <input type="text" name="categoryName" id="categoryName" required> <br>
            <input type="submit" value="Add Category">
        </form>
    </div>


    <?php
    if (isset($_SESSION['id'])) {
    ?>
        <a href="functions/func_logout.php">logout</a> <!-- for quick logout lang to, di talaga dito nakalagay yan, paki delete nalang pag ni design nyo na -->
    <?php
    }
    ?>

</body>

</html>