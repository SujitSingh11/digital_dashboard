<?php

include '../assets/db/connect_db.php';
session_start();

$project_id = mysqli_real_escape_string($conn,$_POST['project_id']);
$project_name = mysqli_real_escape_string($conn,$_POST['project_name']);
$project_desc = mysqli_real_escape_string($conn,$_POST['project_desc']);
$dept_code = mysqli_real_escape_string($conn,$_POST['dept_code']);
$deadline = mysqli_real_escape_string($conn,$_POST['deadline']);

$slc_prj = $conn->query("SELECT * FROM fl_project WHERE manager_id = '$manager_id' AND project_name = '$project_name' ");

if($slc_prj->num_rows > 0 ) {

	$edit_prj = $conn->query("UPDATE fl_project SET project_name = '$project_name', project_desc = '$project_desc', deadline = '$deadline' WHERE project_id = '$project_id'");

	if(edit_prj)
	{
		$_SESSION['mess_type'] = 'success';
		$_SESSION['mess_title'] = 'Project Edited';
		$_SESSION['message'] = 'Project successfully Edited!';
		header("location: ../projects.php");
	}
	else
	{
		$_SESSION['mess_type'] = 'danger';
		$_SESSION['mess_title'] = 'Error';
		$_SESSION['message'] = 'Project could not be edited! Contact SysAdmin.';
		header("location: ../projects.php");
	}

}
else
{

	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'Project could not be edited! Contact SysAdmin.';
	header("location: ../projects.php");


}

?>
