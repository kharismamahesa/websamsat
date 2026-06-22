<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samsat Perawang - UPT Pengelolaan Pendapatan Perawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/dist/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/perawang/style.css') ?>">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top dynamic-navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#beranda">
                <div class="logo-placeholder me-2 d-flex align-items-center justify-content-center fw-bold text-primary">
                    <i class="bi bi-shield-shaded text-warning fs-4"></i>
                </div>
                <div>
                    <span class="d-block fw-bold tracking-tight fs-6 lh-sm text-white">SAMSAT PERAWANG</span>
                    <small class="text-white-50 civ-subtitle">UPT Pengelolaan Pendapatan</small>
                </div>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
                    <li class="nav-item"><a class="nav-link active" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#persyaratan">Persyaratan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <div class="d-flex gap-2 btn-nav-group">
                    <a href="https://instagram.com" target="_blank" class="btn btn-outline-light btn-sm rounded-pill px-3 d-flex align-items-center gap-1">
                        <i class="bi bi-instagram text-warning"></i> @samsat.perawang
                    </a>
                    <a href="#persyaratan" class="btn btn-warning btn-sm rounded-pill px-3 fw-semibold text-dark shadow-sm">
                        <i class="bi bi-search me-1"></i> Cek Pajak
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section id="beranda" class="hero-section d-flex align-items-center position-relative overflow-hidden">
        <div class="container position-relative z-1">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start" data-aos="fade-right" data-aos-duration="1000">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-semibold mb-3 tracking-wider text-uppercase">Pelayanan Publik Prima</span>
                    <h1 class="display-5 fw-bold text-white mb-3">Selamat Datang di UPT Pengelolaan Pendapatan Perawang</h1>
                    <p class="lead text-white-50 mb-4">Melayani masyarakat dalam pembayaran pajak kendaraan bermotor secara mudah, cepat, transparan, dan terpercaya.</p>
                    <div class="d-sm-flex justify-content-center justify-content-lg-start gap-3">
                        <a href="#persyaratan" class="btn btn-warning btn-lg px-4 py-3 rounded-pill fw-bold shadow mb-3 mb-sm-0 w-100 w-sm-auto">Cek Informasi Pajak</a>
                        <a href="#layanan" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill w-100 w-sm-auto">Layanan Kami</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-duration="1000">
                    <div class="hero-illustration-wrapper position-relative">
                        <div class="hero-circle-bg position-absolute top-50 start-50 translate-middle"></div>
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=600&q=80" alt="Samsat Service Illustration" class="img-fluid rounded-4 shadow-2xl position-relative z-1 hero-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="statistik-section py-5">
        <div class="container mt-minus-card position-relative z-3">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card card-stat border-0 shadow-sm rounded-4 p-4 text-center h-100">
                        <div class="icon-stat mx-auto mb-3 bg-blue-light text-primary rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">25.000+</h3>
                        <p class="text-muted small mb-0">Masyarakat Terlayani</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card card-stat border-0 shadow-sm rounded-4 p-4 text-center h-100">
                        <div class="icon-stat mx-auto mb-3 bg-warning-light text-warning rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-wallet2 fs-3"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">18.500+</h3>
                        <p class="text-muted small mb-0">Pembayaran Pajak</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card card-stat border-0 shadow-sm rounded-4 p-4 text-center h-100">
                        <div class="icon-stat mx-auto mb-3 bg-success-light text-success rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-car-front-fill fs-3"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">45.000+</h3>
                        <p class="text-muted small mb-0">Kendaraan Terdaftar</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="card card-stat border-0 shadow-sm rounded-4 p-4 text-center h-100">
                        <div class="icon-stat mx-auto mb-3 bg-danger-light text-danger rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-emoji-smile-fill fs-3"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-1">92%</h3>
                        <p class="text-muted small mb-0">Kepuasan Pelayanan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="py-5 bg-light-gray section-padding">
        <div class="container">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Solusi Administrasi</span>
                <h2 class="fw-bold text-dark">Menu Layanan Utama</h2>
                <div class="title-divider mx-auto bg-primary my-3"></div>
                <p class="text-muted">Akses cepat berbagai bentuk jenis pengurusan dokumen dan perpajakan kendaraan Anda.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 h-100 transition-all">
                        <div class="icon-box-service mb-4 text-primary bg-blue-light rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-credit-card-2-front fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Pembayaran PKB</h5>
                        <p class="text-muted small">Kemudahan pembayaran Pajak Kendaraan Bermotor tahunan secara transparan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 h-100 transition-all">
                        <div class="icon-box-service mb-4 text-primary bg-blue-light rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-earmark-check fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Pengesahan STNK</h5>
                        <p class="text-muted small">Proses validasi dan pengesahan Surat Tanda Nomor Kendaraan tahunan Anda secara resmi.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 h-100 transition-all">
                        <div class="icon-box-service mb-4 text-primary bg-blue-light rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-arrow-left-right fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Mutasi Kendaraan</h5>
                        <p class="text-muted small">Layanan pengurusan pindah daerah registrasi kendaraan bermotor keluar maupun masuk.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 h-100 transition-all">
                        <div class="icon-box-service mb-4 text-primary bg-blue-light rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-arrow-repeat fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Bea Balik Nama (BBNKB)</h5>
                        <p class="text-muted small">Pengurusan alih kepemilikan atau konversi nama pemilik legal kendaraan bermotor.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 h-100 transition-all">
                        <div class="icon-box-service mb-4 text-primary bg-blue-light rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-info-circle fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Informasi Persyaratan</h5>
                        <p class="text-muted small">Cek kelengkapan berkas mandiri sebelum mendatangi kantor pelayanan utama.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 h-100 transition-all">
                        <div class="icon-box-service mb-4 text-primary bg-blue-light rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi bi-calendar3 fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Jadwal Pelayanan</h5>
                        <p class="text-muted small">Informasi jam operasional kantor induk dan agenda Samsat Keliling berkala.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white section-padding">
        <div class="container">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Langkah Mudah</span>
                <h2 class="fw-bold text-dark">Alur Pembayaran Pajak</h2>
                <div class="title-divider mx-auto bg-primary my-3"></div>
            </div>
            
            <div class="timeline-container position-relative py-4" data-aos="fade-up">
                <div class="row g-4 timeline-row">
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-primary text-white mb-3 shadow rounded-circle d-flex align-items-center justify-content-centerfw-bold fs-5">1</div>
                        <h6 class="fw-bold text-dark mb-2">Datang ke Samsat</h6>
                        <p class="text-muted small px-3">Bawa kendaraan serta berkas asli pendukung ke kantor.</p>
                    </div>
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-primary text-white mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">2</div>
                        <h6 class="fw-bold text-dark mb-2">Ambil No. Antrean</h6>
                        <p class="text-muted small px-3">Menuju mesin antrean otomatis di dekat pintu masuk.</p>
                    </div>
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-primary text-white mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">3</div>
                        <h6 class="fw-bold text-dark mb-2">Verifikasi Dokumen</h6>
                        <p class="text-muted small px-3">Penyerahan berkas ke loket pendaftaran awal.</p>
                    </div>
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-primary text-white mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">4</div>
                        <h6 class="fw-bold text-dark mb-2">Lakukan Pembayaran</h6>
                        <p class="text-muted small px-3">Bayar sesuai besaran nominal tarif di loket kasir.</p>
                    </div>
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-warning text-dark mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">5</div>
                        <h6 class="fw-bold text-dark mb-2">Terima Bukti</h6>
                        <p class="text-muted small px-3">Ambil STNK baru yang telah disahkan petugas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="persyaratan" class="py-5 bg-light-gray section-padding">
        <div class="container">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Panduan Berkas</span>
                <h2 class="fw-bold text-dark">Informasi Persyaratan Berkas</h2>
                <div class="title-divider mx-auto bg-primary my-3"></div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <div class="bg-primary p-4 text-white d-flex align-items-center gap-3">
                            <i class="bi bi-calendar-event fs-3 text-warning"></i>
                            <h5 class="fw-bold mb-0">Pajak Tahunan & Pengesahan</h5>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled space-y-3 mb-0">
                                <li class="d-flex align-items-start gap-3 border-bottom pb-3">
                                    <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                    <div>
                                        <strong class="text-dark d-block">KTP Asli</strong>
                                        <span class="text-muted small">Kartu Tanda Penduduk pemilik sesuai data STNK.</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3 border-bottom pb-3">
                                    <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                    <div>
                                        <strong class="text-dark d-block">STNK Asli</strong>
                                        <span class="text-muted small">Surat Tanda Nomor Kendaraan asli beserta fotokopi.</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                    <div>
                                        <strong class="text-dark d-block">Kondisi Fisik Cocok</strong>
                                        <span class="text-muted small">Kendaraan wajib dibawa jika masa STNK 5 tahunan habis.</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left">
                    <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <div class="bg-dark-blue p-4 text-white d-flex align-items-center gap-3">
                            <i class="bi bi-shuffle fs-3 text-warning"></i>
                            <h5 class="fw-bold mb-0">Mutasi & Balik Nama (BBNKB)</h5>
                        </div>
                        <div class="card-body p-4">
                            <ul class="list-unstyled space-y-3 mb-0">
                                <li class="d-flex align-items-start gap-3 border-bottom pb-3">
                                    <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                    <div>
                                        <strong class="text-dark d-block">KTP Pemilik Baru</strong>
                                        <span class="text-muted small">Identitas legal mutlak pihak pembeli/penerima.</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3 border-bottom pb-3">
                                    <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                    <div>
                                        <strong class="text-dark d-block">BPKB Asli & Fotokopi</strong>
                                        <span class="text-muted small">Buku Pemilik Kendaraan Bermotor untuk registrasi ulang.</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3 border-bottom pb-3">
                                    <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                    <div>
                                        <strong class="text-dark d-block">STNK Asli</strong>
                                        <span class="text-muted small">Dokumen jalan lama yang akan ditarik instansi.</span>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start gap-3">
                                    <i class="bi bi-check-circle-fill text-primary mt-1"></i>
                                    <div>
                                        <strong class="text-dark d-block">Kwitansi Pembelian</strong>
                                        <span class="text-muted small">Bukti transaksi jual beli sah bermaterai cukup.</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="berita" class="py-5 bg-white section-padding">
        <div class="container">
            <div class="d-md-flex align-items-end justify-content-between mb-5" data-aos="fade-up">
                <div>
                    <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Update Terkini</span>
                    <h2 class="fw-bold text-dark mb-0">Berita & Pengumuman</h2>
                    <div class="title-divider bg-primary my-3"></div>
                </div>
                <a href="#" class="btn btn-outline-primary rounded-pill px-4 py-2 mt-3 mt-md-0">Lihat Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-news border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=500&q=80" class="card-img-top news-img" alt="News 1">
                        <div class="card-body p-4">
                            <span class="badge bg-blue-light text-primary mb-2">Jadwal Pelayanan</span>
                            <h5 class="card-title fw-bold text-dark"><a href="#" class="text-decoration-none text-dark dynamic-title-color">Jadwal Samsat Keliling Minggu Ini</a></h5>
                            <p class="text-muted small card-text line-clamp-3">Masyarakat Perawang dapat mengakses layanan bus keliling di beberapa titik strategis sepanjang minggu operasional ini.</p>
                            <small class="text-muted d-block mt-3"><i class="bi bi-calendar me-1"></i> 22 Juni 2026</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card card-news border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=500&q=80" class="card-img-top news-img" alt="News 2">
                        <div class="card-body p-4">
                            <span class="badge bg-warning-light text-warning mb-2">Kebijakan Daerah</span>
                            <h5 class="card-title fw-bold text-dark"><a href="#" class="text-decoration-none text-dark dynamic-title-color">Program Pemutihan Pajak Kendaraan</a></h5>
                            <p class="text-muted small card-text line-clamp-3">Gubernur Riau kembali meluncurkan insentif pembebasan denda administrasi keterlambatan pajak kendaraan bermotor daerah.</p>
                            <small class="text-muted d-block mt-3"><i class="bi bi-calendar me-1"></i> 18 Juni 2026</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-news border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=500&q=80" class="card-img-top news-img" alt="News 3">
                        <div class="card-body p-4">
                            <span class="badge bg-success-light text-success mb-2">Edukasi</span>
                            <h5 class="card-title fw-bold text-dark"><a href="#" class="text-decoration-none text-dark dynamic-title-color">Tips Mengurus Pajak Kendaraan Tanpa Calo</a></h5>
                            <p class="text-muted small card-text line-clamp-3">Panduan interaktif mengurus dokumen perpajakan sendiri secara cepat, aman, transparan langsung di loket resmi.</p>
                            <small class="text-muted d-block mt-3"><i class="bi bi-calendar me-1"></i> 15 Juni 2026</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="py-5 bg-light-gray section-padding">
        <div class="container">
            <div class="text-center max-w-xl mx-auto mb-5" data-aos="fade-up">
                <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Dokumentasi</span>
                <h2 class="fw-bold text-dark">Galeri Kegiatan Instansi</h2>
                <div class="title-divider mx-auto bg-primary my-3"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="gallery-item position-relative overflow-hidden rounded-4 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=400&q=80" class="w-100 h-100 object-fit-cover" alt="Gedung Samsat">
                        <div class="gallery-overlay position-absolute start-0 top-0 w-100 h-100 d-flex flex-column justify-content-end p-3 text-white">
                            <span class="fw-bold small">Gedung Samsat</span>
                            <small class="text-white-50">Tampak Depan Kantor Induk</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="gallery-item position-relative overflow-hidden rounded-4 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=400&q=80" class="w-100 h-100 object-fit-cover" alt="Area Pelayanan">
                        <div class="gallery-overlay position-absolute start-0 top-0 w-100 h-100 d-flex flex-column justify-content-end p-3 text-white">
                            <span class="fw-bold small">Area Pelayanan</span>
                            <small class="text-white-50">Ruang Tunggu Utama Ber-AC</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="gallery-item position-relative overflow-hidden rounded-4 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1542744094-3a31f103e35f?auto=format&fit=crop&w=400&q=80" class="w-100 h-100 object-fit-cover" alt="Loket Pelayanan">
                        <div class="gallery-overlay position-absolute start-0 top-0 w-100 h-100 d-flex flex-column justify-content-end p-3 text-white">
                            <span class="fw-bold small">Loket Pelayanan</span>
                            <small class="text-white-50">Sistem Antrean Digital Terintegrasi</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="gallery-item position-relative overflow-hidden rounded-4 shadow-sm">
                        <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?auto=format&fit=crop&w=400&q=80" class="w-100 h-100 object-fit-cover" alt="Kegiatan Pelayanan">
                        <div class="gallery-overlay position-absolute start-0 top-0 w-100 h-100 d-flex flex-column justify-content-end p-3 text-white">
                            <span class="fw-bold small">Kegiatan Pelayanan</span>
                            <small class="text-white-50">Sosialisasi Wajib Pajak Daerah</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Layanan Pengaduan</span>
                    <h2 class="fw-bold text-dark">Kritik & Saran Masyarakat</h2>
                    <div class="title-divider bg-primary my-3"></div>
                    <p class="text-muted">Partisipasi Anda membantu kami terus bertransformasi menuju instansi yang jauh lebih responsif, profesional, dan nyaman bagi semua kalangan masyarakat Perawang.</p>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="card border-0 shadow rounded-4 p-4 p-md-5 bg-light-gray">
                        <form id="feedbackForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-dark small fw-semibold">Nama Lengkap</label>
                                    <input type="text" class="form-control rounded-3" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-dark small fw-semibold">Alamat Email</label>
                                    <input type="email" class="form-control rounded-3" placeholder="nama@email.com" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-dark small fw-semibold">Pesan Anda</label>
                                    <textarea class="form-control rounded-3" rows="4" placeholder="Tulis kritik, saran, atau masukan untuk Samsat Perawang..." required></textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm"><i class="bi bi-send me-1"></i> Kirim Masukan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="py-5 bg-light-gray section-padding">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="card border-0 bg-dark-blue text-white rounded-4 p-4 p-md-5 h-100 d-flex flex-column justify-content-between shadow-sm">
                        <div>
                            <h3 class="fw-bold mb-4 text-warning">Hubungi Kami</h3>
                            <div class="space-y-4 contact-info-block">
                                <div class="d-flex align-items-start gap-3">
                                    <i class="bi bi-geo-alt-fill text-warning fs-5"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Alamat Kantor</h6>
                                        <p class="text-white-50 small mb-0">Jalan Raya Minas Perawang, Perawang Barat, Kecamatan Tualang, Kabupaten Siak, Riau 28685.</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <i class="bi bi-clock-fill text-warning fs-5"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Jam Operasional</h6>
                                        <p class="text-white-50 small mb-0">Senin - Jumat: 08.00 - 14.00 WIB<br><span class="text-warning">Sabtu, Minggu & Hari Libur Nasional Tutup</span></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <i class="bi bi-instagram text-warning fs-5"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Media Sosial</h6>
                                        <p class="mb-0"><a href="https://instagram.com" target="_blank" class="text-white-50 text-decoration-none small hover-link-white">@samsat.perawang</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="https://maps.google.com" target="_blank" class="btn btn-warning w-100 rounded-pill py-2.5 fw-bold text-dark d-flex align-items-center justify-content-center gap-2 shadow"><i class="bi bi-geo-alt"></i> Buka Google Maps</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="map-wrapper rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.2818619616056!2d101.60945897407025!3d0.6872658632612089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d34346e45f9bfb%3A0xc3fa976df24df5fd!2sSamsat%20Perawang!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" width="100%" height="100%" style="border:0; min-height: 350px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark-blue text-white pt-5 pb-3 border-top border-secondary-subtle">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="logo-placeholder-footer d-flex align-items-center justify-content-center fw-bold text-primary bg-white rounded-3">
                            <i class="bi bi-shield-shaded text-primary fs-5"></i>
                        </div>
                        <h5 class="fw-bold text-white mb-0">SAMSAT PERAWANG</h5>
                    </div>
                    <p class="text-white-50 small max-w-sm mb-0">"Melayani Dengan Cepat, Transparan, dan Profesional"</p>
                </div>
                <div class="col-md-4 col-lg-3">
                    <h6 class="fw-bold text-warning mb-3">Menu Cepat</h6>
                    <ul class="list-unstyled space-y-2 footer-links small">
                        <li><a href="#beranda" class="text-white-50 text-decoration-none hover-link-white">Beranda</a></li>
                        <li><a href="#layanan" class="text-white-50 text-decoration-none hover-link-white">Layanan Utama</a></li>
                        <li><a href="#berita" class="text-white-50 text-decoration-none hover-link-white">Berita & Pengumuman</a></li>
                        <li><a href="#kontak" class="text-white-50 text-decoration-none hover-link-white">Kontak Kantor</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-4">
                    <h6 class="fw-bold text-warning mb-3">Hubungi Sosial Media</h6>
                    <p class="text-white-50 small mb-3">Ikuti akun resmi kami untuk informasi pemutihan dan jadwal instan harian.</p>
                    <a href="https://instagram.com" target="_blank" class="d-inline-flex align-items-center gap-2 text-decoration-none text-white bg-blur px-3 py-2 rounded-pill border border-secondary transition-all">
                        <i class="bi bi-instagram text-danger"></i> <span class="small fw-semibold">@samsat.perawang</span>
                    </a>
                </div>
            </div>
            <hr class="border-secondary opacity-25">
            <div class="text-center pt-2">
                <p class="text-white-50 small mb-0">&copy; 2026 UPT Pengelolaan Pendapatan Perawang. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="<?= base_url('assets/perawang/script.js') ?>"></script>
</body>
</html>