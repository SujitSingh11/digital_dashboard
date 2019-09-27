<?php

include '../assets/db/connect_db.php';
session_start();

$project_id = $_POST['project_id'];

$slc_prj = $conn->query("SELECT * FROM fl_project WHERE project_id = '$project_id'");

if($slc_prj->num_rows > 0 ) {
			
	$del_prj = $conn->query("DELETE FROM fl_project WHERE project_id = '$project_id'");
	$del_task = $conn->query("DELETE FROM fl_task WHERE project_id = '$project_id'");

	if(del_prj && del_task)
	{
		$_SESSION['mess_type'] = 'success';
		$_SESSION['mess_title'] = 'Project Deleted';
		$_SESSION['message'] = 'Project successfully deleted!';
		header("location: ../project.php");
	}
	else
	{
		$_SESSION['mess_type'] = 'danger';
		$_SESSION['mess_title'] = 'Error';
		$_SESSION['message'] = 'Project could not be deleted! Contact SysAdmin.';
		header("location: ../project.php");
	}
  
}
else
{
	$_SESSION['mess_type'] = 'danger';
	$_SESSION['mess_title'] = 'Error';
	$_SESSION['message'] = 'Project could not be deleted! Contact SysAdmin.';
	header("location: ../project.php");
}

?>
