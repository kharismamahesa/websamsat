<section class="py-5 bg-light-gray section-padding" style="min-height: 80vh;">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <!-- Main Content -->
            <div class="col-lg-8">
                <?php
                $tgl = date_format(new DateTime($getberitabylink->created_date), "Y-m-d");
                $tanggal_berita = $this->lib_func->tgl_indo($tgl);
                $allowed = '<div><span><pre><p><br><hr><hgroup><h1><h2><h3><h4><h5><h6>
                    <ul><ol><li><dl><dt><dd><strong><em><b><i><u>
                    <img><a><abbr><address><blockquote><area><audio><video>
                    <form><fieldset><label><input><textarea>
                    <caption><table><tbody><td><tfoot><th><thead><tr>
                    <iframe>';
                ?>

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb bg-white rounded-3 px-3 py-2 shadow-sm small">
                        <li class="breadcrumb-item"><a href="<?= base_url('perawang') ?>" class="text-decoration-none text-primary">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('perawang/semuaberita') ?>" class="text-decoration-none text-primary">Berita</a></li>
                        <li class="breadcrumb-item active text-muted" aria-current="page"><?= strlen($getberitabylink->judul) > 40 ? substr($getberitabylink->judul, 0, 40) . '...' : $getberitabylink->judul ?></li>
                    </ol>
                </nav>

                <!-- Article Card -->
                <article class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    <!-- Cover Image -->
                    <img src="<?= base_url('upload/berita/') . $getberitabylink->cover ?>" alt="<?= $getberitabylink->judul ?>" class="card-img-top" style="height: 400px; object-fit: cover;">
                    
                    <div class="card-body p-4 p-md-5">
                        <!-- Meta -->
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge bg-primary rounded-pill px-3 py-2 fw-semibold small">Berita</span>
                            <span class="text-muted small"><i class="bi bi-calendar me-1"></i> <?= $tanggal_berita ?></span>
                        </div>

                        <!-- Title -->
                        <h1 class="fw-bold text-dark mb-4" style="font-size: 1.75rem; line-height: 1.3;"><?= $getberitabylink->judul ?></h1>

                        <hr class="opacity-10 mb-4">

                        <!-- Article Body -->
                        <div class="article-content" style="font-size: 1.05rem; line-height: 1.8; color: #444;">
                            <?= strip_tags($getberitabylink->berita, $allowed) ?>
                        </div>
                    </div>
                </article>

                <!-- Back Button -->
                <div class="mt-4">
                    <a href="<?= base_url('perawang/semuaberita') ?>" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold">
                        <i class="bi bi-arrow-left me-1"></i> Kembali ke Berita
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <!-- <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white sticky-top" style="top: 100px;">
                    <div class="bg-primary p-4 text-white">
                        <h5 class="fw-bold mb-0"><i class="bi bi-newspaper me-2"></i>Berita Lainnya</h5>
                    </div>
                    <div class="card-body p-0">
                        <?php if (isset($getallberita) && $getallberita->num_rows() > 0) {
                            $count = 0;
                            foreach ($getallberita->result_array() as $datanya) {
                                if ($count >= 5) break;
                                $tgl_sidebar = date_format(new DateTime($datanya['created_date']), "Y-m-d");
                                $tanggal_sidebar = $this->lib_func->tgl_indo($tgl_sidebar);
                        ?>
                                <a href="<?= base_url('perawang/detailberita/') . $datanya['link'] ?>" class="d-flex align-items-start gap-3 p-3 text-decoration-none border-bottom sidebar-news-item">
                                    <img src="<?= base_url('upload/images/') . $datanya['cover'] ?>" alt="<?= $datanya['judul'] ?>" class="rounded-3 flex-shrink-0" style="width: 70px; height: 70px; object-fit: cover;">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1 small line-clamp-2"><?= $datanya['judul'] ?></h6>
                                        <small class="text-muted"><i class="bi bi-calendar me-1"></i><?= $tanggal_sidebar ?></small>
                                    </div>
                                </a>
                        <?php
                                $count++;
                            }
                        } else { ?>
                            <div class="p-4 text-center text-muted small">Belum ada berita lainnya.</div>
                        <?php } ?>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<?php $this->load->view('perawang/footer'); ?>
