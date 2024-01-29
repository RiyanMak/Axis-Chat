<?php 
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn,$_POST['']);
    $lname = mysqli_real_escape_string($conn,$_POST['']);
    $email = mysqli_real_escape_string($conn,$_POST['']);
    $password = mysqli_real_escape_string($conn,$_POST['']);
?>