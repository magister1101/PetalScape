<?php
session_start();
error_reporting(0);

include '../constants/config.php';

$inputUserName = addslashes($_POST['userName']);
$inputPassword = addslashes($_POST['password']);

$result = mysqli_query($conn, "SELECT * FROM `accounts` WHERE `userName` = '$inputUserName'"); //gets the info that matches the user from the database
$rows = mysqli_fetch_assoc($result); //fetches the result and stores them

//grabs the data from the table and stores them in a variable
$id = $rows["id"];
$password = $rows["password"];

if (isset($_SESSION['id'])) { //checks if the user is already logged in by checking if session(ID) is set.

    echo "<script>location.href='../index.php'</script>";
} else {

    if ($inputPassword == $password) {
        $_SESSION['id'] = $id; //puts the ID into a universal session that checks every page if it is logged in or not
        echo "<script>location.href='../index.php'</script>"; //proceeds to admin page

    } else {

        echo "<script>alert('email or password incorrect')</script>";
        echo "<script>location.href='../index.php'</script>";
    }
}
