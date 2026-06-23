<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Samsat Perawang - UPT Pengelolaan Pendapatan Perawang' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/dist/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/perawang/style.css?v=' . time()) ?>">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top dynamic-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url('perawang') ?>#beranda">
                <div class="me-2 d-flex align-items-center justify-content-center fw-bold text-primary">
                    <img src="<?= base_url('assets/img/riau.png') ?>" width="30" alt="Samsat Perawang">
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <span class="fw-bold tracking-tight fs-6 lh-1 text-white">SAMSAT PERAWANG</span>
                    <span class="text-white-50 civ-subtitle">UPT PP Perawang</span>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                    <li class="nav-item"><a class="nav-link active" href="<?= base_url('perawang') ?>#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('perawang') ?>#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('perawang') ?>#persyaratan">Persyaratan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('perawang') ?>#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('perawang') ?>#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('perawang/visimisi') ?>">Visi & Misi</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('perawang') ?>#kontak">Kontak</a></li>
                </ul>
                <div class="d-flex gap-2 btn-nav-group">
                    <a href="<?= base_url('perawang') ?>#kontak" class="btn btn-warning btn-sm rounded-pill px-3 fw-semibold text-dark shadow-sm">
                        <i class="bi bi-telephone me-1"></i> Kontak
                    </a>
                </div>
            </div>
        </div>
    </nav>