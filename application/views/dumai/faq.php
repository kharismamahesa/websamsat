<div class="container-fluid bg-secondary py-5 bg-header" style="margin-bottom:30px;">
	<div class="row py-5">
		<div class="col-12 pt-lg-5 mt-lg-3 text-center">
			<h2 class="text-white animated zoomIn">Frequently Asked Questions</h2>
		</div>
	</div>
</div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">

		<div class="row g-5">
			<?php
			foreach ($getallfaq->result_array() as $datanya) {
			?>
				<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
					<div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
						<div class="service-icon">
							<i class="fa fa-question text-white"></i>
						</div>
						<h4 class="mb-3"><?= $datanya['kategori']; ?></h4>
						<p class="m-0"><?= $datanya['keterangan']; ?></p>
						<a class="btn btn-lg btn-success rounded" href="<?= base_url('dumai/faq/') . $datanya['id'] ?>">
							<i class="bi bi-arrow-right"></i>
						</a>
					</div>
				</div>
			<?php } ?>
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