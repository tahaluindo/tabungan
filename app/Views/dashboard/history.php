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
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <?php
    if (session('success')) {
    ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php
    } else if (session('error')) {
    ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php
    }
    ?>

    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">Saldo</h5>
                    <h2><strong>Rp<?= number_format($saldo->balance) ?></strong></h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-success my-3 w-100" data-bs-toggle="modal" data-bs-target="#setorModal">
                                <i class="bi bi-file-arrow-up"></i>
                                <span>Setor</span>
                            </button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-danger my-3 w-100" data-bs-toggle="modal" data-bs-target="#tarikModal">
                                <i class="bi bi-file-arrow-down"></i>
                                <span>Tarik</span>
                            </button>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <a href="<?= base_url('transactions/laporan') ?>" class="btn btn-secondary my-3 w-25">
                                <i class="bi bi-clipboard2-data"></i>
                                <span>Laporan</span>
                            </a>
                        </div>
                    </div>
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
                            foreach ($transaction as $t) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $t->id_history ?></td>
                                    <td>Rp<?= number_format($t->amount) ?></td>
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
            </div>
        </div>
    </section>
</main>
<!-- End #main -->


<div class=" modal fade" id="setorModal" tabindex="-1" aria-labelledby="setorModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Setor Tunai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('transactions/setor') ?>" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="nominal" class="col-sm-2 col-form-label">Nominal</label>
                        <div class="col-sm-10 input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="nominal" class="form-control" id="nominal">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Setor</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class=" modal fade" id="tarikModal" tabindex="-1" aria-labelledby="setorModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tarik Tunai</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('transactions/tarik') ?>" method="post">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="nominal" class="col-sm-2 col-form-label">Nominal</label>
                        <div class="col-sm-10 input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="nominal" class="form-control" id="nominal">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" onclick="return confirm('Yakin ingin menarik saldo?')">Tarik</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>