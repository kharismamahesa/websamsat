    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1 mt-5 mt-lg-0" data-aos="fade-up">
                    <span class="badge bg-light mb-3 px-3 py-2 rounded-pill shadow-sm" style="font-weight:500; letter-spacing:1px; color: var(--primary-green);">SELAMAT DATANG</span>
                    <h1 class="hero-title">
                        Portal <span class="text-gradient">Pelayanan</span>
                    </h1>
                    <h2 class="h3 text-muted fw-light mb-4">
                        Badan Pendapatan Daerah Provinsi Riau
                    </h2>
                    <p class="text-secondary mb-5 fs-5">
                        Kami hadir untuk memberikan pelayanan terbaik bagi masyarakat. Akses informasi pajak dan layanan lainnya dengan mudah dan cepat.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="#services" class="btn btn-gradient btn-lg px-4">
                            Mulai Layanan <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="zoom-in" data-aos-delay="200">
                    <!-- Gunakan asset gambar yang sudah ada -->
                    <img src="<?= base_url('assets/flexstart/assets/img/choose.png') ?>" alt="Pelayanan" class="img-fluid" style="max-height: 500px; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.1));">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h6 class="text-uppercase fw-bold" style="color: var(--primary-green); letter-spacing: 2px;">Layanan Kami</h6>
                <h2 class="fw-bold display-6">Pilih Kategori Pelayanan</h2>
                <div class="mx-auto mt-3" style="width: 80px; height: 4px; background: var(--primary-green); border-radius: 2px;"></div>
            </div>

            <div class="row g-4">
                <!-- Service 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card card-green">
                        <div class="icon-wrapper">
                            <i class="ri-motorbike-fill"></i>
                        </div>
                        <h3>Informasi Pajak Kendaraan</h3>
                        <p class="text-muted">Cek informasi dan status pajak kendaraan bermotor Anda secara real-time.</p>
                        <a href="<?= base_url('dashboard/layanan/infopajak') ?>" class="read-more">Lihat Detail <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card card-green">
                        <div class="icon-wrapper">
                            <i class="ri-chat-1-fill"></i>
                        </div>
                        <h3>Pengaduan & Saran</h3>
                        <p class="text-muted">Sampaikan kritik, saran, atau pengaduan Anda untuk perbaikan layanan kami.</p>
                        <a href="<?= base_url('pelayanan/pengaduan') ?>" class="read-more">Sampaikan <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card card-green">
                        <div class="icon-wrapper">
                            <i class="ri-survey-line"></i>
                        </div>
                        <h3>Survei Kepuasan</h3>
                        <p class="text-muted">Bantu kami meningkatkan kualitas layanan dengan mengisi survei kepuasan masyarakat.</p>
                        <a href="<?= base_url('pelayanan/survei') ?>" class="read-more">Ikuti Survei <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card card-green">
                        <div class="icon-wrapper">
                            <i class="ri-question-line"></i>
                        </div>
                        <h3>F A Q</h3>
                        <p class="text-muted">Temukan jawaban atas pertanyaan yang sering diajukan seputar layanan kami.</p>
                        <a href="<?= base_url('dashboard/faq') ?>" class="read-more">Lihat FAQ <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-card card-yellow">
                        <div class="icon-wrapper">
                            <i class="ri-bar-chart-line"></i>
                        </div>
                        <h3>Informasi Realisasi</h3>
                        <p class="text-muted">Pantau data capaian realisasi pendapatan daerah secara terbuka dan transparan.</p>
                        <a href="<?= base_url('dashboard/mata_pajak') ?>" class="read-more">Lihat Data <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-card card-red">
                        <div class="icon-wrapper">
                            <i class="ri-discuss-line"></i>
                        </div>
                        <h3>SP4N Lapor</h3>
                        <p class="text-muted">Layanan aspirasi dan pengaduan online rakyat terintegrasi secara nasional.</p>
                        <a href="https://www.lapor.go.id/" target="_blank" class="read-more">Kunjungi Lapor <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $this->load->view('pelayanan/baru/footer'); ?>
