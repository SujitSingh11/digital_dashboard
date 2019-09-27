<?php

include '../assets/db/connect_db.php';
session_start();

$user_id = $_SESSION['user_id'];

$project_name = mysqli_real_escape_string($conn,$_POST['project_name']);
$project_desc = mysqli_real_escape_string($conn,$_POST['project_description']);
$deadline = date("Y-m-d", strtotime(mysqli_real_escape_string($conn,$_POST['deadline'])));
$row = mysqli_query($conn, "SELECT manager_id FROM fl_manager WHERE user_id='$user_id'");
$manager_id = $row->fetch_assoc();

$slc_prj = mysqli_query($conn, "SELECT * FROM fl_project WHERE manager_id = '$manager_id' AND project_name = '$project_name'");


if($slc_prj->num_rows > 0 ) {
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'This Project already exists!';
	header("location: ../home.php");
}
else
{
	$crt_prj = mysqli_query($conn, "INSERT INTO fl_project (manager_id, project_name, project_desc, deadline) VALUES ('$manager_id', '$project_name', '$project_desc', $deadline)");

	if(crt_prj)
	{
		$_SESSION['mess_type'] = 'success';
		$_SESSION['mess_title'] = 'Project Created';
		$_SESSION['message'] = 'Project successfully created!';
		header("location: manager_dashboard.php");
	}
	else
	{
		$_SESSION['mess_type'] = 'danger';
		$_SESSION['mess_title'] = 'Error';
		$_SESSION['message'] = 'Project could not be created! Contact SysAdmin.';
		header("location: manager_dashboard.php");
	}


}

?>
