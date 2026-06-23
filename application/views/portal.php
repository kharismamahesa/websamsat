<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Layanan SAMSAT - BAPENDA Provinsi Riau</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #1e3a8a;
            --primary-gradient: linear-gradient(135deg, #1e3a8a, #0f172a);
            --success-color: #34ad54;
            --success-gradient: linear-gradient(135deg, #34ad54, #1b562a);
            --bg-slate: #f8fafc;
            --text-dark: #0f172a;
            --text-gray: #64748b;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-slate);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            /* Menggunakan margin-top otomatis pada footer lebih aman dibanding space-between */
            justify-content: flex-start; 
            position: relative;
            overflow-x: hidden;
            /* Memastikan background warna membungkus seluruh tinggi dokumen */
            background-attachment: fixed; 
        }

        /* Abstract Background Elements */
        body::before {
            content: '';
            position: fixed; /* Diubah dari absolute menjadi fixed agar posisi lingkaran mengunci layar saat di-scroll */
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(30, 58, 138, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
            top: -200px;
            right: -200px;
            z-index: -1;
        }

        body::after {
            content: '';
            position: fixed; /* Diubah dari absolute menjadi fixed agar posisi lingkaran mengunci layar saat di-scroll */
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(52, 173, 84, 0.06) 0%, rgba(255, 255, 255, 0) 70%);
            bottom: -150px;
            left: -150px;
            z-index: -1;
        }        

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .hero-title {
            font-weight: 800;
            letter-spacing: -0.03em;
            color: var(--text-dark);
            line-height: 1.2;
        }

        .hero-title span {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Portal Cards */
        .portal-card {
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 35px 25px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            height: 100%;
            box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.04), 0 2px 8px -1px rgba(15, 23, 42, 0.02);
        }

        .portal-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary-gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .portal-card.card-success::before {
            background: var(--success-gradient);
        }

        .portal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(15, 23, 42, 0.1), 0 10px 10px -5px rgba(15, 23, 42, 0.04);
            border-color: rgba(226, 232, 240, 0.2);
        }

        .portal-card:hover::before {
            opacity: 1;
        }

        .icon-box {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            background: rgba(30, 58, 138, 0.06);
            color: var(--primary);
            transition: all 0.3s ease;
        }

        .card-success .icon-box {
            background: rgba(52, 173, 84, 0.08);
            color: var(--success-color);
        }

        .portal-card:hover .icon-box {
            transform: scale(1.1) rotate(3deg);
            color: #fff;
        }

        .portal-card:hover.card-primary .icon-box {
            background: var(--primary-gradient);
        }

        .portal-card:hover.card-success .icon-box {
            background: var(--success-gradient);
        }

        .portal-card h4 {
            font-weight: 800;
            font-size: 1.35rem;
            margin-bottom: 12px;
            color: var(--text-dark);
            letter-spacing: -0.02em;
        }

        .portal-card p {
            color: var(--text-gray);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .btn-visit {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 700;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .card-primary .btn-visit {
            background-color: var(--primary);
            color: #fff;
            border: none;
        }

        .card-success .btn-visit {
            background-color: var(--success-color);
            color: #fff;
            border: none;
        }

        .portal-card:hover .btn-visit {
            padding-right: 25px;
        }

        .btn-visit i {
            transition: transform 0.3s ease;
        }

        .portal-card:hover .btn-visit i {
            transform: translateX(4px);
        }

        /* Tambahan optimasi untuk memastikan footer tetap berada di paling bawah tanpa merusak layout */
        footer {
            margin-top: auto; 
            background-color: #0f172a;
            color: #94a3b8;
            border-top: 1px solid #1e293b;
            padding: 20px 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Header / Navbar -->
    <header class="py-4 bg-white border-bottom border-light">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="<?= base_url('halaman') ?>" class="navbar-brand">
                <img src="<?= base_url('assets/img/logobapenda.png') ?>" alt="Bapenda Riau" style="height: 60px;">
            </a>
            <div class="d-flex align-items-center gap-2">
                <img src="<?= base_url('assets/img/riau.png') ?>" alt="Provinsi Riau" style="height: 45px;">
            </div>
        </div>
    </header>

    <!-- Main Content Portal -->
    <main class="container my-5 py-4">
        <div class="text-center max-w-xl mx-auto mb-5">
            <h1 class="hero-title mb-3">Portal Layanan <span>SAMSAT</span></h1>
            <p class="text-muted fs-5">Pilih wilayah kantor UPT Pengelolaan Pendapatan untuk mengakses informasi, pelayanan PKB, berita, dan survei kepuasan pelanggan secara cepat dan mudah.</p>
            <div class="mx-auto bg-primary rounded" style="width: 60px; height: 4px; margin-top: 15px;"></div>
        </div>

        <div class="row g-4 justify-content-center">
            
            <!-- Samsat Pekanbaru Kota -->
            <div class="col-sm-6 col-lg-3">
                <div class="portal-card card-success d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-box">
                            <i class="bi bi-building-fill fs-3"></i>
                        </div>
                        <h4>Pekanbaru Kota</h4>
                        <p>UPT Pengelolaan Pendapatan Pekanbaru Kota. Pusat layanan pembayaran pajak tahunan dan 5 tahunan di ibu kota Provinsi Riau.</p>
                    </div>
                    <a href="<?= base_url('pekanbarukota') ?>" class="btn btn-visit align-self-start">
                        Kunjungi Website <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Samsat Simpang Tiga -->
            <div class="col-sm-6 col-lg-3">
                <div class="portal-card card-success d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-box">
                            <i class="bi bi-building fs-3"></i>
                        </div>
                        <h4>Simpang Tiga</h4>
                        <p>UPT Pengelolaan Pendapatan Simpang Tiga. Pelayanan prima dan cepat berlokasi di daerah strategis Simpang Tiga, Pekanbaru.</p>
                    </div>
                    <a href="<?= base_url('simpangtiga') ?>" class="btn btn-visit align-self-start">
                        Kunjungi Website <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Samsat Perawang -->
            <div class="col-sm-6 col-lg-3">
                <div class="portal-card card-success d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-box">
                            <i class="bi bi-building fs-3"></i>
                        </div>
                        <h4>Perawang</h4>
                        <p>UPT Pengelolaan Pendapatan Perawang. Menyediakan kemudahan akses layanan terintegrasi bagi masyarakat di daerah Kabupaten Siak.</p>
                    </div>
                    <a href="<?= base_url('perawang') ?>" class="btn btn-visit align-self-start">
                        Kunjungi Website <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Samsat Dumai -->
            <div class="col-sm-6 col-lg-3">
                <div class="portal-card card-success d-flex flex-column justify-content-between">
                    <div>
                        <div class="icon-box">
                            <i class="bi bi-building fs-3"></i>
                        </div>
                        <h4>Dumai</h4>
                        <p>UPT Pengelolaan Pendapatan Dumai. Fasilitas pelayanan samsat komprehensif bagi wajib pajak di kota pelabuhan Dumai.</p>
                    </div>
                    <a href="<?= base_url('dumai') ?>" class="btn btn-visit align-self-start">
                        Kunjungi Website <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; 2026 Badan Pendapatan Daerah (BAPENDA) Provinsi Riau. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
