<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    error_reporting(0);
    session_start();
    include 'constants/config.php';
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
</head>

<body>

    <div class="gcash-qr-code">
        <img src="" alt="">
    </div>

    <div class="gcash-receipt">
        <form action="functions/func_checkout.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image" required><br>
        </form>
    </div>



</body>

</html>