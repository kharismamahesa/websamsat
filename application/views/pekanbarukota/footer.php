<!-- Footer Start -->
<div class="container-fluid bg-success text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container">
		<div class="row gx-5">
			<div class="col-lg-12 col-md-6">
				<div class="row gx-5">
					<div class="col-lg-3 col-md-12 pt-5 mb-5">
						<div class="section-title section-title-sm position-relative pb-3 mb-4">
							<h3 class="text-light mb-0">Get In Touch</h3>
						</div>
						<div class="d-flex mb-2">
							<i class="bi bi-geo-alt text-white me-2"></i>
							<p class="mb-0">
								UPT. Pengelolaan Pendapatan Pekanbaru Kota
								<br>
								Jl. Gajah Mada No. 200
								<br>
								Kecamatan Pekanbaru Kota
							</p>
						</div>
						<div class="d-flex mb-2">
							<a href="#" target="_blank" class="btn text-white" style="background-color: #E1306C; border-radius: 5px;"><i class="bi bi-instagram"></i> samsatpekanbarukota</a>
						</div>
						<div class="d-flex mb-2">
							<a href="#" target="_blank" class="btn text-white" style="background-color: #4267B2; border-radius: 5px;"><i class="bi bi-facebook"></i> Samsat Pekanbaru Kota</a>
						</div>
						<div class="d-flex mb-2">
							<a href="#" target="_blank" class="btn text-white" style="background-color: #000000; border-radius: 5px; color: #00f2ea;"><i class="bi bi-tiktok"></i> samsatpekanbarukota</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-12 pt-0 pt-lg-5 mb-5">
						<?php
						$getdspendidikan = $this->model_samsat_survei->getDSPendidikan(1);
						$getdskelamin = $this->model_samsat_survei->getDSKelamin(1);
						$nilaiikm = $this->model_samsat_survei->hitungIKM(1);
						$nilaiisak = $this->model_samsat_survei->hitungISAK(1);
						$jumlahresponden = $this->model_samsat_survei->getDataSurvei(1)->jumlah_respon;
						?>
						<div class="section-title section-title-sm position-relative pb-3">
							<h3 class="text-light mb-0">Indeks Survei Kepuasan Masyarakat</h3>
						</div>
						<div class="link-animated d-flex flex-column text-center">
							<span style="font-size: 75px; font-family: 'Monomaniac One', sans-serif;" data-toggle="counter-up">
								<?= floor($nilaiikm); ?>
							</span>
						</div>
						<div class="section-title section-title-sm position-relative pb-3">
							<h3 class="text-light mb-0">Indeks Survei Anti Korupsi</h3>
						</div>
						<div class="link-animated d-flex flex-column text-center">
							<span style="font-size: 75px; font-family: 'Monomaniac One', sans-serif;" data-toggle="counter-up">
								<?= floor($nilaiisak); ?>
							</span>
						</div>
						Jumlah Responden: <?= $jumlahresponden ?>
					</div>
					<div class="col-lg-3 col-md-12 pt-0 pt-lg-5 mb-5">
						<div class="section-title section-title-sm position-relative pb-3 mb-4">
							<h3 class="text-light mb-0">Quick Links</h3>
						</div>
						<div class="link-animated d-flex flex-column justify-content-start">
							<a class="text-light mb-2" href="<?= base_url('pekanbarukota') ?>"><i class="bi bi-arrow-right text-white me-2"></i>Beranda</a>
							<a class="text-light mb-2" href="<?= base_url('pekanbarukota') ?>#berita"><i class="bi bi-arrow-right text-white me-2"></i>Berita</a>
							<a class="text-light mb-2" href="<?= base_url('pekanbarukota/strukturorganisasi') ?>"><i class="bi bi-arrow-right text-white me-2"></i>Struktur Organisasi</a>
							<a class="text-light mb-2" href="<?= base_url('pekanbarukota/visimisi') ?>"><i class="bi bi-arrow-right text-white me-2"></i>Visi dan Misi</a>
							<a class="text-light mb-2" href="<?= base_url('pekanbarukota/realtime') ?>"><i class="bi bi-arrow-right text-white me-2"></i>Realtime Penerimaan</a>
							<a class="text-light mb-2" href="https://bapenda.riau.go.id/dashboard/layanan/infopajak"><i class="bi bi-arrow-right text-white me-2"></i>Pajak Kendaraaan Bermotor</a>
							<a class="text-light mb-2" href="<?= base_url('pekanbarukota/faq') ?>"><i class="bi bi-arrow-right text-white me-2"></i>FAQ</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-12 pt-0 pt-lg-5 mb-5">
						<div class="section-title section-title-sm position-relative pb-3 mb-4">
							<h3 class="text-light mb-0">News</h3>
						</div>
						<div class="link-animated d-flex flex-column justify-content-start">
							<?php
							if ($getallberita->num_rows() > 0) {
								$no = 1;
								foreach ($getallberita->result_array() as $datanya) {
							?>
									<a class="text-light mb-2" href="<?= base_url('pekanbarukota/detailberita/') . $datanya['link'] ?>"><i class="bi bi-arrow-right text-white me-2"></i><?= $datanya['judul'] ?></a>
							<?php }
							} ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<a href="#" class="btn btn-lg btn-success btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>