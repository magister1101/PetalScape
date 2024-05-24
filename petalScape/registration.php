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
    <label for="haveAnAccount">Have an Account?</label>
    <a href="login.php">Sign Up</a>
    <form action="functions/func_registration.php" method="post" enctype="multipart/form-data"> <br>
        <label for="firstName">First Name:</label> <br>
        <input type="text" name="firstName" id="firstName" required> <br>
        <label for="lastName">Last Name:</label> <br>
        <input type="text" name="lastName" id="lastName" required> <br>
        <label for="userName">User Name:</label> <br>
        <input type="text" name="userName" id="userName" required> <br>
        <label for="password">Password:</label> <br>
        <input type="password" name="password" id="password" required> <br>
        <label for="email">Email:</label> <br>
        <input type="email" name="email" id="email" required> <br>
        <label for="contactNumber">Contact Number:</label> <br>
        <input type="number" name="contactNumber" id="contactNumber" required> <br>
        <label for="address">Address:</label> <br>
        <input type="text" name="address" id="address" required> <br>
        <label for="image">Add Image:</label><br>
        <input type="file" name="image" id="image" required><br>
        <input type="submit" value="Register">
    </form>
</body>

</html>