<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main id="main" class="main">
	<div class="pagetitle">
		<h1><?= $title ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">User</li>
				<li class="breadcrumb-item active">Create</li>
			</ol>
		</nav>
	</div>
	<!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">
			<div class="card p-3">
				<form action="<?= base_url('dashboard/add_user') ?>" method="POST">
					<div class="p-4 row">
						<div class="col-6">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" class="form-control" id="nama">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" id="email">
							</div>
							<div class="form-group">
								<label for="balance">Balance</label>
								<input type="text" name="balance" class="form-control" id="balance">
							</div>
							<button type="submit" class="btn btn-primary mt-3">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</main>
<!-- End #main -->

<?= $this->endSection() ?>