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
        <form action="catalogue.php" method="get">
            <input class="search-btn" type="text" name="search" placeholder="Search..." style="padding-left: 25%;">
            <input class="search-btn-img" type="image" src="img/search-ico.png" style="width: 35px;margin-left:-270px;margin-top:.3%;position:absolute">
        </form>
    </div>

    <div class="navbar-img">
        <a href="myCart_Customer.php"><img class="cart" src="img/cart.png"></a>
        <a href="functions/func_profile.php"><img src="img/profile.png"></a>
    </div>
</div>