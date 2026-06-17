<div class="container-fluid bg-secondary py-5 bg-header" style="margin-bottom: 30px;">
	<div class="row py-5">
		<div class="col-12 pt-lg-5 mt-lg-3 text-center">
			<h2 class="text-white animated zoomIn"><?= $getberitabylink->judul ?></h2>
		</div>
	</div>
</div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">
		<div class="row g-5">
			<div class="col-lg-8">
				<!-- Blog Detail Start -->
				<div class="mb-5">
					<img class="img-fluid w-100 rounded mb-2" src="<?= base_url('upload/images/') . $getberitabylink->cover ?>" alt="">
					<p>
						<?php
						$tgl = date_format(new DateTime($getberitabylink->created_date), "Y-m-d");
						$tanggal_berita = $this->lib_func->tgl_indo($tgl);
						?>
						<span class="bg-success text-white rounded-end py-2 px-4">
							<i class="far fa-calendar-alt text-white me-2"></i> <?= $tanggal_berita ?>
						</span>
					</p>
					<p>
						<?= $getberitabylink->berita ?>
					</p>
				</div>
				<!-- Blog Detail End -->
			</div>

			<!-- Sidebar Start -->
			<div class="col-lg-4">

				<!-- Recent Post Start -->
				<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
					<div class="section-title section-title-sm position-relative pb-3 mb-4">
						<h3 class="mb-0">News</h3>
					</div>
					<?php
					if ($getallberita->num_rows() > 0) {
						$no = 1;
						foreach ($getallberita->result_array() as $datanya) {
					?>
							<div class="d-flex rounded overflow-hidden mb-3">
								<img class="img-fluid" src="<?= base_url('upload/images/') .  $datanya['cover'] ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
								<a href="<?= base_url('dumai/detailberita/') . $datanya['link'] ?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
									<?= $datanya['judul'] ?>
								</a>
							</div>
					<?php }
					} ?>
				</div>
				<!-- Recent Post End -->

			</div>
			<!-- Sidebar End -->
		</div>
	</div>
</div>
<!-- Blog End -->


<?php
$this->load->view('dumai/footer');
?>


</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/wow/wow.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/easing/easing.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/counterup/counterup.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>js/main.js"></script>

</html>