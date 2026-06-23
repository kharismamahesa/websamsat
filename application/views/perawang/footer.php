    <footer class="bg-dark-blue text-white pt-5 pb-3 border-top border-secondary-subtle">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-5">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="d-flex align-items-center justify-content-center fw-bold text-primary">
                            <img src="<?= base_url('assets/img/riau.png') ?>" width="30" alt="Samsat Perawang">
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
                        <li><a href="<?= base_url('perawang') ?>#berita" class="text-white-50 text-decoration-none hover-link-white">Berita & Pengumuman</a></li>
                        <li><a href="<?= base_url('perawang/semuagaleri') ?>" class="text-white-50 text-decoration-none hover-link-white">Galeri</a></li>
                        <li><a href="<?= base_url('perawang/visimisi') ?>" class="text-white-50 text-decoration-none hover-link-white">Visi & Misi</a></li>
                        <li><a href="<?= base_url('perawang') ?>#kontak" class="text-white-50 text-decoration-none hover-link-white">Kontak Kantor</a></li>
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
    <script src="<?= base_url('assets/perawang/script.js?v=' . time()) ?>"></script>
</body>
</html>
