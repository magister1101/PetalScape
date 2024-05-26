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
                <form action="functions/func_search.php" method="post" style="display: inline">
                    <input type="submit" value="search">
                    <input class="search-btn" type="text" name="search_value">
                </form>
            </div>

            <div class="navbar-img">
                    <a href="cart.php"><img class="cart" src="img/cart.png"></a>
                    <a href="functions/func_profile.php"><img src="img/profile.png"></a>
                </div>
</div>
    