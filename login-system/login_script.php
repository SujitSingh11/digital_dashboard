<?php
require '../assets/db/connect_db.php';
session_start();

$email = mysqli_real_escape_string($conn,$_POST['email']);
$result = $conn->query("SELECT * FROM fl_user WHERE email='$email'");

if ( $result->num_rows == 0 ){
		$_SESSION['mess_type'] = 'danger';
		$_SESSION['mess_title'] = 'Error';
		$_SESSION['message'] = 'User with that email does not exist!';
		header("location: ../index.php");
}
else {
	$user = $result->fetch_assoc();
	if ( password_verify($_POST['password'], $user['password'])) {
		if ($user['active'] == 1) {
			$_SESSION['user_id'] = $user['user_id'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['first_name'] = $user['first_name'];
			$_SESSION['last_name'] = $user['last_name'];
			$_SESSION['active'] = $user['active'];
			$_SESSION['user_type'] = $user['user_type'];
			$_SESSION['logged_in'] = true;
			$user['login_counter'] +=1;
			$counter = $user['login_counter'];
			$sql_counter_inc = $conn->query("INSERT INTO fl_user (login_counter) VALUES('$counter')");
			if ($sql_counter_inc) {
				if ($_SESSION['user_type'] == 0) {
					$result_usertype = $conn->query("SELECT admin_id FROM fl_admin WHERE user_id='{$_SESSION['user_id']}'");
					$usertype = $result_usertype->fetch_assoc();
					$_SESSION['admin_id'] = $usertype['admin_id'];
					header("location: ../home.php");
				}
				elseif ($_SESSION['user_type'] == 1) {
					$result_usertype = $conn->query("SELECT employee_id FROM fl_employee WHERE user_id='{$_SESSION['user_id']}'");
					$usertype = $result_usertype->fetch_assoc();
					$_SESSION['employee_id'] = $usertype['employee_id'];
					header("location: ../home.php");
				}
				elseif ($_SESSION['user_type'] == 2) {
					$result_usertype = $conn->query("SELECT manager_id FROM fl_manager WHERE user_id='{$_SESSION['user_id']}'");
					$usertype = $result_usertype->fetch_assoc();
					$_SESSION['manager_id'] = $usertype['manager_id'];
					header("location: ../home.php");
				}
			}
		}
		else{
			$_SESSION['mess_type'] = 'warning';
			$_SESSION['mess_title'] = 'Warning';
			$_SESSION['message'] = 'Email havn\'t been verified!';
			header("location: ../index.php");
		}

	}
	else {
		$_SESSION['mess_type'] = 'danger';
			$_SESSION['mess_title'] = 'Error';
			$_SESSION['message'] = 'You have entered wrong password, try again!';
			header("location: ../index.php");
	}
}
