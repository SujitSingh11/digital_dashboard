<?php
    include '';
    // Escape all $_POST variables to protect against SQL injections
    $first_name = mysqli_real_escape_string($conn,$_POST['fname']);
    $last_name = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $dob =  date('Y-m-d', $_POST['dob']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $passcheck = mysqli_real_escape_string($conn,$_POST['re-password']);
    $user_type = 2;

    if($pass=$passcheck)
    {   // Password Encription
        $password = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = $conn->escape_string( md5( rand(0,1000)));

        // Check if user with that email already exists
        $result = $conn->query("SELECT * FROM users WHERE email='$email'");

        // We know user email exists if the rows returned are more than 0
        if ( $result->num_rows > 0 ) {

            $_SESSION['message'] = 'User with this email already exists!';
            header("location: ../error.php");

        }
        else {
            // Email doesn't already exist in a database, proceed...
            // Classifying Type of User
            if ($user_type=="Staff") {
                $user_rank = 1;
            }
            elseif ($user_type=="Student") {
                $user_rank = 2;
            }

            // active is 0 by DEFAULT (no need to include it here)
            $sql_users = "INSERT INTO users (first_name, last_name, username, email, password, hash, user_type)
            VALUES ('$first_name','$last_name','$username','$email','$password', '$hash', '$user_rank')";
            // Add user to the users table
            $query = mysqli_query($conn,$sql_users);
        }
?>
