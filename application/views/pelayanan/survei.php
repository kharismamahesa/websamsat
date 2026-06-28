<section class="breadcrumbs">
	<div class="container">
		<h2>Survei Kepuasan Masyarakat</h2>
	</div>
</section>

<main id="main">

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">

		<div class="container" data-aos="fade-up">

			<div class="row gy-4">

				<div class="col-lg-7">
					<form method="post" action="#" class="php-email-form">
						<div class="row gy-4">

							<div class="col-md-12">
								<select type="text" class="form-control" id="uptup" name="uptup" style="width: 100%;">
									<option value="">SILAHKAN PILIH KANTOR UPT / UP</option>
									<?php
									foreach ($getuptup->result_array() as $datanya) {
										if ($datanya['Status'] == '') {
											$kantornya = $datanya['NamaUPTUP'];
										} else {
											$kantornya = $datanya['Status'] . ' ' . $datanya['NamaUPTUP'];
										}
									?>
										<option value="<?= $datanya['KodeWilayah'] ?>"><?= $kantornya ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="col-md-12">
								<button type="button" id="btnpilihuptup" class="btn btn-success rounded-0">Selanjutnya <i class="bi bi-arrow-right"></i> </button>
							</div>

						</div>
					</form>
				</div>

				<div class="col-lg-5">
					<div class="row gy-4">
						<div class="col-md-12">
							<div class="info-box p-4">
								<img src="<?= base_url('assets/riau.png') ?>" class="mb-2" width="60px">
								<h3>Badan Pendapatan Daerah<br>Provinsi Riau</h3>
								<p>Jl. Jend. Sudirman No.6 Simpang Tiga<br>Pekanbaru</p>
							</div>
						</div>
					</div>
				</div>


			</div>

		</div>

	</section><!-- End Contact Section -->

</main>

<?php $this->load->view('pelayanan/footer'); ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/aos/aos.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/js/sweetalert2.min.js"></script>


<script>
	$(document).ready(function() {
		$('#btnpilihuptup').click(function() {
			var uptup = $("#uptup").val();
			if (uptup == "") {
				Swal.fire({
					title: 'Peringatan!',
					text: 'Silahkan pilih kantor UPT / UP terlebih dahulu',
					icon: 'error',
					confirmButtonText: 'OK',
					confirmButtonColor: '#E74C3C',
				});
			} else {
				window.location = "surveikirim?uptup=" + uptup;
			}
		});

		$('#uptup').select2({
			theme: 'bootstrap4',
		});
	});
</script>

</body>

</html>