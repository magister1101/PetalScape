<?php
include 'constants/config.php';

// Fetch user details from database
$id = $_SESSION['id'];
$query = "SELECT * FROM `accounts` where `id` = '$id'";
$result = mysqli_query($conn, $query);
$rows = mysqli_fetch_assoc($result);
?>

<div>
    <h2>Manage Account</h2>
    <form action="functions/func_updateAccount.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">

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

        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="<?php echo $rows['address']; ?>" required> <br>

        <label for="img">Profile Picture</label>
        <input type="file" name="img" id="img"> <br>

        <input type="submit" value="Update Account">
    </form>
</div>