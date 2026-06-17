<div class="container-fluid bg-secondary py-5 bg-header" style="margin-bottom:30px;">
	<div class="row py-5">
		<div class="col-12 pt-lg-5 mt-lg-3 text-center">
			<h2 class="text-white animated zoomIn">Video</h2>
		</div>
	</div>
</div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">
		<div class="row">

			<?php
			foreach ($data->result_array() as $i) {
				$id = $i['id'];
				$judul = $i['judul'];
				$url = $i['url'];
				$url_code = $i['url_code'];
				$tgl = date_format(new DateTime($i['created_date']), "Y-m-d");
				$tanggal = $this->lib_func->tgl_indo($tgl);
			?>
				<div class="col-md-6">
					<iframe class="w-100" height="300px" src="<?= $url ?>" allowfullscreen>
					</iframe>
					<h4 class="text-success mb-3"><?= $judul ?></h4>
				</div>

			<?php
			}
			?>
		</div>
		<?= $pagination; ?>

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