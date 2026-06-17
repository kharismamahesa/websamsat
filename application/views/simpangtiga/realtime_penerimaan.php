<section class="single-post-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 post-content" data-aos="fade-up">

				<div class="single-post">
					<h1 class="mb-2">Realtime Penerimaan <?= $kategori_unit ?> Tahun <?= date('Y') ?></h1>

				</div>
				<div class="single-post col-md-12">
					<div class="table-responsive">
						<table class="table" style="font-size: 26px;">
							<thead class="thead-dark">
								<tr>
									<th scope="col" class="bg-primary text-white">DATA REALISASI</th>
									<th scope="col" class="bg-success">UNIT</th>
									<th scope="col" class="bg-danger">POKOK</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">Pajak Kendaraan Bermotor</th>
									<td style="text-align: right;"><span style="font-family: 'Monomaniac One', sans-serif;"><?= number_format($total_unit, 0, ",", ".") ?></span></td>
									<td style="text-align: right;"><span style="font-family: 'Monomaniac One', sans-serif;"><?= number_format($total_penerimaan, 0, ",", ".") ?></span></td>
								</tr>
							</tbody>


						</table>

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