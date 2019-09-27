<?php

	include 'assets/db/connect_db.php';

	session_start();

	$email=$_POST['email'];
	$pass=$_POST['password'];



	$passdb="SELECT ";

	if($pass==$passdb)
	{
		$_SESSION['fname']=$fname;
		$_SESSION['lname']=$
		header('location: home.php');

	}


?>