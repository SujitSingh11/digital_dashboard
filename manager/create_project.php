<?php

include '../assets/db/connect_db.php';
session_start();

$user_id = $_SESSION['user_id'];

$project_name = mysqli_real_escape_string($conn,$_POST['project_name']);
$project_desc = mysqli_real_escape_string($conn,$_POST['project_desc']);
$deadline = date(Y-m-d,strtotime($_POST['deadline']));
$manager_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT manager_id FROM fl_manager WHERE user_id='$user_id'"));


if($slc_prj->num_rows > 0 ) {
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'This Project already exists!';
	header("location: ../home.php");
}
else
{
	$m_id = $manager_id['manager_id']
	$crt_prj = mysqli_query($conn, "INSERT INTO fl_project (manager_id, project_name, project_desc, deadline) VALUES ('$m_id', '$project_name', '$project_desc', $deadline)");

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
