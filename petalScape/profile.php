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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
</head>

<body>
    <div class="header-nav">
        <?php include 'constants/navbar.php'; ?>
    </div>
    <div class="profile-info">
        <h1>MY ACCOUNT</h1>
        <img src="img/profile-pic.jpg" alt="Profile Picture">
        <h2><?php echo $name ?></h2>
        <div class="profile-buttons">
            <button onclick="window.location.href='profile.php?section=manage-account'">Manage Account</button>
            <button onclick="window.location.href='profile.php?section=view-orders'">View Orders</button>
            <button onclick="window.location.href='functions/func_logout.php'">Logout</button>
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
</body>

</html>