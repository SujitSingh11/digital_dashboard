<?php
    include '../assets/db/connect_db.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../vendor/autoload.php';
    session_start();

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

        $result = $conn->query("SELECT * FROM fl_users WHERE email='$email'");

        if ( $result->num_rows > 0 ) {
            $_SESSION['mess_type'] = 'danger';
            $_SESSION['mess_title'] = 'Error';
            $_SESSION['message'] = 'User with this email already exists!';
            header("location: ../index.php");
        }else {
            $sql_users = "INSERT INTO fl_users ( `first_name`, `last_name`, `dob`, `email`, `password`,`hash`,`user_type`)
            VALUES ('$first_name','$last_name','$dob','$email','$password','$hash','$user_type')";
            $query_users = mysqli_query($conn,$sql_users);

            $sql_employee = $conn->query("SELECT user_id from fl_user WHERE email='$email'");
            if ($result_userid->num_rows > 0) {
                $user_id_fetch = mysqli_fetch_assoc($result_userid);
                $user_id = (int) $user_id_fetch['user_id'];
                $sql_emp_user_id = "INSERT INTO fl_employee (user_id) VALUES ($user_id)";
                $query_emp_user_id = mysqli_query($conn,$sql_emp_user_id);
            }else {
                $_SESSION['mess_type'] = 'danger';
                $_SESSION['mess_title'] = 'Error';
                $_SESSION['message'] = 'Failed to add employee!';
            //    header("location: ../index.php");
            }
            if ($query){
                $_SESSION['mess_type'] = 'Success';
                $_SESSION['mess_title'] = 'Error';
                $_SESSION['message'] =
                "Confirmation link has been sent to $email, please verify
                your account by clicking on the link in the message!";
                $subject = 'Account Verification ( exam-in.com )';
                $message_body = '
                <h3>Hello '.$first_name.',</h3>
                <p>Thank you for signing up!<br>
                Please click this link to activate your account:<br></p>
                http://localhost/digital_dashboard/login-system/verify.php?email='.$email.'&hash='.$hash;

                $mail = new PHPMailer();
                try{
                    $mail->isSMTP();
                    $mail->Host = 'smtp.mail.yahoo.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'flow.assist@yahoo.com';
                    $mail->Password = 'flowassist420';
                    $mail->SMTPSecure = 'ssl';
                    $mail->Port = 465;

                    $mail->setFrom('flow.assist@yahoo.com','Flow');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body    = $message_body;
                    if (!$mail->send()) {
                        echo "Mail not sent";
                    }else{
                        $_SESSION['mess_type'] = 'success';
                        $_SESSION['mess_title'] = 'Success';
                        $_SESSION['message'] = 'Signup sccessfull please check your email to verify your account!';
                        header("location: ../index.php");
                    }
                }
                catch (Exception $e) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }
            }
        }
    }else {
        $_SESSION['mess_type'] = 'danger';
        $_SESSION['mess_title'] = 'Error';
        $_SESSION['message'] = 'Password dont match Please try Again!';
        header("location: ../index.php");
    }
?>
