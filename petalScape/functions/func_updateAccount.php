<?php
session_start();
include '../constants/config.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $firstName = addslashes($_POST['firstName']);
    $lastName = addslashes($_POST['lastName']);
    $userName = addslashes($_POST['userName']);
    $password = isset($_POST['password']) && !empty($_POST['password']) ? addslashes($_POST['password']) : null;
    $email = addslashes($_POST['email']);
    $contactNumber = addslashes($_POST['contactNumber']);
    $address = addslashes($_POST['address']);
    $img = $_FILES['img']['name'];

    if ($img) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

        $img_query = ", img='$img'";
    } else {
        $img_query = "";
    }

    if ($password) {
        $query = "UPDATE accounts SET firstName='$firstName', lastName='$lastName', userName='$userName', password='$password', email='$email', contactNumber='$contactNumber', address='$address'$img_query WHERE id='$id'";
    } else {
        $query = "UPDATE accounts SET firstName='$firstName', lastName='$lastName', userName='$userName', email='$email', contactNumber='$contactNumber', address='$address'$img_query WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Account updated successfully');</script>";
        echo "<script>location.href='../profile.php?section=manage-account';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
