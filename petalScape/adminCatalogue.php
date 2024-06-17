<!DOCTYPE html>
<html lang="en">

<head>
    <?php
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
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .itemImage {
            width: 20%;
        }
    </style>
</head>

<body>
    <?php
    include 'constants/sidebar.php';
    ?>
    <br>
    <div class="addingOfItems">
        <h2>Add Items</h2>
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
                $categoryQuery = "SELECT * FROM `category` WHERE `name` != 'No category'";
                $categoryResult = mysqli_query($conn, $categoryQuery);
                while ($rows = mysqli_fetch_assoc($categoryResult)) {
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
    <br>
    <div class="addingOfCategory">
        <h2>Add Category</h2>
        <form action="functions/func_addCategory.php" method="post">
            <label for="categoryName">Category Name:</label>
            <input type="text" name="categoryName" id="categoryName" required> <br>
            <input type="submit" value="Add Category">
        </form>
    </div>
    <div class="categories">
        <h2>Categories</h2>
        <?php
        $categoryQuery = "SELECT * FROM `category` WHERE `name` != 'No category'";
        $categoryResult = mysqli_query($conn, $categoryQuery);
        while ($categoryRows = mysqli_fetch_assoc($categoryResult)) {
        ?>
            <div class="categoryItem">
                <p><?php echo $categoryRows['name']; ?></p>
                <button class="delete-category-btn" data-id="<?php echo $categoryRows['id']; ?>" data-name="<?php echo $categoryRows['name']; ?>">Delete</button>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="products">
        <h2>Products</h2>
        <?php
        $productQuery = "SELECT * FROM products";
        $productResult = mysqli_query($conn, $productQuery);
        while ($productRows = mysqli_fetch_assoc($productResult)) {
            $img = $productRows['img'];
        ?>
            <div class="productItem">
                <img class="itemImage" src='uploads/<?php echo $img ?>' alt=''>
                <p><?php echo $productRows['name']; ?> #<?php echo $productRows['id']; ?></p>
                <p><?php echo $productRows['category']; ?></p>
                <p><?php echo $productRows['price']; ?></p>
                <h4>Summary</h4>
                <p><?php echo $productRows['description']; ?></p>
                <button class="editBtn" data-id="<?php echo $productRows['id']; ?>" data-name="<?php echo $productRows['name']; ?>" data-category="<?php echo $productRows['category']; ?>" data-price="<?php echo $productRows['price']; ?>" data-quantity="<?php echo $productRows['quantity']; ?>" data-description="<?php echo $productRows['description']; ?>">Edit</button>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- The Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Edit Item</h2>
            <form action="functions/func_editItem.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="editId">
                <label for="editName">Item Name</label>
                <input type="text" name="name" id="editName" required> <br>
                <label for="editDescription">Description</label>
                <input type="text" name="description" id="editDescription" required> <br>
                <label for="editPrice">Price</label>
                <input type="number" id="editPrice" name="price" min="1" max="100000" required> <br>
                <label for="editQuantity">Quantity</label>
                <input type="number" id="editQuantity" name="quantity" min="1" max="100000" required> <br>
                <label for="editCategory">Category</label>
                <select name="category" id="editCategory" required>
                    <?php
                    $categoryQuery = "SELECT * FROM `category` WHERE `name` != 'No category'";
                    $categoryResult = mysqli_query($conn, $categoryQuery);
                    while ($categoryRows = mysqli_fetch_assoc($categoryResult)) {
                    ?>
                        <option value="<?php echo $categoryRows['name']; ?>"><?php echo $categoryRows['name']; ?> </option>
                    <?php
                    }
                    ?>
                </select> <br>
                <label for="editImage">Change Image</label>
                <input type="file" name="image" id="editImage"> <br>
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("editModal");
        // Get the button that opens the modal
        var editBtns = document.querySelectorAll(".editBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks the button, open the modal 
        editBtns.forEach(function(btn) {
            btn.onclick = function() {
                modal.style.display = "block";
                document.getElementById("editId").value = this.getAttribute("data-id");
                document.getElementById("editName").value = this.getAttribute("data-name");
                document.getElementById("editCategory").value = this.getAttribute("data-category");
                document.getElementById("editPrice").value = this.getAttribute("data-price");
                document.getElementById("editQuantity").value = this.getAttribute("data-quantity");
                document.getElementById("editDescription").value = this.getAttribute("data-description");
            }
        });
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        // Delete category
        var deleteCategoryBtns = document.querySelectorAll(".delete-category-btn");
        deleteCategoryBtns.forEach(function(btn) {
            btn.onclick = function() {
                var categoryId = this.getAttribute("data-id");
                var categoryName = this.getAttribute("data-name");
                if (categoryName !== "No category" && confirm("Are you sure you want to delete this category?")) {
                    fetch(`functions/func_deleteCategory.php?id=${categoryId}`, {
                            method: "GET",
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data === "success") {
                                location.reload();
                            } else {
                                alert("Failed to delete category");
                            }
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    alert("Cannot delete 'No category'");
                }
            }
        });
    </script>
</body>

</html>
