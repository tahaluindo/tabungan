<?php
echo $this->extend('layout/navbar');
echo $this->section('content');
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card p-3">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end p-3">
                    <a href="<?= base_url('dashboard/create') ?>" class="btn btn-primary btn-sm">Add New User</a>
                </div>
                <?php
                if (session()->getFlashdata('pesan')) {
                ?>
                    <div class="row mx-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashData('pesan') ?>
                            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php
                    session()->remove('pesan');
                }
                ?>
                <table class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Action</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td>
                                    <a href="<?= base_url('dashboard/edit/' . $user->slug) ?>" class="btn btn-primary btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?= base_url('dashboard/delete/' . $user->slug) ?>" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    </th>
                                <td><?= $user->name ?></td>
                                <td>Rp <?= number_format($user->balance, 2, ',', '.') ?></td>
                                <!-- TODO: Masukkan data user ke sini -->
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?= $this->endSection() ?>