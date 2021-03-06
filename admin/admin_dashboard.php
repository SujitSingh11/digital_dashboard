<?php
    include '../assets/db/connect_db.php';
    session_start();
    if ($_SESSION['logged_in'] == false AND $_SESSION['user_type']==0) {
		$_SESSION['mess_type'] = 'warning';
		$_SESSION['mess_title'] = 'Warning';
        $_SESSION['message'] = "You are not Signed In.! <br> Please Sign in.";
        die(header('Location: ../index.php'));
    }
    $sql_manager = "SELECT fl_user.user_id AS user_id, fl_manager.manager_id AS m_id, fl_user.first_name AS first_name, fl_user.last_name AS last_name,
    fl_user.email AS email, fl_user.active AS active
            FROM fl_user
            INNER JOIN fl_manager ON fl_manager.user_id = fl_user.user_id";
    $query_manager = mysqli_query($conn,$sql_manager);

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
						<h3><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'] ?></h3>
						<p>
							Admin
						</p>
					</div>
					<li class="nav-item">
						<a class="nav-link  " href="admin_profile.php"><i class="ni ni-single-02 text-yellow"></i> Profile</a>
					</li>
					<li class="nav-item ">
						<a class=" nav-link active " href="admin_dashboard.php"><i class="ni ni-tv-2 text-primary"></i> Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="admin_project.php"><i class="ni ni-planet text-blue"></i> Projects</a>
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
		<!-- Admin -->

      	<div class="container-fluid my-5 ">
			<div class="col">
				<h1>Dashboard</h1>
				<hr>
			</div>
			<div class="col text-center">
				<p class="display-4 m-3">Welcome, <?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'].'.'; ?></p>
			</div>
                <?php
					if (isset($_SESSION['message'])) {
						?>
						<div class="alert alert-<?php echo $_SESSION['mess_type']?>" role="alert">
							<strong><?php echo $_SESSION['mess_title']?>!</strong> <?php echo $_SESSION['message']?>
						</div>
						<?php
						unset($_SESSION['message']);
						unset($_SESSION['mess_type']);
						unset($_SESSION['mess_title']);
					}
				?>
            <div class="container">
                <div class="row m-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-dark-gradient">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title" style="color:#fff;">Managers</h4>
                                    <button class="btn btn-dark btn-round ml-auto" data-toggle="modal" data-target="#modal-add-manager">
                                        <i class="fa fa-plus"></i>
                                        Add Managers
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Approved</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                while ($row_manager = mysqli_fetch_assoc($query_manager)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $row_manager['first_name'].' '.$row_manager['last_name']?></td>
                                                    <td><?= $row_manager['email']?></td>
                                                    <td><?php
                                                        if ($row_manager['active'] == 1) {
                                                            echo "Approved";
                                                        }else {
                                                            echo "Not Approved";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <form class="form-button-action" action="edit_manager.php" method="POST">
                                                            <input type="hidden" name="user_id" value="<?=$row_manager['user_id']?>">
                                                            <input type="hidden" name="m_id" value="<?=$row_manager['m_id']?>">
                                                            <?php
                                                            if ($row_manager['active'] == 0) {
                                                            ?>
                                                            <button type="submit" data-toggle="tooltip" name="approve" class="btn btn-link btn-primary" data-original-title="Approve">
                                                                <i class="fa fa-check-circle"></i>
                                                            </button>
                                                            <?php
                                                            }else { ?>
                                                                <button type="submit" data-toggle="tooltip" name="deactivate" class="btn btn-link btn-warning" data-original-title="Deactivate">
                                                                    <i class="fa fa-times-circle"></i>
                                                                </button> <?php
                                                            }
                                                            ?>
                                                            <button type="submit" data-toggle="tooltip" name="remove" class="btn btn-link btn-danger" data-original-title="Remove Employee">
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
            </div>
	    </div>
		<div class="container">
			<?php include '../include/model_add_manager.php'; ?>
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
