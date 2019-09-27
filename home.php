<?php

require 'assets/db/connect_db.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<title>
				Dashboard | Home for Flow
			</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  
		<link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
		<link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
	</head>
	<body class="">
		<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand pt-0" href="index.html">
					<img src="assets/img/logo_black.png" class="navbar-brand-img" alt="...">
				</a>
				
				<ul class="nav align-items-center d-md-none">
					<li class="nav-item dropdown">
						<a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="ni ni-bell-55"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
					<li class="nav-item dropdown">
			  <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				
			  </a>
			</li>
		  </ul>

		  <div class="collapse navbar-collapse text-center" id="sidenav-collapse-main">

			<div class="navbar-collapse-header d-md-none">
			  <div class="row">
				<div class="col-6 collapse-brand">
				  <a href="index.html">
					<img src="assets/img/brand/blue.png">
				  </a>
				</div>
				<div class="col-6 collapse-close">
				  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
					<span></span>
					<span></span>
				  </button>
				</div>
			  </div>
			</div>

			
			<!-- Navigation -->
			<ul class="navbar-nav">
				<div class="media align-items-center">
				  <span class="avatar avatar-sm rounded-circle">
					<img alt="Image placeholder" src="assets/img/favicon.png">
				  </span>
				</div>
				<li class="nav-item">
					<a class="nav-link  active " href="profile.php"><i class="ni ni-single-02 text-yellow"></i> Profile</a>
				</li>
				<li class="nav-item  class=" active>
					<a class=" nav-link " href="dashboard.php"><i class="ni ni-tv-2 text-primary"></i> Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="projects.php"><i class="ni ni-planet text-blue"></i> Projects</a>
				</li>
			</ul>
			<!-- Divider -->
			<hr class="my-3">
			<ul class="navbar-nav mb-md-3">
			  <li class="nav-item">
			  	<form method="post" action="login-system/signout.php">
			  		<button type="submit" class="btn btn-icon btn-3 btn-danger"><i class="ni ni-button-power"></i>  Signout</button>
			  	</form>
			  </li>
			</ul>
		  </div>
		</div>
	  </nav>
	  <div class="main-content">
		<!-- Navbar -->
		<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
		  <div class="container-fluid">
			<!-- Brand -->
			
			
			
		  </div>
		</nav>
		<!-- End Navbar -->
		
	  <!--   Core   -->
	  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
	  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	  <!--   Optional JS   -->
	  <!--   Argon JS   -->
	  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
	  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

	</body>

</html>