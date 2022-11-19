<?php
echo $this->extend('layout/navbar');

echo $this->section('content');
?>

<main id="main" class="main">
	<div class="pagetitle">
		<h1><?= $title ?></h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Home</li>
				<li class="breadcrumb-item active">Dashboard</li>
			</ol>
		</nav>
	</div>
	<!-- End Page Title -->

	<section class="section dashboard">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-sm-4">
						<div class="card info-card revenue-card">
							<div class="card-body">
								<h5 class="card-title">
									Pemasukan
								</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-arrow-up-right"></i>
									</div>
									<div class="ps-3">
										<h6>Rp<?= number_format($pemasukan->pemasukan) ?></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<!-- Sales Card -->
						<div class="card info-card sales-card">
							<div class="card-body">
								<h5 class="card-title">Saldo</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-wallet2"></i>
									</div>
									<div class="ps-3">
										<h6>Rp<?= number_format($balance->balance) ?></h6>
									</div>
								</div>
							</div>
						</div>
						<!-- End Sales Card -->
					</div>
					<div class="col-sm-4">
						<div class="card info-card outcome-card">
							<div class="card-body">
								<h5 class="card-title">
									Pengeluaran
								</h5>

								<div class="d-flex align-items-center">
									<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
										<i class="bi bi-arrow-down-right"></i>
									</div>
									<div class="ps-3">
										<h6>Rp<?= ($pengeluaran->pengeluaran == null ? '0' : number_format($pengeluaran->pengeluaran)) ?></h6>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body pt-3">
							<!-- Bordered Tabs -->
							<ul class="nav nav-tabs nav-tabs-bordered d-flex justify-content-evenly">

								<li class="nav-item">
									<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#dashboard-semua">Semua Transaksi</button>
								</li>

								<li class="nav-item">
									<button class="nav-link" data-bs-toggle="tab" data-bs-target="#dashboard-masuk">Pemasukan</button>
								</li>

								<li class="nav-item">
									<button class="nav-link" data-bs-toggle="tab" data-bs-target="#dashboard-keluar">Pengeluaran</button>
								</li>

							</ul>
							<div class="tab-content pt-2">

								<div class="tab-pane fade show active dashboard-semua" id="dashboard-semua">
									<table class="table table-hover">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">ID Transaksi</th>
												<th scope="col">Jumlah</th>
												<th scope="col">Jenis Transaksi</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($transactionAll as $t) {
											?>
												<tr>
													<th scope="row"><?= $i++ ?></th>
													<td><?= $t->id_history ?></td>
													<td><?= $t->amount ?></td>
													<td class="text-<?= ($t->jenis_transaksi == 1 ? 'success">Pemasukan' : 'danger">Pengeluaran') ?></td>
                                  					<td><?= $t->tanggal ?></td>
                                    				<td class=" text-<?= ($t->status == 1 ? 'warning">Pending' : ($t->status == 2 ? 'success">Sukses' : 'danger">Gagal')) ?></td>

												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>


								<div class="tab-pane fade show dashboard-masuk" id="dashboard-masuk">
									<table class="table table-hover">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">ID Transaksi</th>
												<th scope="col">Jumlah</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($transactionMasuk as $t) {
											?>
												<tr>
													<th scope="row"><?= $i++ ?></th>
													<td><?= $t->id_history ?></td>
													<td><?= $t->amount ?></td>

													<td><?= $t->tanggal ?></td>
													<td class=" text-<?= ($t->status == 1 ? 'warning">Pending' : ($t->status == 2 ? 'success">Sukses' : 'danger">Gagal')) ?></td>

												</tr>
											<?php
											}
											?>
										</tbody>
									</table>
								</div>

								<div class=" tab-pane fade show dashboard-keluar" id="dashboard-keluar">
														<table class="table table-hover">
															<thead>
																<tr>
																	<th scope="col">#</th>
																	<th scope="col">ID Transaksi</th>
																	<th scope="col">Jumlah</th>
																	<th scope="col">Tanggal</th>
																	<th scope="col">Status</th>
																</tr>
															</thead>
															<tbody>
																<?php
																$i = 1;
																foreach ($transactionKeluar as $t) {
																?>
																	<tr>
																		<th scope="row"><?= $i++ ?></th>
																		<td><?= $t->id_history ?></td>
																		<td><?= $t->amount ?></td>

																		<td><?= $t->tanggal ?></td>
																		<td class=" text-<?= ($t->status == 1 ? 'warning">Pending' : ($t->status == 2 ? 'success">Sukses' : 'danger">Gagal')) ?></td>

												</tr>
											<?php
																}
											?>
										</tbody>
									</table>
								</div>

							</div><!-- End Bordered Tabs -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<!-- End #main -->

<?= $this->endSection() ?>