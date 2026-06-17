<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul ?> - Web Admin Samsat</title>

    <link href="<?= base_url('assets/sbadmin2/vendor/') ?>fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/sbadmin2/css/') ?>sb-admin-2.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/sbadmin2/vendor/datatables/') ?>dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css' rel='stylesheet' type='text/css'>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('samsat') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-hdd"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN WEB SAMSAT</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('samsat') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Samsat
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuberita" aria-expanded="true" aria-controls="menuberita">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Berita</span>
                </a>
                <div id="menuberita" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('samsat/tambahberita') ?>">Tambah Berita</a>
                        <a class="collapse-item" href="<?= base_url('samsat/listberita') ?>">List Berita</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('samsat/realtime') ?>">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Realtime</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('samsat/unitkerja') ?>">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Data Unit Kerja</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('samsat/galeri') ?>">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Galeri</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menukontenvideo" aria-expanded="true" aria-controls="menuberita">
                    <i class="fas fa-fw fa-video"></i>
                    <span>Konten Video</span>
                </a>
                <div id="menukontenvideo" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('samsat/tambahvideo') ?>">Tambah Video</a>
                        <a class="collapse-item" href="<?= base_url('samsat/listvideo') ?>">List Video</a>
                    </div>
                </div>
            </li>


            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars text-success"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata['websamsat_nama'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/sbadmin2/img/') ?>undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>