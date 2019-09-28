<?php

include '../assets/db/connect_db.php';
session_start();

$project_id = mysqli_real_escape_string($conn,$_POST['project_id']);
$project_name = mysqli_real_escape_string($conn,$_POST['project_name']);
$project_desc = mysqli_real_escape_string($conn,$_POST['project_desc']);
$deadline = date(strtotime($conn,$_POST['deadline']));

$user_id= $_SESSION['user_id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT manager_id FROM fl_manager WHERE user_id='$user_id'"));
$manager_id= $row['manager_id'];

$sel_proj = "SELECT * FROM fl_project WHERE manager_id = '$manager_id' AND project_name = '$project_name'";
$res = mysqli_query($conn,$sel_proj);
if(mysqli_affected_rows($conn) == 1) {

	$edit_prj = $conn->query("UPDATE fl_project SET project_name = '$project_name', project_desc = '$project_desc', deadline = $deadline WHERE project_id = '$project_id'");

	if(mysqli_affected_rows($conn) == 1)
	{
		$_SESSION['mess_type'] = 'success';
		$_SESSION['mess_title'] = 'Project Edited';
		$_SESSION['message'] = 'Project successfully Edited!';
		header("location: manager_dashboard.php");
	}
	else
	{
		$_SESSION['mess_type'] = 'danger';
		$_SESSION['mess_title'] = 'Error';
		$_SESSION['message'] = 'Project could not be edited! Whaaattttt. Contact SysAdmin. Inside success';
		header("location: manager_dashboard.php");
	}
}
else
{
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'Project could not be edited! Contact SysAdmin.';
	header("location: manager_dashboard.php");
}

?>
