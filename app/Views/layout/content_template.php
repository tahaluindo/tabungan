<?php
echo $this->extend('layout/navbar');
echo $this->section('content');
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Buat Konten Disini -->
        </div>
    </section>
</main>
<!-- End #main -->

<?= $this->endSection() ?>