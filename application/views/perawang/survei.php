<section class="py-5 bg-light-gray section-padding" style="min-height: 80vh;">
    <div class="container">
        <div class="text-center max-w-xl mx-auto mb-5">
            <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Bantuan & Evaluasi</span>
            <h2 class="fw-bold text-dark">Survei Kepuasan Masyarakat</h2>
            <div class="title-divider mx-auto bg-primary my-3"></div>
            <p class="text-muted">Partisipasi Anda sangat berarti untuk peningkatan kualitas pelayanan kami.</p>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <div class="card border-0 shadow-sm rounded-4 p-5 bg-white">
                    <i class="bi bi-clipboard-data text-primary mb-4" style="font-size: 4rem;"></i>
                    <h3 class="fw-bold text-dark mb-3">Bantu Kami Menjadi Lebih Baik</h3>
                    <p class="text-muted mb-4">Kami terus berupaya memberikan pelayanan yang maksimal kepada masyarakat. Berikan penilaian Anda terhadap pelayanan di UPT Pengelolaan Pendapatan Perawang melalui formulir survei resmi Bapenda Riau.</p>
                    <a href="https://bapenda.riau.go.id/pelayanan/surveikirim?uptup=3991" target="_blank" class="btn btn-warning btn-lg rounded-pill px-5 fw-bold shadow">
                        <i class="bi bi-pencil-square me-2"></i> Isi Survei Sekarang
                    </a>
                </div>
            </div>
        </div>

        <?php 
        $jumlah_respon = isset($data_survei->jumlah_respon) ? $data_survei->jumlah_respon : 0;
        if($jumlah_respon > 0) {
            // Kategori IKM
            $kategori_ikm = "Sangat Baik";
            if($ikm < 65) $kategori_ikm = "Kurang Baik";
            else if($ikm < 76.61) $kategori_ikm = "Cukup";
            else if($ikm < 88.31) $kategori_ikm = "Baik";
        ?>
        <!-- Data IKM -->
        <div class="text-center max-w-xl mx-auto mb-5 mt-5">
            <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Hasil Evaluasi</span>
            <h2 class="fw-bold text-dark">Data Survei Tahun <?= date('Y') ?></h2>
            <div class="title-divider mx-auto bg-primary my-3"></div>
            <p class="text-muted">Berikut adalah rekapitulasi hasil penilaian masyarakat terhadap layanan Samsat Perawang pada tahun ini.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-primary text-white h-100 transition-all hover-translate-y">
                    <i class="bi bi-star-fill fs-1 text-warning mb-2"></i>
                    <h1 class="display-3 fw-bold mb-0"><?= $ikm ?></h1>
                    <p class="fs-5 fw-semibold text-white-50 mb-3">Nilai IKM</p>
                    <div><span class="badge bg-warning text-dark px-3 py-2 rounded-pill fs-6 shadow-sm"><?= $kategori_ikm ?></span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-dark-blue text-white h-100 transition-all hover-translate-y">
                    <i class="bi bi-shield-check fs-1 text-success mb-2"></i>
                    <h1 class="display-3 fw-bold mb-0"><?= $isak ?></h1>
                    <p class="fs-5 fw-semibold text-white-50 mb-3">Nilai ISAK</p>
                    <div><span class="badge bg-success px-3 py-2 rounded-pill fs-6 shadow-sm">Sangat Baik</span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center bg-white border border-primary h-100 transition-all hover-translate-y">
                    <i class="bi bi-people-fill fs-1 text-primary mb-2"></i>
                    <h1 class="display-3 fw-bold text-dark mb-0"><?= $jumlah_respon ?></h1>
                    <p class="fs-5 fw-semibold text-muted mb-3">Responden</p>
                    <div><span class="badge bg-primary px-3 py-2 rounded-pill fs-6 shadow-sm">Tahun <?= date('Y') ?></span></div>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</section>

<?php $this->load->view('perawang/footer'); ?>
