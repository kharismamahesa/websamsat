<div class="container-fluid bg-secondary py-5 bg-header" style="margin-bottom:30px;">
	<div class="row py-5">
		<div class="col-12 pt-lg-5 mt-lg-3 text-center">
			<span class="h5 text-white">Unit Pelayanan</span>
			<h2 class="text-white animated zoomIn"><?= $unit ?></h2>
		</div>
	</div>
</div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">

		<div class="row g-5 mb-5">

			<?php
			if ($unit_link == 'samsattanjak') {
			?>
				<div class="col-lg-6">
					<div class="d-flex wow fadeIn" data-wow-delay="0.1s">
						<div class="bg-success d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
							<i class="fa fa-clock text-white"></i>
						</div>
						<div class="ps-4">
							<h5 class="mb-2">Hari Selasa di Kampus Universitas Muhammadiyah Riau</h5>
							<h4 class="text-success mb-0">09.00 s/d 12.00</h4>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
						<div class="bg-success d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
							<i class="fa fa-clock text-white"></i>
						</div>
						<div class="ps-4">
							<h5 class="mb-2">Kampus Universitas Riau (Gobah)</h5>
							<h4 class="text-success mb-0">09.00 s/d 12.00</h4>
						</div>
					</div>
				</div>
			<?php } else if ($unit_link == 'mpp') { ?>
				<div class="col-lg-6">
					<div class="d-flex wow fadeIn" data-wow-delay="0.1s">
						<div class="bg-success d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
							<i class="fa fa-clock text-white"></i>
						</div>
						<div class="ps-4">
							<h5 class="mb-2">Senin s/d Jum'at</h5>
							<h4 class="text-success mb-0">09.00 s/d 15.00</h4>
						</div>
					</div>
				</div>
			<?php
			} ?>
		</div>

	</div>
</div>
<!-- Blog End -->


<?php
$this->load->view('pekanbarukota/footer');
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