<?php
	include '../assets/db/connect_db.php';
	session_start();
	if ($_SESSION['logged_in'] == false AND $_SESSION['user_type']==2) {
		$_SESSION['mess_type'] = 'warning';
		$_SESSION['mess_title'] = 'Warning';
		$_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
		die(header('Location: ../index.php'));
	}
	$employee_id = $_SESSION['employee_id'];
	$sql_project = "SELECT fl_project.project_id AS project_id, fl_manager.manager_id AS m_id, fl_project.project_name AS name, fl_project.project_desc AS p_desc,
	fl_project.deadline AS deadline, fl_project.time_created AS created
			FROM fl_project
			INNER JOIN fl_manager ON fl_manager.manager_id = fl_project.manager_id";
	$query_project = mysqli_query($conn,$sql_project);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dashboard | Home for Flow</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<?php
		include '../include/css_include.php';
	?>
</head>
<body>
	<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand pt-0" href="index.html">
				<img src="../assets/img/logo_black.png" class="navbar-brand-img" alt="...">
			</a>
			<ul class="nav align-items-center d-md-none">
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
								<img src="../assets/img/logo_black.png" class="navbar-brand-img" alt="...">
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
					<div class="nav-item">
						<h3><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'].'.' ?></h3>
						<p>
							Employee
						</p>
					</div>
					<li class="nav-item">
						<a class="nav-link   " href="employee_profile.php"><i class="ni ni-single-02 text-yellow"></i> Profile</a>
					</li>
					<li class="nav-item">
						<a class=" nav-link " href="employee_dashboard.php"><i class="ni ni-tv-2 text-primary"></i> Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="employee_project.php"><i class="ni ni-planet text-blue"></i> Projects</a>
					</li>
				</ul>
				<!-- Divider -->
				<hr class="my-3">
				<ul class="navbar-nav mb-md-3">
					<li class="nav-item">
						<button type="submit" class="btn btn-icon btn-3 btn-danger" id="logout"><i class="ni ni-button-power"></i>  Signout</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="main-content">
		<div class="container-fluid mt-5">
			<h1>Projects :</h1>
			<hr>
			<div class="header-body">
				<?php
					if (isset($_SESSION['message'])) {
						?>
						<div id="message" class="alert alert-<?php echo $_SESSION['mess_type']?>" role="alert">
							<strong><?php echo $_SESSION['mess_title']?>!</strong> <?php echo $_SESSION['message']?>
							<button style="align: right;" onclick="document.getElementById('message').style.display='none'" ><i class="ni ni-fat-remove text-blue"></i></button>
						</div>
						<?php
						unset($_SESSION['message']);
						unset($_SESSION['mess_type']);
						unset($_SESSION['mess_title']);
					}
				?>
			</div>
			<div class="container">
				<div class="mt-3">
					<div class="col-10 md-5 offset-1">
						<div class="card ">
							<h2 class="card-title m-2 p-3">Projects</h2>
							<hr>
							<div class="card-body p-2 m-2">
								<table class="table">
								  <thead class="thead-light">
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">Project</th>
									  <th scope="col">Description</th>
									  <th scope="col">Created By</th>
									  <th scope="col">Deadline</th>
									  <th scope="col">Action</th>
									</tr>
								  </thead>
								  <tbody>
									  <?php
										  $no = 1;
										  while ($row_project = mysqli_fetch_assoc($query_project)) {
											  $m_id=$row_project['m_id'];
											  $sql_manager_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT fl_user.user_id AS user_id, fl_manager.manager_id AS m_id, fl_user.first_name AS fname, fl_user.last_name AS lname
													FROM fl_user
													INNER JOIN fl_manager ON fl_manager.user_id = fl_user.user_id WHERE manager_id = $m_id"));
									  ?>
										  <tr>
											  <td><?= $no ?></td>
											  <td><?= $row_project['name']?></td>
											  <td><?= $row_project['p_desc']?></td>
											  <td><?= $sql_manager_name['fname'].' '.$sql_manager_name['lname']?></td>
											  <td><?= $row_project['deadline']?>
											  </td>

											  <td>
												  <form class="form-button-action" action="employee_task.php" method="POST">
													  <input type="hidden" name="user_id" value="<?=$row_project['user_id']?>">
													  <input type="hidden" name="m_id" value="<?=$row_project['m_id']?>">
													  <input type="hidden" name="project_id" value="<?=$row_project['project_id']?>">

														<div class="dropdown">
														  <button class="btn btn-secondary" type="button" aria-expanded="false">
														    View
														  </button>
														</div>
												  </form>
											  </td>
										  </tr>
									  <?php
										  $no++;

										  }
									  ?>
								  </tbody>
								</table>

							</div>
						</div>

						<div class="card my-3 border-danger">
							<h2 class="card-title bg-danger m-2 p-3">On Hold</h2>
							<hr>
							<div class="card-body p-2 m-2">
								<table class="table">
								  <thead class="thead-light">
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">Project</th>
									  <th scope="col">Description</th>
									  <th scope="col">Created By</th>
									  <th scope="col">Deadline</th>
									  <th scope="col">Action</th>
									</tr>
								  </thead>
								  <tbody>
									  <?php
										  $no = 1;
										  while ($row_project = mysqli_fetch_assoc($query_project)) {
											  $m_id=$row_project['m_id'];
											  $sql_manager_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT fl_user.user_id AS user_id, fl_manager.manager_id AS m_id, fl_user.first_name AS fname, fl_user.last_name AS lname
													FROM fl_user
													INNER JOIN fl_manager ON fl_manager.user_id = fl_user.user_id WHERE manager_id = $m_id"));
									  ?>
										  <tr>
											  <td><?= $no ?></td>
											  <td><?= $row_project['name']?></td>
											  <td><?= $row_project['p_desc']?></td>
											  <td><?= $sql_manager_name['fname'].' '.$sql_manager_name['lname']?></td>
											  <td><?= $row_project['deadline']?>
											  </td>

											  <td>
												  <form class="form-button-action" action="employee_task.php" method="POST">
													  <input type="hidden" name="user_id" value="<?=$row_project['user_id']?>">
													  <input type="hidden" name="m_id" value="<?=$row_project['m_id']?>">
													  <input type="hidden" name="project_id" value="<?=$row_project['project_id']?>">
														<div class="dropdown">
														  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														    Status
														  </button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														    	<a class="dropdown-item" href="#">Ongoing</a>
														    	<a class="dropdown-item" href="#">Completed</a>
															</div>
														</div>
												  </form>
											  </td>
										  </tr>
									  <?php
										  $no++;

										  }
									  ?>
								  </tbody>
								</table>

							</div>
						</div>

						<div class="card my-3 border-success">
							<h2 class="card-title bg-success m-2 p-3">Completed</h2>
							<hr>
							<div class="card-body p-2 m-2">
								<table class="table">
								  <thead class="thead-light">
									<tr>
									  <th scope="col">#</th>
									  <th scope="col">Project</th>
									  <th scope="col">Description</th>
									  <th scope="col">Created By</th>
									  <th scope="col">Deadline</th>
									  <th scope="col">Action</th>
									</tr>
								  </thead>
								  <tbody>
									  <?php
										  $no = 1;
										  while ($row_project = mysqli_fetch_assoc($query_project)) {
											  $m_id=$row_project['m_id'];
											  $sql_manager_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT fl_user.user_id AS user_id, fl_manager.manager_id AS m_id, fl_user.first_name AS fname, fl_user.last_name AS lname
													FROM fl_user
													INNER JOIN fl_manager ON fl_manager.user_id = fl_user.user_id WHERE manager_id = $m_id"));
									  ?>
										  <tr>
											  <td><?= $no ?></td>
											  <td><?= $row_project['name']?></td>
											  <td><?= $row_project['p_desc']?></td>
											  <td><?= $sql_manager_name['fname'].' '.$sql_manager_name['lname']?></td>
											  <td><?= $row_project['deadline']?>
											  </td>

											  <td>
												  <form class="form-button-action" action="employee_task.php" method="POST">
													  <input type="hidden" name="user_id" value="<?=$row_project['user_id']?>">
													  <input type="hidden" name="m_id" value="<?=$row_project['m_id']?>">
													  <input type="hidden" name="project_id" value="<?=$row_project['project_id']?>">

														<div class="dropdown">
														  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														    Status
														  </button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														    	<a class="dropdown-item" href="#">Ongoing</a>
														    	<a class="dropdown-item" href="#">On Hold</a>
															</div>
														</div>
												  </form>
											  </td>
										  </tr>
									  <?php
										  $no++;

										  }
									  ?>
								  </tbody>
								</table>

							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

		<footer class="footer">
			<div class="container-fluid">
				<nav class="pull-left" style="float:left;">
					<ul class="nav">
						<li class="nav-item">
							<a class="nav-link" href="manager_index.php">
								Home
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								Help
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								Feedback
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright" style="float:right;">
					@2019 Made by Sujit Singh and Shubham Shirpurkar
				</div>
			</div>
		</footer>
	</div>
	<script>
		document.getElementById("logout").onclick = function () {
			location.href = "../login-system/logout.php";
		};
	</script>
	<?php
		include '../include/js_include.php';
	?>
</body>
</html>
