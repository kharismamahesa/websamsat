<section class="single-post-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 post-content" data-aos="fade-up">

				<div class="single-post">
					<h1 class="mb-5">FAQ</h1>
				</div>
				<div class="single-post col-md-12">

					<div class="tab-content" id="pills-tabContent">

						<!-- SIDEBAR POSTINGAN TERAKHIR -->
						<div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
							<?php
							foreach ($getallfaq->result_array() as $datanya) {
							?>
								<div class="post-entry-1 border-bottom">
									<h2 class="mb-2"><a href="<?= base_url('simpangtiga/faqdetail/') . $datanya['id'] ?>"><?= $datanya['kategori'] ?></a></h2>
								</div>
							<?php } ?>
						</div>
						<!-- SIDEBAR POSTINGAN TERAKHIR -->

					</div>

				</div>


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