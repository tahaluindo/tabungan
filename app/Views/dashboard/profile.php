<?php
echo $this->extend('layout/navbar');

echo $this->section('navbar');
?>

<main id="main" class="main">

	<div class="pagetitle">
		<h1>Profile</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>
				<li class="breadcrumb-item">Users</li>
				<li class="breadcrumb-item active">Profile</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section profile">
		<div class="row">
			<div class="col-xl-10">

				<div class="card">
					<div class="card-body pt-3">
						<!-- Bordered Tabs -->
						<ul class="nav nav-tabs nav-tabs-bordered">

							<li class="nav-item">
								<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
							</li>

						</ul>
						<div class="tab-content pt-2">

							<div class="tab-pane fade show active profile-overview" id="profile-overview">
								<h5 class="card-title">Profile Details</h5>

								<div class="row">
									<div class="col-lg-3 col-md-4 label ">Email</div>
									<div class="col-lg-9 col-md-8"><?= $user->email ?></div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Username</div>
									<div class="col-lg-9 col-md-8"><?= $user->username ?></div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Nama</div>
									<div class="col-lg-9 col-md-8"><?= $user->name ?></div>
								</div>
							</div>

							<div class="tab-pane fade profile-edit pt-3" id="profile-edit">

								<!-- Profile Edit Form -->
								<form action="<?= base_url('dashboard/updateUser') ?>" method="POST">
									<div class="row mb-3">
										<label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
										<div class="col-md-8 col-lg-9">
											<input name="email" type="text" class="form-control" id="email" value="<?= $user->email ?>">
										</div>
									</div>

									<div class="row mb-3">
										<label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
										<div class="col-md-8 col-lg-9">
											<input name="username" type="text" class="form-control" id="username" value="<?= $user->username ?>">
										</div>
									</div>

									<div class="row mb-3">
										<label for="name" class="col-md-4 col-lg-3 col-form-label">nama</label>
										<div class="col-md-8 col-lg-9">
											<input name="name" type="text" class="form-control" id="name" value="<?= $user->name ?>">
										</div>
									</div>

									<div class="text-center">
										<button type="submit" class="btn btn-primary">Save Changes</button>
									</div>
								</form><!-- End Profile Edit Form -->

							</div>
						</div><!-- End Bordered Tabs -->

					</div>
				</div>

			</div>
		</div>
	</section>

</main><!-- End #main -->


<?= $this->endSection() ?>