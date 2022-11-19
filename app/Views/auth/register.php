<?php
echo $this->extend('template');

echo $this->section('navbar');
?>

<main style="background-image: url('/assets/img/login-background.jpg') ; background-size: cover; background-repeat: no-repeat;">
	<div class=" container">
		<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-3">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
						<div class="d-flex justify-content-center py-4">
							<div class="logo grid text-center">
								<div class="g-col-6 mb-2">
									<img src="/assets/img/icon.png" alt="">
								</div>
								<div class="g-col-6">
									<span class="d-none d-lg-block">Save Money</span>
								</div>
							</div>
						</div><!-- End Logo -->

						<div class="card mb-3">

							<div class="card-body">

								<div class="pt-4 pb-2">
									<h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
									<p class="text-center small">Enter your personal details to create account</p>
								</div>
								<?= view('Myth\Auth\Views\_message_block') ?>
								<form action="<?= url_to('register') ?>" method="post" class="row g-3 needs-validation">
									<?= csrf_field() ?>
									<div class="col-12">
										<label for="yourName" class="form-label">Name</label>
										<input type="text" name="name" class="form-control <?php if (session('errors.name')) : ?>is-invalid<?php endif ?>" id="yourName" required value="<?= old('name') ?>">
										<div class="invalid-feedback">Please, enter your name!</div>
									</div>

									<div class="col-12">
										<label for="yourEmail" class="form-label"><?= lang('Auth.email') ?></label>
										<input type="email" name="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="yourEmail" value="<?= old('email') ?>" required>
										<div class="invalid-feedback">Please enter a valid Email adddress!</div>
									</div>

									<div class="col-12">
										<label for="yourUsername" class="form-label">Username</label>
										<div class="input-group has-validation">
											<input type="text" name="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="yourUsername" value="<?= old('username') ?>" required>
											<div class="invalid-feedback">Please choose a username.</div>
										</div>
									</div>

									<div class="col-12">
										<label for="yourPassword" class="form-label">Password</label>
										<input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="yourPassword" autocomplete="off" required>
										<div class="invalid-feedback">Please enter your password!</div>
									</div>
									<div class="form-group">
										<label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
										<input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off">
									</div>

									<div class="col-12">
										<button class="btn btn-primary w-100" type="submit">Create Account</button>
									</div>
									<div class="col-12 text-center">
										<p class="small mb-0">Already have an account? <a href="<?= base_url('auth/login') ?>">Log in</a></p>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

	</div>
</main><!-- End #main -->

<?= $this->endSection() ?>