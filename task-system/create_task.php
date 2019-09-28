<?php

include '../assets/db/connect_db.php';
session_start();

$task_name = mysqli_real_escape_string($conn,$_POST['task_name']);
$task_desc = mysqli_real_escape_string($conn,$_POST['task_desc']);
$deadline = mysqli_real_escape_string($conn,$_POST['deadline']);
$project_id = $_SESSION['project_id'];
$user_id= $_SESSION['user_id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT manager_id FROM fl_manager WHERE user_id='$user_id'"));
$manager_id= $row['manager_id'];


$slc_prj = $conn->query("SELECT * FROM fl_task WHERE project_id = '$project_id' AND task_name = '$task_name' ");

if($slc_prj->num_rows> 0 ) {
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'This task already exists for this project!';
	header("location: ../manager/manager_dashboard.php");
}
else
{
	$crt_prj = "INSERT INTO fl_task (project_id, task_name, task_description, manager_id, deadline, task_status) VALUES ('$project_id', '$task_name', '$task_desc', '$manager_id', '$deadline', 0)";

	if($conn->query($crt_prj) === TRUE)
	{
		$_SESSION['mess_type'] = 'success';
		$_SESSION['mess_title'] = 'Task Created';
		$_SESSION['message'] = 'Task successfully created!';
		header("location: ../manager/manager_dashboard.php");
	}
	else
	{
		$_SESSION['mess_type'] = 'danger';
		$_SESSION['mess_title'] = 'Error';
		$_SESSION['message'] = 'Task could not be created! Contact SysAdmin.';
		header("location: ../manager/manager_dashboard.php");
	}
}

?>
