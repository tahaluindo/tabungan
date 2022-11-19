<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title><?= $title ?></title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="/assets/img/icon.png" rel="icon" />
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet" />
</head>

<body>

    <body class="text-dark ff-gantari">
        <div class="container">
            <div class="row g-4">
                <div class="col">
                    <div class="rounded h-100">
                        <header>
                            <div class="d-flex align-items-end flex-column">
                                <div class="">
                                    <button class="btn btn-dark my-3" id="printButton" onClick="window.print();">
                                        <i class="bi bi-printer"></i>
                                        <span>
                                            Cetak
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="logo grid text-center">
                                    <div class="g-col-4 mb-2">
                                        <img src="/assets/img/icon.png" alt="">
                                    </div>
                                    <div class="g-col-4">
                                        <span class="d-none d-lg-block">Save Money</span>
                                    </div>
                                </div>
                            </div><!-- End Logo -->
                            <div class="d-flex justify-content-center py-2">
                                <div class="text-center">
                                    <h4><b>LAPORAN KEUANGAN</b></h4>
                                </div>
                            </div>
                            <hr>
                        </header>
                        <div style="background-color: #aeaeae;" class="card rounded shadow p-3 text-white">
                            <div class="row">
                                <div class="col-12">
                                    <h4><b>Data Nasabah</b></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row my-1">
                                        <div class="col-3">Nama</div>
                                        <div class="col-9">: <b><?= user()->name ?></b></div>
                                    </div>
                                    <div class="row my-1">
                                        <div class="col-3">Email</div>
                                        <div class="col-9">: <b><?= user()->email ?></b></div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row my-1">
                                        <div class="col-3">Saldo</div>
                                        <div class="col-9">: <b>Rp<?= number_format($balance->balance) ?></b></div>
                                    </div>
                                    <div class="row my-1">
                                        <div class="col-3">Tanggal</div>
                                        <div class="col-9">: <b><?= $tanggal ?></b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="mt-5 text-uppercase"><b>Tabel Anggota</b></h6>
                        <table class="table table-borderless border-dark table-responsive text-dark ff-gantari align-middle">
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
        </div>

        <footer class="container">
            <div class="rounded-top">
                <div class="row">
                    <div class="col-12 text-center">
                        &copy; 2022 <a href="#">SaveMoney</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </footer>
    </body>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
</body>

</html>