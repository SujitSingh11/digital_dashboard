
<div class="modal fade" id="modal-create-project" tabindex="-1" role="dialog" aria-labelledby="modal-create-project" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
					<div class="card-header bg-white pb-2">
						<div class="text text-center my-3">Create a new project</div>
					</div>
					<div class="card-body px-lg-5 py-lg-3">
						<form role="form" method="post" action="create_project.php">
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-books"></i></span>
									</div>
									<input class="form-control" placeholder="Project Name" id="project_name" name="project_name" type="text">
								</div>
							</div>
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
									</div>
									<textarea class="form-control" rows=5 placeholder="Project Description" name="project_description"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-watch-time"></i></span>
									</div>
									<input class="form-control" placeholder="Select Deadline" name="deadline" id="deadline" type="date">
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary my-4">Create Project</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-edit_project" tabindex="-1" role="dialog" aria-labelledby="modal-edit_project" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
					<div class="card-header bg-white pb-2">
						<div class="text text-center my-3">Edit a project</div>
					</div>
					<div class="card-body px-lg-5 py-lg-3">
						<form role="form" method="post" action="manager/edit_project.php">
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-books"></i></span>
									</div>
									<input class="form-control" placeholder="Project Name" id="project_name" name="project_name" type="text" value="<?php $_SESSION['project_name'] ?>">
								</div>
							</div>
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-bullet-list-67"></i></span>
									</div>
									<textarea class="form-control" placeholder="project_description" name="project_description" value="<?php $_SESSION['project_description'] ?>"> </textarea>>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-watch-time"></i></span>
									</div>
									<input class="form-control" placeholder="Select Deadline" name="deadline" id="deadline" type="date" value="<?php $_SESSION['deadline'] ?>">
								</div>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary my-4">Save Project</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-delete_project" tabindex="-1" role="dialog" aria-labelledby="modal-delete_project" aria-hidden="true">
	<div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body p-0">
				<div class="card bg-secondary shadow border-0">
					<div class="card-header bg-white pb-2">
						<div class="text text-center my-3">Deleting a project</div>
					</div>
					<div class="card-body px-lg-5 py-lg-3">
						<form role="form" method="post" action="manager/delete_project.php">
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<label>Are you sure?</label>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group input-group-alternative">
									<input class="form-control" id="project_id" name="project_id" type="hidden" value="<?php $_SESSION['project_id'] ?>">
								</div>
							</div>
							<div class="text-center">
								<input type="submit" class="btn btn-primary my-4" name="del_proj" id="del_proj">Yes</button>
								<button type="dismiss" class="btn btn-primary my-4">No</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
