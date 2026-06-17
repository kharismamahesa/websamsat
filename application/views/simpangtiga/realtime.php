<section class="single-post-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 post-content" data-aos="fade-up">

				<div class="single-post">
					<h1 class="mb-2">Realtime Penerimaan Tahun <?= date('Y') ?></h1>
					<h5 class="mb-5 "><strong>UPT Pengelolaan Pendapatan Simpang Tiga</strong></h5>

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
							<?php
							if ($getdatarealtime->num_rows() > 0) {
								$unitpkb = $getdatarealtime->row()->unit_pkb;
								$pokokpkb = $getdatarealtime->row()->total_pkb;
								$unitbbn = $getdatarealtime->row()->unit_bbn;
								$pokokbbn = $getdatarealtime->row()->total_bbn;
							?>
								<tbody>
									<tr>
										<th scope="row">Pajak Kendaraan Bermotor</th>
										<td style="text-align: right;"><span style="font-family: 'Monomaniac One', sans-serif;"><?= number_format($unitpkb, 0, ",", ".") ?></span></td>
										<td style="text-align: right;"><span style="font-family: 'Monomaniac One', sans-serif;"><?= number_format($pokokpkb, 0, ",", ".") ?></span></td>
									</tr>
									<tr>
										<th scope="row">Bea Balik Nama Kendaraan Bermotor</th>
										<td style="text-align: right;"><span style="font-family: 'Monomaniac One', sans-serif;"><?= number_format($unitbbn, 0, ",", ".") ?></span></td>
										<td style="text-align: right;"><span style="font-family: 'Monomaniac One', sans-serif;"><?= number_format($pokokbbn, 0, ",", ".") ?></span></td>
									</tr>
								</tbody>
							<?php } else {
							?>
								<tbody>
									<tr>
										<th colspan="3" scope="row">Data Kosong</th>
									</tr>
								</tbody>
							<?php
							} ?>

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