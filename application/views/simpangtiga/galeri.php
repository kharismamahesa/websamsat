<section class="single-post-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 post-content" data-aos="fade-up">

                <div class="single-post">
                    <h1 class="mb-5">Galeri</h1>
                </div>
                <div class="single-post col-md-12">

                    <div class="row g-5">

                        <?php
                        foreach ($data->result_array() as $i) {
                            $id = $i['id'];
                            $keterangan = $i['keterangan'];
                            $foto = $i['foto'];
                        ?>
                            <div class="col-lg-4 custom-border">
                                <div class="post-entry-1">
                                    <a href="<?= base_url('page/unitkerja/simpangtiga/galeridetail/') . $id ?>">
                                        <img src="<?= base_url('upload/gambarsamsat/galeri/') . $foto ?>" alt="" class="img-fluid">
                                        <div class="post-meta"><span><?= $keterangan ?></span></div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <?= $pagination; ?>
                </div>

            </div>
            <div class="col-md-3">

                <?php
                $this->load->view('websamsat/simpangtiga/sidebar');
                ?>

            </div>
        </div>
    </div>
</section>

</main>
<!-- MAIN -->
<?php
$this->load->view('websamsat/simpangtiga/footer');
?>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Vendor JS Files -->
<script src="<?= base_url('assets/zenblog/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/zenblog/') ?>vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('assets/zenblog/') ?>vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('assets/zenblog/') ?>vendor/aos/aos.js"></script>
<script src="<?= base_url('assets/zenblog/') ?>vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('assets/zenblog/') ?>js/main.js"></script>

</body>

</html>