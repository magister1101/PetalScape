
<!DOCTYPE html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/manage-account.css">
</head>

<body>
    <?php
    include 'constants/config.php';

    // Fetch user details from database
    $id = $_SESSION['id'];
    $query = "SELECT * FROM `accounts` where `id` = '$id'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_assoc($result);
    ?>

    <div class="manage-container">
        <div class="manage-acc-txt">
            <h2>Manage Account</h2>
        </div>
       
        <form action="functions/func_updateAccount.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
        <div class="manage-info-cont">
            <div class="fname-lname-uname-pass-email-num-cont">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" value="<?php echo $rows['firstName']; ?>" required> <br>

                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" value="<?php echo $rows['lastName']; ?>" required> <br>

                <label for="userName">Username</label>
                <input type="text" name="userName" id="userName" value="<?php echo $rows['userName']; ?>" required> <br>

                <label for="password">Password</label>
                <input type="password" name="password" id="password"> <br>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $rows['email']; ?>" required> <br>

                <label for="contactNumber">Contact Number</label>
                <input type="text" name="contactNumber" id="contactNumber" value="<?php echo $rows['contactNumber']; ?>" required> <br>
            </div>
           
            <div class="address-propic-cont">
                <label for="address">Address</label>
                <input  type="text" name="address" id="address" value="<?php echo $rows['address']; ?>" required><br>

                <label for="img">Profile Picture</label>
                <div class="input-file-profile">
                    <input type="file" name="img" id="img"> <br>
                </div>

                <div class="submit-btn">
                    <input type="submit" value="Update Account"> 
                </div>
                
            </div>
        </div>
           
        </form>
    </div>
</body>