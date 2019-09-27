<?php

include '../assets/db/connect_db.php';
session_start();

$task_name = mysqli_real_escape_string($conn,$_POST['task_name']);
$task_desc = mysqli_real_escape_string($conn,$_POST['task_desc']);
$dept_code = mysqli_real_escape_string($conn,$_POST['dept_code']);
$deadline = mysqli_real_escape_string($conn,$_POST['deadline']);
$project_id = mysqli_real_escape_string($conn,$_POST['project_id']);

$slc_prj = $conn->query("SELECT * FROM fl_task WHERE project_id = '$project_id' AND task_name = '$task_name' ");

if($slc_prj->num_rows > 0 ) {
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'This task already exists for this project!';
	header("location: ../project.php");)
}
else
{
	$crt_prj = $conn->query("INSERT INTO fl_project (manager_id, project_name, project_desc, dept_code, deadline) VALUES ($_SESSION['manager_id'], '$project_name', '$project_desc', 'dept_code', '$deadline')");

	if(crt_prj)
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
