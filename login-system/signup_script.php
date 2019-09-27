<?php
    include '../assets/db/connect_db.php';

    $first_name = mysqli_real_escape_string($conn,$_POST['fname']);
    $last_name = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $dob =  date('Y-m-d', $_POST['dob']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $passcheck = mysqli_real_escape_string($conn,$_POST['re-password']);
    $user_type = 2;

    if($pass=$passcheck)
    {
        $password = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = $conn->escape_string( md5( rand(0,1000)));

        $result = $conn->query("SELECT * FROM users WHERE email='$email'");

        if ( $result->num_rows > 0 ) {
            $_SESSION['mess_type'] = 'danger';
            $_SESSION['mess_title'] = 'Error';
            $_SESSION['message'] = 'User with this email already exists!';
            header("location: ../index.php");
        }
        else {
            $sql_users = "INSERT INTO users (first_name, last_name, username, email, password, hash, user_type)
            VALUES ('$first_name','$last_name','$email','$password', '$hash','$user_type')";

            $query = mysqli_query($conn,$sql_users);
        }
?>
