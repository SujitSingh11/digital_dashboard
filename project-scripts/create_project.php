<?php

include '../assets/db/connect_db.php';
session_start();

$project_name = mysqli_real_escape_string($conn,$_POST['project_name']);
$project_desc = mysqli_real_escape_string($conn,$_POST['project_desc']);
$dept_code = mysqli_real_escape_string($conn,$_POST['dept_code']);
$deadline = mysqli_real_escape_string($conn,$_POST['deadline']);

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
?>
