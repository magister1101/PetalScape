<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    include 'constants/config.php';
    session_start();
    include 'functions/func_checkIfLogin.php';
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/registration.css">
</head>

<body background="img/bg.png"> 
    <div class="sign-up-cont">
        <div class="sign-up-top-left">
            <p>Welcome to <span>Petalscape</span></p>
            <div class="sign-up-top-right">
                <label for="haveAnAccount">Have an Account?</label>
                <br>
                <a href="login.php">Sign in</a>
            </div>
        </div>
        <div class="sign-in-text">
                        <p>Sign up</p>
                    </div>
        <form action="functions/func_registration.php" method="post" enctype="multipart/form-data"> <br>

        <div class="left-form">
            <label for="firstName">First Name</label> <br>
            <input type="text" name="firstName" id="firstName" required> <br><br>
            <label for="lastName">Last Name</label> <br>
            <input type="text" name="lastName" id="lastName" required> <br><br>
            <label for="userName">User Name</label> <br>
            <input type="text" name="userName" id="userName" required> <br><br>
            <label for="email">Email</label> <br>
            <input type="email" name="email" id="email" required> <br>
          
        </div>
        <div class="right-form">
     
            <label for="password">Password</label> <br>
            <input type="password" name="password" id="password" required> <br><br>
            <label for="contactNumber">Contact Number</label> <br>
            <input type="number" name="contactNumber" id="contactNumber" required> <br><br>
            <label for="address">Address</label> <br>
            <input type="text" name="address" id="address" required> <br><br>
           
        </div>
        <div class="add-img">
            <label for="image">Add Image</label><br>
            <input type="file" name="image" id="image" required><br>
        </div>
        
        <div class="register-btn">
            <input type="submit" value="Sign up">
        </div>
           
        </form> 
    </div>
        <!-- flower images -->
    <div class="sign-up-img">
        <div class="img-flower">
            <img src="img/bg-flower.png">
        </div>

        <div class="logo">
            <img src="img/Logo.png">
        </div>
        <div class="bg-txt">
            <p>Tiny worlds, blooming big.</p>
        </div>
        
    </div>
</body>

</html>