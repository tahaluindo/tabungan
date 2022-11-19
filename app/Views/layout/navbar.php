<?php
echo $this->extend('template');

echo $this->section('navbar');
?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

	<div class="d-flex align-items-center justify-content-between">
		<a href="index.html" class="logo d-flex align-items-center">
			<img src="/assets/img/icon.png" alt="" />
			<span class="d-none d-lg-block">SaveMoney</span>
		</a>
		<i class="bi bi-list toggle-sidebar-btn"></i>
	</div>
	<!-- End Logo -->

</header>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
	<ul class="sidebar-nav" id="sidebar-nav">

		<?php
		if (in_groups('nasabah')) {
		?>
			<li class="nav-heading">Main</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('') ?>">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('dashboard/history') ?>">
                    <i class="bi bi-clock-history"></i>
                    <span>Transaksi</span>
                </a>
            </li>
        <?php
        }
        ?>

		<?php
		if (in_groups('admin')) {
		?>
			<li class="nav-heading">Admin</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('dashboard/users') ?>">
					<i class="bi bi-people-fill"></i>
					<span>Users</span>
				</a>
			</li>
		<?php
		}
		?>


		<li class="nav-heading">Account</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="<?= base_url('/dashboard/profile') ?>">
				<i class="bi bi-person-fill"></i>
				<span>Profile</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="<?= base_url('/logout') ?>">
				<i class="bi bi-box-arrow-right"></i>
				<span>Logout</span>
			</a>
		</li>
	</ul>

</aside>
<!-- End Sidebar-->

<?= $this->renderSection('content') ?>


<footer id="footer" class="footer bg-white position-fixed bottom-0 start-0 end-0">
    <div class="copyright">
        &copy; Copyright <strong><span>SaveMoney</span></strong>. All Rights Reserved
    </div>
</footer>
<!-- End Footer -->

<?= $this->endSection() ?>