<?php

#error_reporting(0);
include '../constants/config.php';

$userName = addslashes($_POST["userName"]);
$password = addslashes($_POST["password"]);
$firstName = addslashes($_POST["firstName"]);
$lastName = addslashes($_POST["lastName"]);
$email = addslashes($_POST["email"]);
$contactNumber = addslashes($_POST["contactNumber"]);
$address = addslashes($_POST["address"]);

$fileName = $_FILES["image"]["name"];
$tempName = $_FILES["image"]["tmp_name"];
$folder = "../uploads/" . $fileName;

$query = "INSERT INTO `accounts`(`userName`, `password`, `firstName`, `lastName`, `email`, `contactNumber`, `address`, `img`) VALUES ('$userName','$password','$firstName','$lastName','$email','$contactNumber','$address', '$fileName')";
$insert = mysqli_query($conn, $query);

if(move_uploaded_file($tempName, $folder)){
    
}



echo "<script>location.href='../index.php'</script>";


