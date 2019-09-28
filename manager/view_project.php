<?php
	include '../assets/db/connect_db.php';
	session_start();
	if ($_SESSION['logged_in'] == false AND $_SESSION['user_type']==1) {
		$_SESSION['mess_type'] = 'warning';
		$_SESSION['mess_title'] = 'Warning';
		$_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
		die(header('Location: ../index.php'));
	}
	$sql_project = "SELECT fl_project.project_id AS project_id, fl_project.manager_id AS m_id, fl_project.project_name AS name, fl_project.project_desc AS p_desc, fl_project.deadline AS deadline, fl_project.time_created AS created, fl_task.task_id AS t_id, fl_task.task_description AS t_desc,
	 		FROM fl_project
	 		INNER JOIN fl_task ON fl_project.project_id = fl_task.project_id";

	$project_id = $_POST['project_id'];
	$sql_project = "SELECT * FROM fl_project WHERE project_id = '$project_id'";
	$query_project = mysqli_query($conn,$sql_project);

	$user_id = $_SESSION['user_id'];
	$sql_manname = "SELECT first_name, last_name FROM fl_user WHERE user_id = '$user_id'";
	$query_manname = mysqli_query($conn,$sql_manname);

	$sql_task= "SELECT * FROM fl_task WHERE project_id = '$project_id'";
	$query_task = mysqli_query($conn,$sql_task);
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
						<h3><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']?></h3>
						<p>
							Manager
						</p>
					</div>
					<li class="nav-item">
						<a class="nav-link  active " href="profile.php"><i class="ni ni-single-02 text-yellow"></i> Profile</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link " href="dashboard.php"><i class="ni ni-tv-2 text-primary"></i> Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="projects.php"><i class="ni ni-planet text-blue"></i> Projects</a>
					</li>
				</ul>
				<!-- Divider -->
				<hr class="my-3">
				<ul class="navbar-nav mb-md-3">
					<li class="nav-item">
						<button type="submit" class="btn btn-icon btn-3 btn-danger" id="logout"><i class="ni ni-button-power"></i> Signout</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="main-content">
		<div class="header bg-gradient-primary pb-4 pt-3 pt-md-4">
		  <div class="container-fluid">
			<div class="header-body">
				<?php
					if (isset($_SESSION['message'])) {
						?>
						<div class="alert alert-<?php echo $_SESSION['mess_type']?>" id="message" role="alert">
							<strong><?php echo $_SESSION['mess_title']?>!</strong> <?php echo $_SESSION['message']?>
							<button style="align: right;" onclick="document.getElementById('message').style.display='none'" ><i class="ni ni-fat-remove text-blue"></i></button>
						</div>
						<?php
						unset($_SESSION['message']);
						unset($_SESSION['mess_type']);
						unset($_SESSION['mess_title']);
					}
				?>
				<div class="jumbotron text-center">
					<p class="display-3"><?php while($row_project = mysqli_fetch_assoc($query_project)) {

						echo $row_project['project_name'];
						while($row_manname= mysqli_fetch_assoc($query_manname)){
						?>
						<br>
						<h4 class="text-muted">
						<?php
							echo "Managed by ".$row_manname['first_name'].' '.$row_manname['last_name'];
					}
					?></h4></p>
					<hr class="my-4">
					<p class="display-4">
						<?php echo $row_project['project_desc'];

					}
					?>
					</p>
					<?php
						if(mysqli_num_rows($query_task) < 1)
						{

					?>
					<p>No Active tasks found, Create the first task</p>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modal-create-task">Create Task</button>
				</div>
			</div>
		  </div>
		</div>
		<?php
						}
						else
						{

		?>
		<div class="container">
			<div class="row m-5">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="add-row" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>No.</th>
												<th>Task Description</th>
												<th>Deadline</th>
												<th style="width: 10%">Assigned to</th>
												<th>Remove</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no = 1;
												while ($row_task = mysqli_fetch_assoc($query_task)) {
											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $row_task['task_description']?></td>
													<td><?= $row_task['deadline']?>
													</td>
													<td>
														<form class="form-button-action" action="delete_task.php" method="POST">
															<input type="hidden" name="employee_id" value="<?=$row_task['employee_id']?>">
															<input type="hidden" name="project_id" value="<?=$row_task['project_id']?>">
															<button type="submit" data-toggle="tooltip" name="remove" class="btn btn-link btn-danger" data-original-title="Remove Project">
																<i class="fa fa-times"></i>
															</button>
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
			<?php
		}
		include '../include/modal_task.php'; ?>
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
