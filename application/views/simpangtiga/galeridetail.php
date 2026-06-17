<section class="single-post-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 post-content" data-aos="fade-up">

                <div class="single-post">
                    <h1 class="mb-2">Galeri</h1>
                    <h5 class="mb-5"><?= $datagaleri->keterangan ?></h5>
                </div>
                <div class="single-post col-md-12">
                    <div class="row g-5">
                        <?php
                        foreach ($datagalerifoto->result_array() as $galerifoto) {
                        ?>

                            <div class="col-lg-6 custom-border">
                                <div class="post-entry-1">
                                    <img src="<?= base_url('upload/gambarsamsat/galeri/') . $galerifoto['foto'] ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
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