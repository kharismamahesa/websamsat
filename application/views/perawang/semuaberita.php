<section class="py-5 bg-light-gray section-padding" style="min-height: 80vh;">
    <div class="container">
        <div class="text-center max-w-xl mx-auto mb-5">
            <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Informasi Terkini</span>
            <h2 class="fw-bold text-dark">Berita & Pengumuman</h2>
            <div class="title-divider mx-auto bg-primary my-3"></div>
            <p class="text-muted">Dapatkan update informasi seputar pelayanan, kebijakan, dan pengumuman resmi Samsat Perawang.</p>
        </div>

        <div class="row g-4">
            <?php if (isset($data) && $data->num_rows() > 0) {
                foreach ($data->result_array() as $datanya) {
                    $tgl = date_format(new DateTime($datanya['created_date']), "Y-m-d");
                    $tanggal_berita = $this->lib_func->tgl_indo($tgl);
                    $berita_isi = substr(strip_tags($datanya['berita']), 0, 150) . '...';
            ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card card-news border-0 shadow-sm rounded-4 h-100 overflow-hidden bg-white">
                            <img src="<?= base_url('upload/berita/') . $datanya['cover'] ?>" class="card-img-top news-img" alt="<?= $datanya['judul'] ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title fw-bold text-dark mb-2">
                                        <a href="<?= base_url('perawang/detailberita/') . $datanya['link'] ?>" class="text-decoration-none text-dark dynamic-title-color">
                                            <?= $datanya['judul'] ?>
                                        </a>
                                    </h5>
                                    <p class="text-muted small card-text line-clamp-3 mb-3"><?= $berita_isi ?></p>
                                </div>
                                <div>
                                    <hr class="opacity-10 mb-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <small class="text-muted"><i class="bi bi-calendar me-1"></i> <?= $tanggal_berita ?></small>
                                        <a href="<?= base_url('perawang/detailberita/') . $datanya['link'] ?>" class="btn btn-link btn-sm text-primary text-decoration-none fw-semibold p-0">Baca <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php 
                }
            } else { ?>
                <div class="col-12 text-center py-5">
                    <div class="bg-white p-5 rounded-4 shadow-sm max-w-xl mx-auto">
                        <i class="bi bi-newspaper text-muted display-4 mb-3 d-block"></i>
                        <h5 class="fw-bold text-dark">Belum Ada Berita</h5>
                        <p class="text-muted small mb-0">Saat ini belum ada update berita atau pengumuman yang diterbitkan untuk wilayah Perawang.</p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php if (isset($pagination) && !empty($pagination)) { ?>
            <div class="row mt-5">
                <div class="col-12">
                    <?= $pagination; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php $this->load->view('perawang/footer'); ?>
