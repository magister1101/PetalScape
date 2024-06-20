<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    #error_reporting(0);
    session_start();
    include 'constants/config.php';

    //checks if logged in
    if (!isset($_SESSION['id'])) {
        echo "<script>location.href='index.php'</script>";
    }

    $id = $_SESSION['id'];
    $query = "SELECT * FROM `accounts` where `id` = '$id'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_fetch_assoc($result);
    $name = $rows["firstName"] . " " . $rows['lastName'];

    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="css/Profile.css">
    <style>
         .nav-header {
            background-image: url('img/bg2-header.png');
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            height: 260px;
        }
        .main-container{
            overflow: hidden;
        }
        .profile-content-cont{
            background-image: url('img/profile-bg.png');
            background-repeat: no-repeat;
            background-size: 115%;
            margin-left: -17%;
            display: flex;
            width: 120%;
            height: 900px;
            margin-top: -2%;
        }
        
        footer {
            background-image: url('img/bg.png');
            background-repeat: no-repeat;
            background-size: 100%;
            height: 670px;

        }

        footer hr {
            border: 1px solid #61AE4C;
            opacity: 30%;
        }
    </style>

</head>

<body>
<div class="main-container">
    <div class="nav-header">
        <?php include 'constants/navbar.php'; ?>
    </div>

    <div class="my-acc-txt">
        <h1>My Account</h1>
    </div>
   

    <div class="profile-content-cont">
        <div class="profile-info">
            <div class="img-name-cont">
                <img src="img/profile-pic.jpg" alt="Profile Picture">
                <h2><?php echo $name ?></h2>
            </div>
            <div class="profile-buttons">
                <a onclick="window.location.href='profile.php?section=manage-account'"><p>Manage Account</p></a>
                <a onclick="window.location.href='profile.php?section=view-orders'"><p>View Orders</p></a>
                <a onclick="window.location.href='functions/func_logout.php'"><p>Logout</p></a>
            </div>
        </div>
        <div class="content-section">
            <?php
            if (isset($_GET['section'])) {
                $section = $_GET['section'];
                switch ($section) {
                    case 'manage-account':
                        include 'manage_account.php';
                        break;
                    case 'view-orders':
                        include 'view_orders.php';
                        break;
                        // case 'view-wishlist':
                        //     include 'view_wishlist.php';
                        //     break;
                }
            } else {
                echo "<p>Welcome to your account. Please select an option.</p>";
            }
            ?>
        </div>
    </div>
    
    <div class="div"></div>
</div>
</body>
<footer>
    <hr>
    <div class="contact-info">
        <div class="phone-info">
            <img src="img/phone.png">
            <div class="contact-text">
                <H1>Contact us</H1>
                <p>0915 670 0925</p>
            </div>

        </div>
        <div class="email-info">
            <img src="img/email.png">
            <div class="email-text">
                <H1>Email us</H1>
                <p>petalscape@gmail.com</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="petalscape-info">
        <div class="footer-logo">
            <h1>Petalscape</h1>
            <img src="img/Logo.png">

            <div class="footer-icons">
                <p>Get in touch</p>
                <img src="img/facebook.png">
                <img src="img/insta.png">
            </div>
        </div>

        <div class="location-footer">
            <h1>Location</h1>
            <p>Bacoor, Cavite <br>Philippines</p>
            <div class="office-hour-footer">
                <h1>Office Hours</h1>
                <p>Monday to Saturday<br>8:00am - 6:00pm</p>
            </div>
        </div>

        <div class="legal-info-footer">
            <h1>Legal information</h1>
            <p>Delivery Information</p>
            <p>Privacy/ Policy</p>
            <p>Terms & conditions</p>
        </div>
    </div>
    <hr>
    <div class="rights-reserved">
        <p>© 2024. Petalscape PH. All Rights Reserved.</p>
    </div>
</footer>
</html>