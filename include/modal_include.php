<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
					<div class="card-header bg-white pb-2">
						<div class="text text-center my-3">Sign in with your email address.</div>
					</div>
					<div class="card-body px-lg-5 py-lg-3">
						<form role="form" method="post" action="login-system/login_script.php">
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-email-83"></i></span>
									</div>
									<input class="form-control" placeholder="Email" id="email" name="email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
									</div>
									<input class="form-control" placeholder="Password" id="password" name="password" type="password">
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary my-4">Sign in</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="modal-signup" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
					<div class="card-header bg-white pb-2">
						<div class="text text-center my-3">Sign up</div>
					</div>
					<div class="card-body px-lg-5 py-lg-3">
						<form role="form" method="post" action="login-system/signup_script.php">
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-single-02"></i></span>
									</div>
									<input class="form-control" placeholder="First Name" id="fname" name="fname" type="text">
									<input class="form-control" placeholder="Last Name" id="lname" name="lname" type="text">
								</div>
							</div>
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-email-83"></i></span>
									</div>
									<input class="form-control" placeholder="Email" name="email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
									</div>
									<input class="form-control" placeholder="Password" name="password" type="password">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
									</div>
									<input class="form-control" placeholder="Re-enter password" name="re-password" id="passcheck" type="password">
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary my-4">Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
