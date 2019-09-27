<?php
    include '../assets/db/connect_db.php';
    session_start();

    $first_name = mysqli_real_escape_string($conn,$_POST['fname']);
    $last_name = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $passcheck = mysqli_real_escape_string($conn,$_POST['re-password']);
    $user_type = 1;
    $active = 1;

    if($pass=$passcheck)
    {
        $password = $conn->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = $conn->escape_string( md5( rand(0,1000)));

        $result = $conn->query("SELECT * FROM fl_user WHERE email='$email'");
        if ( $result->num_rows > 0 ) {
            $_SESSION['mess_type'] = 'danger';
            $_SESSION['mess_title'] = 'Error';
            $_SESSION['message'] = 'User with this email already exists!';
            header("location: ../home.php");
        }else {
            $sql_users = "INSERT INTO fl_user ( `first_name`, `last_name`, `email`, `password`,`hash`,`user_type`,`active`)
            VALUES ('$first_name','$last_name','$email','$password','$hash','$user_type',`$active`)";
            $query_users = mysqli_query($conn,$sql_users);

            $sql_manager = mysqli_query($conn,"SELECT user_id from fl_user WHERE email='$email'");

            if ($sql_manager->num_rows > 0) {
                $user_id_fetch = mysqli_fetch_assoc($sql_manager);
                $user_id = $user_id_fetch['user_id'];
                $sql_man_user_id = "INSERT INTO fl_manager (user_id) VALUES ($user_id)";
                $query_man_user_id = mysqli_query($conn,$sql_man_user_id);
                if ($query_man_user_id) {
                    $_SESSION['mess_type'] = 'success';
                    $_SESSION['mess_title'] = 'Success';
                    $_SESSION['message'] = 'Signup sccessfull please check your email to verify your account!';
                    header("location: ../home.php");
                }
            }else {
                $_SESSION['mess_type'] = 'danger';
                $_SESSION['mess_title'] = 'Error';
                $_SESSION['message'] = 'Failed to add employee!';
                header("location: ../home.php");
            }
        }
    }else {
        $_SESSION['mess_type'] = 'danger';
        $_SESSION['mess_title'] = 'Error';
        $_SESSION['message'] = 'Password dont match Please try Again!';
        header("location: ../home.php");
    }
?>
