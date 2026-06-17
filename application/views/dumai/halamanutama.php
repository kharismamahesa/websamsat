<!-- SLIDER -->
<div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img class="w-100" src="<?= base_url() ?>assets/img/a.jpg" alt="Image">
			<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
				<div class="p-3" style="max-width: 900px;">
					<h4 class="display-4 text-white mb-md-4 animated zoomIn">
						Selamat Datang di <br>Samsat Dumai Kota
					</h4>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img class="w-100" src="<?= base_url() ?>assets/img/c.jpg" alt="Image">
			<div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
				<div class="p-3" style="max-width: 900px;">
					<h4 class="display-4 text-white mb-md-4 animated zoomIn">
						UPT Pengelolaan Pendapatan <br>Dumai Kota
					</h4>

				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- FAV MENU -->
<div class="container-fluid facts py-5 pt-lg-0">
	<div class="container py-5 pt-lg-0">
		<div class="row gx-0">
			<div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
				<div class="bg-success shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
					<a href="https://bapenda.riau.go.id/dashboard/layanan/infopajak" target="_blank">
						<div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
							<i class="fa fa-info text-success"></i>
						</div>
					</a>
					<div class="ps-4">
						<a href="https://bapenda.riau.go.id/dashboard/layanan/infopajak" target="_blank">
							<h5 class="text-white mb-0">Informasi Pajak Kendaraan Bermotor</h5>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
				<div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
					<a href="https://bapenda.riau.go.id/pelayanan/pengaduankirim?uptup=10&jenis=1" target="_blank">
						<div class="bg-success d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
							<i class="fa fa-bullhorn text-white"></i>
						</div>
					</a>
					<div class="ps-4">
						<a href="https://bapenda.riau.go.id/pelayanan/pengaduankirim?uptup=10&jenis=1" target="_blank">
							<h5 class="text-success mb-0">Pengaduan dan Saran</h5>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
				<div class="bg-success shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
					<a href="https://bapenda.riau.go.id/pelayanan/surveikirim?uptup=1" target="_blank">
						<div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
							<i class="fa fa-list-ul text-success"></i>
						</div>
					</a>
					<div class="ps-4">
						<a href="https://bapenda.riau.go.id/pelayanan/surveikirim?uptup=1" target="_blank">
							<h5 class="text-white mb-0">Survei Kepuasan Masyarakat</h5>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- BERITA -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="berita">
	<div class="container py-5">
		<div class="row g-5">
			<div class="section-title text-center position-relative pb-3 mb-3 mx-auto" style="max-width: 600px;">
				<h5 class="fw-bold text-success text-uppercase">Berita</h5>
			</div>

			<div class="row g-5">
				<?php
				if ($getallberita->num_rows() > 0) {
					$no = 1;
					foreach ($getallberita->result_array() as $datanya) {
						$nonya = $no++;
						$tgl = date_format(new DateTime($datanya['created_date']), "Y-m-d");
						$tanggal_berita = $this->lib_func->tgl_indo($tgl);
				?>
						<div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
							<div style="min-height: 400px;" class="blog-item bg-light rounded overflow-hidden">
								<div class="blog-img overflow-hidden">
									<img class="img-fluid w-100" style="height: 200px; object-fit: cover;" src="<?= base_url('upload/images/') . $datanya['cover'] ?>" alt="">
									<!-- <a class="position-absolute top-0 start-0 bg-success text-white rounded-end mt-5 py-2 px-4" href="">
                                        <i class="far fa-calendar-alt text-white me-2"></i> <?= $tanggal_berita ?>
                                    </a> -->
								</div>
								<div class="p-4">
									<span class="small text-dark"><i class="far fa-calendar-alt me-2"></i> <?= $tanggal_berita ?></span>
									<h4 class="text-success mb-3"><?= $datanya['judul'] ?></h4>
									<a class="text-secondary text-uppercase" href="<?= base_url('dumai/detailberita/') . $datanya['link'] ?>">SELENGKAPNYA <i class="bi bi-arrow-right"></i></a>
								</div>
							</div>
						</div>

				<?php }
				} ?>

			</div>

		</div>
	</div>
</div>

<!-- LAYANAN -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
					<h5 class="fw-bold text-success text-uppercase">Layanan Kami</h5>
				</div>
				<div class="row g-5">
					<div class="col-lg-4 text-center">
						<div class="col-12 wow zoomIn" data-wow-delay="0.2s">
							<img class="mb-3" src="<?= base_url() ?>assets/img/riau.png" style="height: 150px;" />
							<h4>Pajak Tahunan</h4>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="col-12 wow zoomIn" data-wow-delay="0.2s">
							<img class="mb-3" src="<?= base_url() ?>assets/img/riau.png" style="height: 150px;" />
							<h4>Pajak 5 Tahunan</h4>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="col-12 wow zoomIn" data-wow-delay="0.2s">
							<img class="mb-3" src="<?= base_url() ?>assets/img/riau.png" style="height: 150px;" />
							<h4>BBN-KB</h4>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="col-12 wow zoomIn" data-wow-delay="0.2s">
							<img class="mb-3" src="<?= base_url() ?>assets/img/riau.png" style="height: 150px;" />
							<h4>Pajak Air Permukaan</h4>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="col-12 wow zoomIn" data-wow-delay="0.2s">
							<img class="mb-3" src="<?= base_url() ?>assets/img/riau.png" style="height: 150px;" />
							<h4>PBB-KB</h4>
						</div>
					</div>
					<div class="col-lg-4 text-center">
						<div class="col-12 wow zoomIn" data-wow-delay="0.2s">
							<img class="mb-3" src="<?= base_url() ?>assets/img/riau.png" style="height: 150px;" />
							<h4>Samsat Tanjak</h4>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-6">
				
			</div> -->
		</div>
	</div>
</div>

<!-- E SIGNAL -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">
		<div class="row g-5">
			<div class="col-lg-8">
				<div class="mb-5">
					<h1 class="mb-0">e-SIGNAL</h1>
					<h5 class="fw-bold">
						<p>
							<strong>SIGNAL</strong> adalah samsat digital nasional,
							sebuah aplikasi untuk memudahkan masyarakat membayar pajak kendaraan bermotor
							secara aman dan mudah
						</p>
					</h5>
				</div>
				<a href="https://samsatdigital.id/" target="_blank" class="btn btn-dark">Selengkapnya <i class="bi bi-arrow-right"></i></a>
			</div>
			<div class="col-lg-4">
				<img src="<?= base_url() ?>assets/img/signal.png" class="w-100" alt="SIGNAL">
			</div>
		</div>
	</div>
</div>


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