<div class="modal fade" id="modal-add-manager" tabindex="-1" role="dialog" aria-labelledby="modal-add-manager" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
					<div class="card-header bg-white pb-2">
						<div class="text text-center my-3">Change Password</div>
					</div>
					<div class="card-body px-lg-5 py-lg-3">
						<form role="form" method="post" action="../admin/add_manager.php">
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
									</div>
									<input class="form-control" placeholder="Old Password" name="old-pass" type="password">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
									</div>
									<input class="form-control" placeholder="New Password" name="new-password" type="password">
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
								<button type="submit" class="btn btn-primary my-4">Add</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
