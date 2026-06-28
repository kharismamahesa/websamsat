<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?></title>
    <meta name="description" content="Portal Pelayanan Bapenda Riau">
    <link href="<?= base_url('assets/bapenda_fav.ico') ?>" rel="icon">
    
    <!-- Modern Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-green: #10b981;
            --primary-yellow: #f59e0b;
            --primary-red: #ef4444;
            --bg-light: #f8fafc;
            --text-dark: #1e293b;
            --text-light: #64748b;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }

        /* Navbar Styling */
        .custom-navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(16, 185, 129, 0.05);
            padding: 15px 0;
            transition: all 0.3s ease;
            border-bottom: 2px solid var(--primary-green);
        }
        .navbar-brand img {
            max-height: 50px;
        }
        .nav-link {
            color: var(--text-dark);
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
            position: relative;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary-green);
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background: var(--primary-green);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }

        /* Buttons */
        .btn-gradient {
            background: linear-gradient(135deg, #059669, var(--primary-green));
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, var(--primary-green), #34d399);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
            transform: translateY(-2px);
            color: white;
        }

        /* Hero Section */
        .hero-section {
            padding: 160px 0 100px;
            background: radial-gradient(circle at top right, rgba(16, 185, 129, 0.15), transparent 50%),
                        radial-gradient(circle at bottom left, rgba(16, 185, 129, 0.05), transparent 50%), #f0fdf4;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #064e3b;
        }
        .text-gradient {
            color: var(--primary-green);
        }

        /* Service Cards */
        .service-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            height: 100%;
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.05);
            border: 1px solid rgba(16, 185, 129, 0.1);
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05), rgba(255,255,255,0));
            z-index: -1;
            transition: all 0.4s ease;
            opacity: 0;
        }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(16, 185, 129, 0.15);
            border-color: rgba(16, 185, 129, 0.3);
        }
        .service-card:hover::before {
            opacity: 1;
        }
        
        .card-green { border-bottom: 4px solid var(--primary-green); }
        .card-yellow { border-bottom: 4px solid var(--primary-yellow); }
        .card-red { border-bottom: 4px solid var(--primary-red); }

        .icon-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }
        .card-green .icon-wrapper { background: rgba(16, 185, 129, 0.1); color: var(--primary-green); }
        .card-yellow .icon-wrapper { background: rgba(245, 158, 11, 0.1); color: var(--primary-yellow); }
        .card-red .icon-wrapper { background: rgba(239, 68, 68, 0.1); color: var(--primary-red); }

        .service-card:hover .icon-wrapper {
            transform: scale(1.1) rotate(5deg);
        }
        .card-green:hover .icon-wrapper { background: var(--primary-green); color: white; }
        .card-yellow:hover .icon-wrapper { background: var(--primary-yellow); color: white; }
        .card-red:hover .icon-wrapper { background: var(--primary-red); color: white; }

        .service-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #064e3b;
        }
        .service-card .read-more {
            display: inline-flex;
            align-items: center;
            font-weight: 600;
            text-decoration: none;
            margin-top: 15px;
            transition: all 0.3s ease;
        }
        .card-green .read-more { color: var(--primary-green); }
        .card-yellow .read-more { color: var(--primary-yellow); }
        .card-red .read-more { color: var(--primary-red); }

        .service-card .read-more i {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }
        .service-card:hover .read-more i {
            transform: translateX(5px);
        }

        /* Footer */
        .footer-custom {
            background: #f0fdf4;
            padding: 30px 0;
            border-top: 2px solid var(--primary-green);
            margin-top: 80px;
        }

        /* Custom Dropdown Styling */
        .dropdown-toggle::after {
            display: none !important; /* Hilangkan arrow bawaan bootstrap */
        }
        .custom-dropdown-icon {
            font-size: 0.75rem;
            margin-left: 4px;
            transition: transform 0.3s ease;
            vertical-align: middle;
        }
        @media (min-width: 992px) {
            .nav-item.dropdown:hover .custom-dropdown-icon {
                transform: rotate(180deg);
            }
            .nav-item.dropdown:hover .dropdown-menu {
                display: block;
                animation: fadeUp 0.3s ease forwards;
            }
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .dropdown-item {
            font-weight: 500;
            color: var(--text-dark);
            transition: all 0.3s ease;
        }
        .dropdown-item:hover {
            color: var(--primary-green);
            background-color: rgba(16, 185, 129, 0.08);
            transform: translateX(5px);
        }
        .dropdown-item:hover {
            color: var(--primary-green);
            background-color: rgba(16, 185, 129, 0.08);
            transform: translateX(5px);
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('pelayanan') ?>">
                <img src="<?= base_url('assets/logo_bapenda_v2.png') ?>" alt="Logo Bapenda Riau">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Survei <i class="bi bi-chevron-down custom-dropdown-icon"></i>
                        </a>
                        <ul class="dropdown-menu border-0 shadow" style="border-radius: 12px; padding: 10px; margin-top: 5px;">
                            <li><a class="dropdown-item rounded py-2 mb-1" href="<?= base_url('pelayanan/survei') ?>">Survei Kepuasan</a></li>
                            <li><a class="dropdown-item rounded py-2" href="<?= base_url('pelayanan/nilaiindeks') ?>">Nilai Indeks</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pelayanan/pengaduan') ?>">Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pelayanan/wbs') ?>">WBS</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <a class="btn btn-gradient" href="https://api.whatsapp.com/send/?phone=6289509064349&text=Hai&type=phone_number&app_absent=0" target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>Hubungi Kami
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
