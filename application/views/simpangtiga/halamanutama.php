<!-- SLIDER -->
<section id="hero-slider" class="hero-slider">
	<div class="swiper sliderFeaturedPosts">
		<div class="swiper-wrapper">

			<div class="swiper-slide">
				<a href="#" class="img-bg d-flex align-items-end" style="background-image: url('<?= base_url('assets/zenblog/') ?>img/slide/slide1.jpeg');">
					<div class="img-bg-inner">
						<h2>Kantor Pelayanan UPT Pengelolaan Pendapatan Simpang Tiga</h2>
						<p>Badan Pendapatan Daerah Provinsi Riau Jalan Jendral Sudirman</p>
					</div>
				</a>
			</div>
			<div class="swiper-slide">
				<a href="#" class="img-bg d-flex align-items-end" style="background-image: url('<?= base_url('assets/zenblog/') ?>img/slide/slide2.jpeg');">
					<div class="img-bg-inner">
						<h2>Samsat Drive Thru UPT Pengelolaan Pendapatan Simpang Tiga</h2>
						<p>Samsat Drive Thru merupakan, layanan transaksi membayar pajak tahunan
							kendaraan bermotor tanpa turun dengan keunggulannya yakni lebih cepat,
							mudah dan modern.</p>
					</div>
				</a>
			</div>

		</div>
		<div class="custom-swiper-button-next">
			<span class="bi-chevron-right"></span>
		</div>
		<div class="custom-swiper-button-prev">
			<span class="bi-chevron-left"></span>
		</div>

		<div class="swiper-pagination"></div>
	</div>
</section>
<!-- SLIDER -->

<!-- BERITA -->
<section id="berita" class="berita">
	<div class="container" data-aos="fade-up">
		<div class="row g-5">
			<div class="col-lg-4">
				<?php
				$isinya = substr(trim(strip_tags($getlastberita->row()->berita)), 0, 300);
				$tgl = date_format(new DateTime($getlastberita->row()->created_date), "Y-m-d");
				$tanggal_berita = $this->lib_func->tgl_indo($tgl);
				?>
				<div class="post-entry-1 lg">
					<a href="<?= base_url('simpangtiga/detailberita/') . $getlastberita->row()->link ?>"><img src="<?= base_url('upload/berita/') . $getlastberita->row()->cover ?>" alt="" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;"></a>
					<div class="post-meta">
						<span><?= $tanggal_berita ?></span>
					</div>
					<h4><a href="<?= base_url('simpangtiga/detailberita/') . $getlastberita->row()->link ?>"><?= $getlastberita->row()->judul ?></a></h4>
					<p class="mb-4 d-block">
						<?= $isinya ?> ...
						<br>
						<a href="<?= base_url('simpangtiga/detailberita/') . $getlastberita->row()->link ?>" style="font-weight: bold;">Baca Selengkapnya</a>
					</p>

				</div>

			</div>

			<div class="col-lg-8">
				<div class="row g-5">

					<?php
					if ($getallberita->num_rows() > 0) {
						$no = 1;
						foreach ($getallberita->result_array() as $datanya) {
							$nonya = $no++;

							if ($nonya == 1) {
							} else {
								$tgl = date_format(new DateTime($datanya['created_date']), "Y-m-d");
								$tanggal_berita = $this->lib_func->tgl_indo($tgl);
					?>

								<div class="col-lg-4 border-end custom-border">
									<div class="post-entry-1">
										<a href="<?= base_url('simpangtiga/detailberita/') . $datanya['link'] ?>"><img src="<?= base_url('upload/berita/') . $datanya['cover'] ?>" alt="" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;"></a>
										<div class="post-meta"><span><?= $tanggal_berita ?></span></div>
										<h2><a href="<?= base_url('simpangtiga/detailberita/') . $datanya['link'] ?>"><?= $datanya['judul'] ?></a></h2>
									</div>
								</div>

					<?php
							}
						}
					} ?>

				</div>
			</div>

		</div>
	</div>
</section>
<!-- BERITA -->

<section id="layanan" class="layanan">
	<div class="container" data-aos="fade-up">
		<div class="row mt-3">
			<div class="col-lg-12 text-center mb-3">
				<div class="post-meta">Layanan Kami</div>
			</div>
			<?php
			foreach ($getalljenislayanan->result_array() as $datajenislayanan) {
			?>
				<div class="col-lg-3 text-center mb-4">
					<a href="<?= base_url('simpangtiga/pelayanandetail/') . $datajenislayanan['id'] ?>">
						<img src="<?= base_url('assets/img/riau.png') ?>" alt="" class="img-fluid w-25 mb-4">
						<h5><?= $datajenislayanan['jenis_layanan'] ?></h5>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</section>

<!-- SIGNAL -->
<section class="signal">
	<div class="container" data-aos="fade-up">
		<div class="section-header d-flex justify-content-between align-items-center mb-5">
			<h2>E Signal</h2>
		</div>
		<div class="row">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/signal.png') ?>" alt="" class="img-fluid">

			</div>
			<div class="col-md-8">
				<div>
					<h3><strong>SIGNAL</strong> adalah samsat digital nasional, sebuah aplikasi untuk memudahkan masyarakat
						membayar pajak kendaraan bermotor secara aman dan mudah
					</h3>
					<a class="btn btn-outline-primary mt-3" href="https://samsatdigital.id/" target="_blank">Selengkapnya <i class="bi bi-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- SIGNAL -->

<!-- GALERI KEGIATAN -->
<style>
.gallery-item:hover img {
	transform: scale(1.06);
}
.gallery-item:hover .gallery-overlay {
	opacity: 1 !important;
}
</style>
<section id="galeri" class="galeri py-5">
	<div class="container" data-aos="fade-up">
		<div class="section-header d-flex justify-content-between align-items-center mb-5">
			<h2>Galeri Kegiatan</h2>
		</div>

		<div class="row g-4">
			<?php if (isset($getallgaleri) && $getallgaleri->num_rows() > 0) {
				foreach ($getallgaleri->result_array() as $galeri) { 
					$photos_query = $this->model_samsat_galeri->getGaleriFotobyIDGaleri($galeri['id']);
					$all_photos = [base_url('upload/galeri/') . $galeri['foto']];
					foreach ($photos_query->result_array() as $p) {
						$all_photos[] = base_url('upload/galeri/') . $p['foto'];
					}
					?>
					<div class="col-md-6 col-lg-3">
						<div class="gallery-item position-relative overflow-hidden rounded-3 shadow-sm" style="cursor: pointer; height: 220px;" data-photos='<?= json_encode($all_photos) ?>' data-keterangan="<?= htmlspecialchars($galeri['keterangan'], ENT_QUOTES, 'UTF-8') ?>">
							<img src="<?= base_url('upload/galeri/') . $galeri['foto'] ?>" class="w-100 h-100 object-fit-cover" alt="<?= $galeri['keterangan'] ?>" style="transition: transform 0.3s ease;">
							<div class="gallery-overlay position-absolute start-0 top-0 w-100 h-100 d-flex flex-column justify-content-end p-3 text-white" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); opacity: 0; transition: opacity 0.3s ease;">
								<span class="fw-bold small"><?= $galeri['keterangan'] ?></span>
							</div>
						</div>
					</div>
			<?php }
			} else { ?>
				<div class="col-12 text-center py-5">
					<p class="text-muted">Belum ada galeri kegiatan.</p>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- GALERI KEGIATAN -->

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