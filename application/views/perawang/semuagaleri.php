<section class="py-5 bg-light-gray section-padding" style="min-height: 80vh;">
    <div class="container">
        <div class="text-center max-w-xl mx-auto mb-5">
            <span class="text-primary fw-bold tracking-wider text-uppercase small d-block mb-2">Dokumentasi</span>
            <h2 class="fw-bold text-dark">Galeri Kegiatan Instansi</h2>
            <div class="title-divider mx-auto bg-primary my-3"></div>
            <p class="text-muted">Kumpulan dokumentasi foto kegiatan dan pelayanan Samsat Perawang kepada masyarakat.</p>
        </div>

        <div class="row g-4">
            <?php if (isset($data) && $data->num_rows() > 0) {
                foreach ($data->result_array() as $galeri) { 
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
                    <div class="bg-white p-5 rounded-4 shadow-sm max-w-xl mx-auto">
                        <i class="bi bi-images text-muted display-4 mb-3 d-block"></i>
                        <h5 class="fw-bold text-dark">Belum Ada Galeri</h5>
                        <p class="text-muted small mb-0">Saat ini belum ada dokumentasi kegiatan yang diterbitkan untuk wilayah Perawang.</p>
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
