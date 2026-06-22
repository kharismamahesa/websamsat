<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard UPT Pengelolaan Pendapatan Perawang - Samsat Perawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/perawang/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm main-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#beranda">
                <div class="logo-placeholder me-2 d-flex align-items-center justify-content-center">
                    <i class="bi bi-shield-shaded text-primary fs-3"></i>
                </div>
                <div>
                    <span class="fw-bold d-block text-dark header-title">SAMSAT PERAWANG</span>
                    <small class="text-muted sub-header-title">UPT Pengelolaan Pendapatan Perawang</small>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 alignment-menu">
                    <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang-kami">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#persyaratan">Informasi Pajak</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <div class="d-flex ms-lg-3 gap-2 action-buttons">
                    <a href="https://instagram.com" target="_blank" class="btn btn-outline-danger btn-icon" title="Instagram Samsat Perawang">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#persyaratan" class="btn btn-primary btn-cek-pajak">
                        <i class="bi bi-search me-1"></i> Cek Pajak
                    </a>
                </div>
            </div>
        </div>
    </nav>