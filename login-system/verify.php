<?php
    include '../assets/db/connect_db.php';
    session_start();

    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
        $email = mysqli_real_escape_string($conn,$_GET['email']);
        $hash = mysqli_real_escape_string($conn,$_GET['hash']);

        $result = $conn->query("SELECT * FROM fl_user WHERE email='$email' AND hash='$hash' AND active='0'");

        if ( $result->num_rows == 0 )
        {
            $_SESSION['mess_type'] = 'warning';
			$_SESSION['mess_title'] = 'Warning';
			$_SESSION['message'] = 'Account has already been activated or the URL is invalid!';
			header("location: ../index.php");
        }
        else {
            header("location: ../success.php");
            $_SESSION['mess_type'] = 'success';
			$_SESSION['mess_title'] = 'Success';
			$_SESSION['message'] = 'Your account has been activated, Please login..';
            $conn->query("UPDATE fl_user SET active='1' WHERE email='$email'");
			header("location: ../index.php");
        }
    }
    else {
        $_SESSION['mess_type'] = 'warning';
        $_SESSION['mess_title'] = 'Warning';
        $_SESSION['message'] = 'Invalid parameters provided for account verification!';
        header("location: ../index.php");
    }
?>
