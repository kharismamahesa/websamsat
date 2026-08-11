    <section id="beranda" class="hero-section d-flex align-items-center position-relative overflow-hidden">
        <div class="container position-relative z-1">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-5 fw-bold text-white mb-3">Selamat Datang di UPT Pengelolaan Pendapatan Perawang</h1>
                    <p class="lead text-white-50 mb-4">Melayani masyarakat dalam pembayaran pajak kendaraan bermotor secara mudah, cepat, transparan, dan terpercaya.</p>
                    <div class="d-sm-flex justify-content-center justify-content-lg-start gap-3">
                        <a href="https://bapenda.riau.go.id/dashboard/layanan/infopajak" class="btn btn-warning btn-lg px-4 py-3 rounded-pill fw-bold shadow mb-3 mb-sm-0 w-100 w-sm-auto">Cek Informasi Pajak</a>
                        <a href="#layanan" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill w-100 w-sm-auto">Layanan Kami</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="hero-illustration-wrapper position-relative">
                        <div class="hero-circle-bg position-absolute top-50 start-50 translate-middle"></div>
                        <img src="<?= base_url('assets/perawang/samsatperawang.jpeg') ?>?>" alt="Samsat Perawang" class="img-fluid rounded-4 shadow-2xl position-relative z-1 hero-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="statistik-section py-5">
        <div class="container mt-minus-card position-relative z-3">
            <!-- Header text -->
            <div class="text-center bg-white p-4 p-md-5 rounded-4 shadow-sm mb-4 border-top border-4 border-warning">
                <h3 class="fw-bold text-dark mb-3">Layanan Tambahan</h3>
                <p class="text-muted small max-w-xl mx-auto mb-0" style="font-size: 0.95rem; line-height: 1.6;">Warga Siak tercinta, yuk bangun daerah kita tercinta dengan taat membayar pajak kendaraan bermotor! Samsat Perawang siap melayani Anda di berbagai lokasi pada jadwal tertentu.</p>
            </div>

            <!-- 3 cards side-by-side -->
            <div class="row g-4 justify-content-center">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                        <div class="icon-stat mx-auto mb-3 bg-blue-light text-primary rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-truck fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Samsat Keliling</h5>
                        <p class="text-muted small mb-0">Samsat Keliling adalah layanan bus/mobil keliling untuk perpanjangan pajak tahunan yang mangkal di lokasi strategis (seperti pasar atau pusat keramaian).</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                        <div class="icon-stat mx-auto mb-3 bg-warning-light text-warning rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-building fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Samsat Tanjak</h5>
                        <p class="text-muted small mb-0">Samsat Tanjak (Antar Jemput Antar Kampung) adalah inovasi khusus Provinsi Riau yang menjangkau wilayah pelosok atau area publik (seperti Car Free Day) yang tidak terjangkau Samsat induk/keliling.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="py-5 bg-light-gray section-padding">
        <div class="container">
            <div class="text-center max-w-xl mx-auto mb-5">
                <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Solusi Administrasi</span>
                <h2 class="fw-bold text-dark">Menu Layanan Utama</h2>
                <div class="title-divider mx-auto bg-primary my-3"></div>
                <p class="text-muted">Akses cepat berbagai bentuk jenis pengurusan dokumen dan perpajakan kendaraan Anda.</p>
            </div>
            <div class="row g-4">
                <?php
                $layanan_utama = $this->db->query("SELECT * FROM samsat_layanan WHERE id >= 14 ORDER BY id")->result_array();
                
                // Array ikon untuk memvariasikan ikon yang muncul
                $icons = ['bi-calendar-check', 'bi-car-front-fill', 'bi-arrow-repeat', 'bi-arrow-left-right', 'bi-palette', 'bi-hash', 'bi-gift', 'bi-files', 'bi-card-checklist', 'bi-file-earmark-text', 'bi-shield-check'];
                
                $i = 0;
                foreach ($layanan_utama as $layanan) :
                    $icon = $icons[$i % count($icons)];
                    $i++;
                ?>
                <div class="col-md-6 col-lg-3">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 h-100 transition-all" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalLayanan<?= $layanan['id'] ?>">
                        <div class="icon-box-service mb-4 text-primary bg-blue-light rounded-3 d-flex align-items-center justify-content-center">
                            <i class="bi <?= $icon ?> fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2"><?= $layanan['jenis_layanan'] ?></h5>
                        <p class="text-muted small mb-0">Klik untuk melihat detail persyaratan dan prosedur.</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Modals for Layanan Utama -->
            <?php foreach ($layanan_utama as $layanan) : ?>
            <div class="modal fade" id="modalLayanan<?= $layanan['id'] ?>" tabindex="-1" aria-labelledby="modalLayananLabel<?= $layanan['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content border-0 rounded-4 shadow">
                        <div class="modal-header bg-primary text-white border-0">
                            <h5 class="modal-title fw-bold" id="modalLayananLabel<?= $layanan['id'] ?>"><?= $layanan['jenis_layanan'] ?></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="text-dark">
                                <?= !empty($layanan['keterangan']) ? $layanan['keterangan'] : '<div class="text-center text-muted py-4"><i class="bi bi-info-circle fs-1 text-secondary mb-3 d-block"></i><p class="mb-0">Belum ada detail keterangan untuk layanan ini.</p></div>' ?>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="py-5 bg-white section-padding">
        <div class="container">
            <div class="text-center max-w-xl mx-auto mb-5">
                <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Langkah Mudah</span>
                <h2 class="fw-bold text-dark">Alur Pembayaran Pajak</h2>
                <div class="title-divider mx-auto bg-primary my-3"></div>
            </div>

            <div class="timeline-container position-relative py-4">
                <div class="row g-4 timeline-row">
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-primary text-white mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">1</div>
                        <div>
                            <h6 class="fw-bold text-dark mb-2">Datang ke Samsat</h6>
                            <p class="text-muted small px-3">Bawa kendaraan serta berkas asli pendukung ke kantor.</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-primary text-white mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">2</div>
                        <div>
                            <h6 class="fw-bold text-dark mb-2">Ambil No. Antrean</h6>
                            <p class="text-muted small px-3">Menuju mesin antrean otomatis di dekat pintu masuk.</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-primary text-white mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">3</div>
                        <div>
                            <h6 class="fw-bold text-dark mb-2">Verifikasi Dokumen</h6>
                            <p class="text-muted small px-3">Penyerahan berkas ke loket pendaftaran awal.</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-primary text-white mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">4</div>
                        <div>
                            <h6 class="fw-bold text-dark mb-2">Lakukan Pembayaran</h6>
                            <p class="text-muted small px-3">Bayar sesuai besaran nominal tarif di loket kasir.</p>
                        </div>
                    </div>
                    <div class="col-lg col-md-6 timeline-item text-center">
                        <div class="timeline-icon mx-auto bg-warning text-dark mb-3 shadow rounded-circle d-flex align-items-center justify-content-center fw-bold fs-5">5</div>
                        <div>
                            <h6 class="fw-bold text-dark mb-2">Terima Bukti</h6>
                            <p class="text-muted small px-3">Ambil STNK baru yang telah disahkan petugas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-5 bg-light-gray section-padding">
        <div class="container">
            <div class="text-center max-w-xl mx-auto mb-5">
                <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">FAQ</span>
                <h2 class="fw-bold text-dark">Frequently Asked Questions</h2>
                <div class="title-divider mx-auto bg-primary my-3"></div>
            </div>
            
            <div class="row g-4 justify-content-center">
                <?php
                // Fetch FAQ Categories
                $faq_kategories = $this->db->query("SELECT * FROM t_faq_kategori ORDER BY kategori")->result_array();
                
                // Array ikon untuk FAQ kategori
                $faq_icons = ['bi-question-circle', 'bi-info-circle', 'bi-chat-dots', 'bi-journal-text', 'bi-shield-check', 'bi-gear'];
                
                $i = 0;
                foreach ($faq_kategories as $kategori) :
                    $icon = $faq_icons[$i % count($faq_icons)];
                    $i++;
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-service border-0 shadow-sm rounded-4 p-4 h-100 transition-all text-center" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalFaqKategori<?= $kategori['id'] ?>">
                        <div class="icon-box-service mx-auto mb-4 text-primary bg-blue-light rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="bi <?= $icon ?> fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2"><?= $kategori['kategori'] ?></h5>
                        <p class="text-muted small mb-0">Klik untuk melihat daftar pertanyaan.</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Modals for FAQ Categories -->
            <?php 
            $faq_index = 0;
            foreach ($faq_kategories as $kategori) : 
            ?>
            <div class="modal fade" id="modalFaqKategori<?= $kategori['id'] ?>" tabindex="-1" aria-labelledby="modalFaqLabel<?= $kategori['id'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content border-0 rounded-4 shadow">
                        <div class="modal-header bg-primary text-white border-0">
                            <h5 class="modal-title fw-bold" id="modalFaqLabel<?= $kategori['id'] ?>">FAQ: <?= $kategori['kategori'] ?></h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <?php
                            $faqs = $this->db->query("SELECT * FROM t_faq WHERE id_kategori_faq = " . $kategori['id'] . " ORDER BY judul")->result_array();
                            if (count($faqs) > 0) {
                            ?>
                            <div class="accordion accordion-flush" id="accordionFaqKategori<?= $kategori['id'] ?>">
                                <?php foreach ($faqs as $index => $faq) : 
                                    $faq_index++;
                                ?>
                                <div class="accordion-item border-bottom mb-2">
                                    <h2 class="accordion-header" id="faq-heading-<?= $faq_index ?>">
                                        <button class="accordion-button <?= $index == 0 ? '' : 'collapsed' ?> fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-<?= $faq_index ?>" aria-expanded="<?= $index == 0 ? 'true' : 'false' ?>" aria-controls="faq-collapse-<?= $faq_index ?>">
                                            <?= $faq['judul'] ?>
                                        </button>
                                    </h2>
                                    <div id="faq-collapse-<?= $faq_index ?>" class="accordion-collapse collapse <?= $index == 0 ? 'show' : '' ?>" aria-labelledby="faq-heading-<?= $faq_index ?>" data-bs-parent="#accordionFaqKategori<?= $kategori['id'] ?>">
                                        <div class="accordion-body text-muted">
                                            <?= $faq['informasi'] ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php } else { ?>
                                <div class="text-center text-muted py-4">
                                    <i class="bi bi-info-circle fs-1 text-secondary mb-3 d-block"></i>
                                    <p class="mb-0">Belum ada FAQ untuk kategori ini.</p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="berita" class="py-5 bg-white section-padding">
        <div class="container">
            <div class="d-md-flex align-items-end justify-content-between mb-5">
                <div>
                    <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Update Terkini</span>
                    <h2 class="fw-bold text-dark mb-0">Berita & Pengumuman</h2>
                    <div class="title-divider bg-primary my-3"></div>
                </div>
                <a href="<?= base_url('perawang/semuaberita') ?>" class="btn btn-outline-primary rounded-pill px-4 py-2 mt-3 mt-md-0">Lihat Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            <div class="row g-4">
                <?php if (isset($getallberita) && $getallberita->num_rows() > 0) {
                    foreach ($getallberita->result_array() as $datanya) {
                        $tgl = date_format(new DateTime($datanya['created_date']), "Y-m-d");
                        $tanggal_berita = $this->lib_func->tgl_indo($tgl);
                        $berita_isi = substr(strip_tags($datanya['berita']), 0, 150) . '...';
                ?>
                        <div class="col-md-4">
                            <div class="card card-news border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                                <img src="<?= base_url('upload/berita/') . $datanya['cover'] ?>" class="card-img-top news-img" alt="<?= $datanya['judul'] ?>">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-bold text-dark"><a href="<?= base_url('perawang/detailberita/') . $datanya['link'] ?>" class="text-decoration-none text-dark dynamic-title-color"><?= $datanya['judul'] ?></a></h5>
                                    <p class="text-muted small card-text line-clamp-3"><?= $berita_isi ?></p>
                                    <small class="text-muted d-block mt-3"><i class="bi bi-calendar me-1"></i> <?= $tanggal_berita ?></small>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else { ?>
                    <div class="col-12 text-center py-5">
                        <div class="text-muted fs-5">Belum ada update berita.</div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="galeri" class="py-5 bg-light-gray section-padding">
        <div class="container">
            <div class="d-md-flex align-items-end justify-content-between mb-5">
                <div>
                    <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Dokumentasi</span>
                    <h2 class="fw-bold text-dark mb-0">Galeri Kegiatan Instansi</h2>
                    <div class="title-divider bg-primary my-3"></div>
                </div>
                <a href="<?= base_url('perawang/semuagaleri') ?>" class="btn btn-outline-primary rounded-pill px-4 py-2 mt-3 mt-md-0">Lihat Selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            <div class="row g-4">
                <?php if (isset($getallgaleri) && $getallgaleri->num_rows() > 0) {
                    foreach ($getallgaleri->result_array() as $galeri) {
                        $photos_query = $this->model_samsat_galeri->getGaleriFotobyIDGaleri($galeri['id']);
                        $all_photos = [base_url('upload/galeri/') . $galeri['foto']];
                        foreach ($photos_query->result_array() as $p) {
                            $all_photos[] = base_url('upload/galeri/') . $p['foto'];
                        }
                ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="gallery-item position-relative overflow-hidden rounded-4 shadow-sm" style="cursor: pointer;" data-photos='<?= json_encode($all_photos) ?>' data-keterangan="<?= htmlspecialchars($galeri['keterangan'], ENT_QUOTES, 'UTF-8') ?>">
                                <img src="<?= base_url('upload/galeri/') . $galeri['foto'] ?>" class="w-100 h-100 object-fit-cover" alt="<?= $galeri['keterangan'] ?>">
                                <div class="gallery-overlay position-absolute start-0 top-0 w-100 h-100 d-flex flex-column justify-content-end p-3 text-white">
                                    <span class="fw-bold small"><?= $galeri['keterangan'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div class="col-12 text-center py-5">
                        <div class="text-muted fs-5">Belum ada galeri kegiatan.</div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-12">
                    <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Layanan Pengaduan</span>
                    <h2 class="fw-bold text-dark">Kritik & Saran Masyarakat</h2>
                    <div class="title-divider bg-primary my-3"></div>
                    <p class="text-muted">Partisipasi Anda membantu kami terus bertransformasi menuju instansi yang jauh lebih responsif, profesional, dan nyaman bagi semua kalangan masyarakat Perawang.</p>
                    <div class="col-12">
                        <a href="https://bapenda.riau.go.id/pelayanan/pengaduankirim?uptup=3991&jenis=1" class="btn btn-primary rounded-pill px-4 py-2 fw-semibold shadow-sm"><i class="bi bi-send me-1"></i> Kirim Masukan</a>
                    </div>
                </div>
                <!-- <div class="col-lg-7">
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
                </div> -->
            </div>
        </div>
    </section>

    <section id="kontak" class="py-5 bg-light-gray section-padding">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5">
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
                                        <p class="text-white-50 small mb-0">
                                            Senin - Kamis: 08.00 - 14.00 WIB<br>
                                            Jumat: 08.00 - 11.00 WIB<br>
                                            Sabtu: 08.00 - 12.00 WIB<br>
                                            <span class="text-warning">Minggu & Hari Libur Nasional Tutup</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <i class="bi bi-headset text-warning fs-5"></i>
                                    <div>
                                        <h6 class="fw-bold mb-2">Kontak & Media Sosial</h6>
                                        <ul class="list-unstyled mb-0 small space-y-2">
                                            <li><i class="bi bi-telephone text-white-50 me-2"></i> <a href="tel:082385685430" class="text-white-50 text-decoration-none hover-link-white">082385685430 (Call Center)</a></li>
                                            <li><i class="bi bi-instagram text-white-50 me-2"></i> <a href="https://instagram.com/samsat.perawang" target="_blank" class="text-white-50 text-decoration-none hover-link-white">Samsat.perawang</a></li>
                                            <li><i class="bi bi-facebook text-white-50 me-2"></i> <a href="#" target="_blank" class="text-white-50 text-decoration-none hover-link-white">Samsat Perawang</a></li>
                                            <li><i class="bi bi-tiktok text-white-50 me-2"></i> <a href="#" target="_blank" class="text-white-50 text-decoration-none hover-link-white">Samsat Perawang</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="https://maps.app.goo.gl/Nvpq4RvBC6iorLhk9" target="_blank" class="btn btn-warning w-100 rounded-pill py-2.5 fw-bold text-dark d-flex align-items-center justify-content-center gap-2 shadow"><i class="bi bi-geo-alt"></i> Buka Google Maps</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="map-wrapper rounded-4 overflow-hidden shadow-sm h-100 bg-white p-2">
                        <iframe src="https://maps.google.com/maps?q=Samsat+Perawang&z=16&output=embed" width="100%" height="100%" style="border:0; min-height:350px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('perawang/footer'); ?>