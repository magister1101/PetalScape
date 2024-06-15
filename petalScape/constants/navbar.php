<head>
    <link rel="stylesheet" href="css/navbar.css">
</head>

<div class="navbar-container">
    <div class="navbar">
        <!-- <p style="display: inline">[LOGO]</p> -->
        <a href="index.php">Home</a>
        <a href="catalogue.php">Explore</a>
    </div>

    <div class="search-bar">
        <form action="catalogue.php" method="get" style="display: inline">
            <input class="search-btn" type="text" name="search" placeholder="Search...">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="navbar-img">
        <a href="myCart_Customer.php"><img class="cart" src="img/cart.png"></a>
        <a href="functions/func_profile.php"><img src="img/profile.png"></a>
    </div>
</div>