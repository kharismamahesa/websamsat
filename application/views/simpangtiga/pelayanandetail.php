<section class="single-post-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 post-content" data-aos="fade-up">

				<?php
				if ($getjeniskomponen->num_rows() > 0) {
				?>
					<div class="single-post">
						<h1 class="mb-5"><?= $getjenis->row()->jenis_layanan ?></h1>
					</div>
					<div class="single-post col-md-12">

						<div class="accordion" id="accordionExample">

							<?php
							foreach ($getjeniskomponen->result_array() as $datajeniskomponen) {
							?>
								<div class="accordion-item">
									<h2 class="accordion-header">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $datajeniskomponen['id'] ?>" aria-expanded="false" aria-controls="collapseTwo">
											<?= $datajeniskomponen['komponen'] ?>
										</button>
									</h2>
									<div id="collapse<?= $datajeniskomponen['id'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
										<div class="accordion-body">
											<?= $datajeniskomponen['uraian'] ?>
										</div>
									</div>
								</div>

							<?php } ?>
						</div>

					</div>
				<?php } ?>
			</div>
			<div class="col-md-3">

				<?php
				$this->load->view('simpangtiga/sidebar');
				?>

			</div>
		</div>
	</div>
</section>

</main>
<!-- MAIN -->
<?php
$this->load->view('simpangtiga/footer');
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