<section class="breadcrumbs">
	<div class="container">
		<h2>Pengaduan</h2>
	</div>
</section>

<main id="main">

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">

		<div class="container" data-aos="fade-up">

			<header class="section-header info-box">
				<h3>
					<?php
					if ($datauptup->row()->Status == '') {
						echo $datauptup->row()->NamaUPTUP;
					} else {
						echo  $datauptup->row()->Status . ' ' . $datauptup->row()->NamaUPTUP;
					}
					?>
				</h3>
			</header>

			<div class="row gy-4">

				<div class="col-lg-7">
					<form method="post" action="#" class="php-email-form">
						<div class="row gy-4">

							<div class="col-md-12">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
							</div>
							<div class="col-md-6">
								<input type="number" class="form-control" id="nohp" name="nohp" placeholder="Nomor Handphone / Whatsapp">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email">
							</div>
							<div class="col-md-12">
								<textarea class="form-control" id="pesan" name="pesan" rows="6" placeholder="Pesan Aduan" required></textarea>
							</div>

							<div class="col-md-12">
								<button type="button" id="btnkirimpengaduan" class="btn btn-success rounded-0">Kirim Pengaduan <i class="bi bi-send"></i> </button>
								<button class="btn btn-success rounded-0" type="button" id="loadingnya" disabled>
									<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
									<span role="status">Loading...</span>
								</button>
							</div>

						</div>
					</form>
				</div>

				<div class="col-lg-5">
					<div class="row gy-4">
						<div class="col-md-12">
							<div class="info-box">
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
		$('#loadingnya').hide();
		$('#btnkirimpengaduan').show();

		$('#btnkirimpengaduan').click(function() {
			var uptup = "<?= $_GET['uptup'] ?>";
			var jenis = "<?= $_GET['jenis'] ?>";
			var nama = $("#nama").val();
			var nohp = $("#nohp").val();
			var email = $("#email").val();
			var pesan = $("#pesan").val();
			$('#btnkirimpengaduan').prop('disabled', true);

			$('#loadingnya').show();
			$('#btnkirimpengaduan').hide();

			Swal.fire({
				title: 'Silahkan tunggu, data sedang diproses!',
				color: '#468847',
				showConfirmButton: false,
				backdrop: `rgba(70,136,71,0.4)
					url("<?= base_url('assets/gif/paperplane.gif') ?>")
					left top
					no-repeat`
			});

			var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if ((uptup) == '' || (jenis == '')) {
				Swal.fire({
					title: 'Peringatan!',
					text: 'Terjadi kesalahan',
					icon: 'error',
					confirmButtonColor: '#E74C3C',
					confirmButtonText: 'OK'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location = "pengaduan";
					}
				})
			} else {
				if ((nama == '') || (nohp == '') || (email == '') || (pesan == '')) {
					Swal.fire({
						title: 'Peringatan!',
						text: 'Lengkapi data pengaduan terlebih dahulu',
						icon: 'error',
						confirmButtonText: 'OK',
						confirmButtonColor: '#E74C3C',
					});
				} else {
					if (email.match(mailformat)) {
						$.ajax({
							url: "<?= base_url('api/simpanpengaduan') ?>",
							method: "POST",
							data: {
								uptup: uptup,
								jenis: jenis,
								nama: nama,
								nohp: nohp,
								email: email,
								pesan: pesan,
							},
							async: true,
							dataType: 'JSON',
							success: function(res) {
								if (res.success == true) {
									Swal.fire({
										title: 'Sukses',
										text: res.message,
										icon: 'success',
										confirmButtonColor: '#468847',
										confirmButtonText: 'OK'
									}).then((result) => {
										if (result.isConfirmed) {
											window.location = "pengaduan";
										}
									});
								} else {
									Swal.fire({
										title: 'Peringatan!',
										text: res.message,
										icon: 'error',
										confirmButtonText: 'OK',
										confirmButtonColor: '#E74C3C',
									});
								}
								$('#loadingnya').hide();
								$('#btnkirimpengaduan').show();
								$('#btnkirimpengaduan').prop('disabled', false);
							},
							error: function(xhr, ajaxOptions, thrownError) {
								// alert(xhr + ' | ' + thrownError);
								Swal.fire({
									title: 'Peringatan!',
									text: 'Terjadi kesalahan pada server',
									icon: 'error',
									confirmButtonText: 'OK',
									confirmButtonColor: '#E74C3C',
								});
							}
						});
					} else {
						Swal.fire({
							title: 'Peringatan!',
							text: 'Silahkan masukkan email yang valid dan aktif',
							icon: 'error',
							confirmButtonText: 'OK',
							confirmButtonColor: '#E74C3C',
						});
					}
				}
			}
		});
	});
</script>

</body>

</html>