<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    include 'constants/config.php';
    session_start();
    include 'functions/func_checkIfLogin.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
</head>

<body>
    <label for="NoAccount">No Account?</label>
    <a href="registration.php">Sign Up</a>
    <form action="functions/func_login.php" method="post">
        <label for="userName">User Name:</label> <br>
        <input type="text" name="userName" id="userName" required> <br>
        <label for="userName">User Name:</label> <br>
        <input type="password" name="password" id="password" required> <br>
        <input type="submit" value="Login">
    </form>
    <a href="#">Forgot Password</a> 
</body>

</html>