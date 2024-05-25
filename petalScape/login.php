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

    <link rel="stylesheet" href="login.css">
</head>

<body>

<div class="container">

        <div class="bg-img">
            <img src="img/signup-bg.jpg">
                <div class="flower-img">
                    <img src="img/bg-flower.png">
                </div>
                <div class="logo">
                    <img src="img/Logo.png">
                </div>
                <div class="bg-txt">
                    <p>Tiny worlds, blooming big.</p>
                </div>
        </div>
       
            <div class="sign-in-cont">

                <div class="sign-in-box">

            
                    <div class="top-cont-left">
                            <p>Welcome to <span style="color: #61AE4C";>Petalscape</span></p>
                         
                            
                            <div class="top-cont-right">
                                <label for="NoAccount">No Account?</label>
                                <br>
                                <a href="registration.php">Sign Up</a>
                            </div>

                            
                    </div>
                    <div class="sign-in-text">
                        <p>Sign in</p>
                    </div>
                    
                   
                    <form action="functions/func_login.php" method="post">
                        <div class="sign-in-username">
                            <label for="userName">Enter your Email</label> <br>
                            <input type="text" name="userName" id="userName" required placeholder="Email Address"> <br>
                        </div>
                        <div class="sign-in-password">
                            <label for="userName">Enter your Password</label> <br>
                            <input type="password" name="password" id="password" required placeholder="Password"> <br>
                        </div>
                        <div class="forgot-pass">
                            <a href="#">Forgot Password</a> 
                        </div>  
                        <br>
                        <div class="sign-in-btn">
                            <input type="submit" value="Sign in">
                        </div>
                       
                    </form>
                     
                </div>
            </div>
           
    
</div>
</body>

</html>