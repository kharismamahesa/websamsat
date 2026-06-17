<div class="container-fluid bg-secondary py-5 bg-header" style="margin-bottom:30px;">
	<div class="row py-5">
		<div class="col-12 pt-lg-5 mt-lg-3 text-center">
			<h2 class="text-white animated zoomIn">Berita</h2>
		</div>
	</div>
</div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">

		<?php
		foreach ($data->result_array() as $i) {
			$id = $i['id'];
			$judul = $i['judul'];
			$link = $i['link'];
			$tgl = date_format(new DateTime($i['created_date']), "Y-m-d");
			$tanggal = $this->lib_func->tgl_indo($tgl);
			$cover = $i['cover'];
			// $berita = $i['berita'];
			$berita = substr(strip_tags($i['berita']), 0, 400);
		?>
			<div class="row wow slideInUp mb-5" data-wow-delay="0.3s">
				<div class="col-lg-3">
					<div style="height: 200px;" class="blog-item bg-light rounded overflow-hidden">
						<div class="blog-img overflow-hidden">
							<img class="img-fluid w-100" style="height: 200px; object-fit: cover;" src="<?= base_url('upload/images/') . $cover ?>" alt="">
						</div>

					</div>
				</div>
				<div class="col-lg-9">
					<div class="p-4">
						<span class="small text-dark"><i class="far fa-calendar-alt me-2"></i> <?= $tanggal ?></span>
						<h4 class="text-success mb-3"><?= $judul ?></h4>
						<span class="small text-dark"><?= $berita ?></span>
						<br>
						<a class="text-secondary text-uppercase" href="<?= base_url('pekanbarukota/detailberita/') . $link ?>">SELENGKAPNYA <i class="bi bi-arrow-right"></i></a>
					</div>
				</div>
			</div>

		<?php
		}
		?>
		<br>
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