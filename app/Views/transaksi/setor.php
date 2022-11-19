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
                <li class="breadcrumb-item">History</li>
                <li class="breadcrumb-item active">Setor</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-12">
                <!-- Buat Konten Disini -->
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Form Setor Tunai
                        </h4>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->

<?= $this->endSection() ?>