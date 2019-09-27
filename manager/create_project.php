<?php

include '../assets/db/connect_db.php';
session_start();

$userid = $_SESSION['user_id'];

$project_name = mysqli_real_escape_string($conn,$_POST['project_name']);
$project_desc = mysqli_real_escape_string($conn,$_POST['project_desc']);
$deadline = mysqli_real_escape_string($conn,$_POST['deadline']);
$manager_id = mysqli_query($conn, "SELECT manager_id FROM fl_manager WHERE user_id='$user_id'");

$slc_prj = $conn->query("SELECT * FROM fl_project WHERE manager_id = '$manager_id' AND project_name = '$project_name' ");

if($slc_prj->num_rows > 0 ) {
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'This Project already exists!';
	header("location: ../home.php");
}
else
{
	$crt_prj = mysqli_query($conn, "INSERT INTO fl_project (manager_id, project_name, project_desc, deadline) VALUES ($_SESSION['manager_id'], '$project_name', '$project_desc', $deadline)");

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
