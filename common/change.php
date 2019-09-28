<?php

include '../assets/db/connect_db.php';
session_start();

$user_id = $_POST['user_id'];
$user_type= $_SESSION['user_type'];

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

$query = "UPDATE fl_user SET first_name = '$first_name', last_name = '$last_name' WHERE user_id='$user_id';";

if($conn->query($query) === TRUE)
{
	$_SESSION['mess_type'] = 'success';
	$_SESSION['mess_title'] = 'Success';
	$_SESSION['message'] = 'Profile successfully Updated!';

	$_SESSION['first_name'] = $first_name;
	$_SESSION['last_name'] = $last_name;
	if($user_type==0)
		header("location: ../admin/admin_profile.php");
	else if($user_type==1)
		header("location: ../manager/manager_profile.php");
	else if($user_type==2)
		header("location: ../employee/employee_profile.php");
}
else
{
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'Profile could not be updated! Contact SysAdmin.';
	if($user_type==0)
		header("location: ../admin/admin_profile.php");
	else if($user_type==1)
		header("location: ../manager/manager_profile.php");
	else if($user_type==2)
		header("location: ../employee/employee_profile.php");
}