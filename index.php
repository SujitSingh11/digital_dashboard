<?php
	include 'assets/db/connect_db.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Digital Dashboard</title>
		<!--CSS Include-->
		<?php
			include 'include/css_include.php';
		?>
		<style media="screen">
			body {
				background-image: url("assets/img/.jpg");
				height: 100;
				background-position: center;
				background-repeat: no-repeat;
			  }
			.content{

			}
		</style>
	</head>
	<body>
		<!--Navbar-->
		<nav class="navbar py-1 navbar-horizontal navbar-expand-lg navbar-dark bg-default">
			<div class="container">
				<a class="navbar-brand" href="#">FLOW</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-default">
					<div class="navbar-collapse-header">
						<div class="row">
							<div class="col-6 collapse-brand">
								<a href="index.html">
									<img src="assets/img/brand/blue.png">
								</a>
							</div>
							<div class="col-6 collapse-close">
								<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
									<span></span>
									<span></span>
								</button>
							</div>
						</div>
					</div>
					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item">
							<button class="btn btn-default nav-link" data-toggle="modal" data-target="#modal-signup">
								Sign-Up
							</button>
						</li>
						<li class="nav-item">
							<button class="btn btn-default nav-link" data-toggle="modal" data-target="#modal-login">
								Login
							</button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!--Main-->
		<div class="container">
			<div class="content">
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
			</div>
		</div>
		<!--Footer-->
		<?php
			include 'include/modal_include.php';
		?>

		<!--JS Include-->
		<?php
			include 'include/js_include.php';
		?>
	</body>
</html>
