<?php

include '../assets/db/connect_db.php';
session_start();

$task_name = mysqli_real_escape_string($conn,$_POST['task_name']);
$task_desc = mysqli_real_escape_string($conn,$_POST['task_desc']);
$deadline = mysqli_real_escape_string($conn,$_POST['deadline']);
$project_id = mysqli_real_escape_string($conn,$_POST['project_id']);
$manager_id = $_SESSION['manager_id'];

$slc_prj = $conn->query("SELECT * FROM fl_task WHERE project_id = '$project_id' AND task_name = '$task_name' ");

if($slc_prj->num_rows() > 0 ) {
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'This task already exists for this project!';
	header("location: ../project.php");
}
else
{
	$crt_prj = $conn->query("INSERT INTO fl_task (project_id, task_name, task_desc, manager_id, deadline) VALUES ('$project_id', '$task_name', '$task_desc', '$manager_id', '$deadline')");

	if(mysqli_num_rows($crt_prj) > 0)
	{
		$_SESSION['mess_type'] = 'success';
		$_SESSION['mess_title'] = 'Project Created';
		$_SESSION['message'] = 'Project successfully created!';
		header("location: ../projects.php");
	}
	else
	{
		$_SESSION['mess_type'] = 'danger';
		$_SESSION['mess_title'] = 'Error';
		$_SESSION['message'] = 'Project could not be created! Contact SysAdmin.';
		header("location: ../projects.php");
	}
}

?>
