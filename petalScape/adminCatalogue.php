<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include 'constants/config.php';
    include_once 'functions/func_adminCheck.php'; //for admin pages only, checks if the user is an admin
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/adminCatalogue.css">
    <?php
    $query = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $query);
    ?>
    <style>
        
        


    </style>
</head>

<body>
<div class="main-container">
    
        <div class="admin-bg">
            <?php
            include 'constants/sidebar.php'
            ?>
        </div>
    <br>
    <div class="admin-catalogue-cont">
            <div class="add-product-txt">
                <h2>Add Product</h2>
            </div>
        <div class="addingOfItems-cont">
            <div class="information-txt">
                <h2>Information</h2>
            </div>
            
            <form action="functions/func_addItem.php" method="post" enctype="multipart/form-data">
            
            <div class="name-desc-cont">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" required> <br>
                <label for="description">Product Description</label>
               <textarea type="text" name="description" id="description" required></textarea> <br>
            </div>

            <div class="price-quantity-cont">
                <div class="price-cont">
                    <label for="price">Product Price</label>
                    <input type="number" id="price" name="price" min="1" max="100000" required> <br>
                </div>
                <div class="quantity-cont">
                    <label for="quantity">Product Quantity</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="100000" required> <br>
                </div>     
            </div>  

            <div class="category-cont">
                <h2>Categories</h2>
                <label for="category">Add to Category</label>
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
            </div>
            <div class="photo-file-submit-cont">
                <label for="photo">Image</label>
                <div class="file-btn-cont">
                    <input type="file" name="image" id="image" required> <br>
                </div>
             
                <input type="submit" value="Add Item">
            </div>            
            </form>    
            <hr> 
            
                <form action="functions/func_addCategory.php" method="post">
                <div class="addingOfCategory">
                    <h2>Add Category</h2>
                        <label for="categoryName">Category Name:</label>
                        <input type="text" name="categoryName" id="categoryName" required> <br>
                        <div class="submit-btn-adding-category">
                            <input type="submit" value="Add Category">
                        </div>    
                </div>  
                </form>
            <hr>
                <div class="categories">
                    <h2>Categories</h2>
                        <div class="categoryItem">
                            <?php
                            $categoryQuery = "SELECT * FROM `category` WHERE `name` != 'No category'";
                            $categoryResult = mysqli_query($conn, $categoryQuery);
                            while ($categoryRows = mysqli_fetch_assoc($categoryResult)) {
                            ?>
                                <div class="name-btn-category">  
                                  <p><?php echo $categoryRows['name']; ?></p>
                                  <button class="delete-category-btn" data-id="<?php echo $categoryRows['id']; ?>" data-name="<?php echo $categoryRows['name']; ?>">Delete</button>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                </div>
                <hr>
                <div class="products-txt">
                    <h2>Products</h2>
                </div>
                
                <div class="products">      
                            <?php
                            $productQuery = "SELECT * FROM products";
                            $productResult = mysqli_query($conn, $productQuery);
                            while ($productRows = mysqli_fetch_assoc($productResult)) {
                                $img = $productRows['img'];
                            ?>
                                <div class="productItem">
                                    <div class="img-categ-name-price-cont">
                                        <div class="product-img">
                                            <img class="itemImage" src='uploads/<?php echo $img ?>' alt=''>
                                        </div>
                                        <div class="name-cate-price-cont">
                                            <h1><?php echo $productRows['category']; ?></h1>
                                            <p><?php echo $productRows['name']; ?> #<?php echo $productRows['id']; ?></p>
                                            <h1>P <?php echo $productRows['price']; ?></h1>
                                        </div>
                                        
                                    </div>
                                    <div class="sum-desc-cont">
                                        <h4>Summary</h4>
                                        <h2><?php echo $productRows['description']; ?></h2>
                                    </div>
                                    <div class="product-edit-btn">
                                        <button class="editBtn" data-id="<?php echo $productRows['id']; ?>" data-name="<?php echo $productRows['name']; ?>" data-category="<?php echo $productRows['category']; ?>" data-price="<?php echo $productRows['price']; ?>" data-quantity="<?php echo $productRows['quantity']; ?>" data-description="<?php echo $productRows['description']; ?>">Edit</button>
                                    </div>
                                    
                                </div>
                            <?php
                            }
                            ?>
                             <!-- The Modal -->
                        <div id="editModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h2>Edit Item</h2>
                                <div class="edit-container">                 
                                    <form action="functions/func_editItem.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="editId">
                                        <div class="edit-name-desc-cont">
                                            <label for="editName">Item Name</label>
                                            <input type="text" name="name" id="editName" required> <br>
                                            <label for="editDescription">Description</label>
                                            <textarea  type="text" name="description" id="editDescription" required></textarea><br>
                                        </div>
                                        
                                        <div class="edit-price-quantity-cont">
                                            <label for="editPrice">Price</label>
                                            <input type="number" id="editPrice" name="price" min="1" max="100000" required> <br>
                                            <label for="editQuantity">Quantity</label>
                                            <input type="number" id="editQuantity" name="quantity" min="1" max="100000" required> <br>
                                        </div>
                                        <div class="edit-category-cont">
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
                                        </div>
                                        <div class="edit-img-change-img-txt">
                                            <label for="editImage">Change Image</label>
                                            <div class="edit-img-cont">
                                                <input type="file" name="image" id="editImage">
                                            </div>
                                        </div>           
                                        <div class="edit-save-btn">
                                            <input type="submit" value="Save Changes">
                                        </div>                      
                                    </form>
                                </div>
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
                    </div>
                       
    
            <div class="div"></div>
        </div>
        <br>
       
    </div>
    
</div>
</body>

</html>
