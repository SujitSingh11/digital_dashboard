<?php
    // Escape all $_POST variables to protect against SQL injections
    $first_name = mysqli_real_escape_string($conn,$_POST['fname']);
    $last_name = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $dob =  date('Y-m-d', $_POST['dob']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $passcheck = mysqli_real_escape_string($conn,$_POST['re-password']);
    $user_type = 2;

    
?>
