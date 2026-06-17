<!-- FOOTER -->
<footer id="footer" class="footer">
	<div class="footer-content">
		<div class="container">
			<div class="row g-5">
				<div class="col-lg-3">
					<h3 class="footer-heading">Samsat Simpang Tiga</h3>
					<p>
						Jl. Jend.Sudirman No.6 Pekanbaru
						<br>
						Call Center : 081276045009
						<br>
						Email : Silahkan scan QR Code dibawah ini
						<br>
						<img src="<?= base_url('assets/images/qrsamsatsimpangtiga.png') ?>" alt="" class="img-fluid w-75">
					</p>
				</div>
				<div class="col-lg-3">
					<h3 class="footer-heading">Berita Terakhir</h3>
					<ul class="footer-links footer-blog-entry list-unstyled">

						<?php
						if ($getallberita->num_rows() > 0) {
							$no = 1;
							foreach ($getallberita->result_array() as $datanya) {
								$nonya = $no++;
								$tgl = date_format(new DateTime($datanya['created_date']), "Y-m-d");
								$tanggal_berita = $this->lib_func->tgl_indo($tgl);
						?>
								<li>
									<a href="<?= base_url('simpangtiga/detailberita/') . $datanya['link'] ?>" class="d-flex align-items-center">
										<img src="<?= base_url('upload/images/') . $datanya['cover'] ?>" alt="" class="img-fluid me-3" style="width: 70px; height: 70px; object-fit: cover;">
										<div>
											<div class="post-meta d-block">
												<span><?= $tanggal_berita ?></span>
											</div>
											<span><?= $datanya['judul'] ?></span>
										</div>
									</a>
								</li>

						<?php }
						}
						?>

					</ul>
				</div>
				<?php
				$getdspendidikan = $this->model_samsat_survei->getDSPendidikan(1992);
				$getdskelamin = $this->model_samsat_survei->getDSKelamin(1992);
				$nilaiikm = $this->model_samsat_survei->hitungIKM(1992);
				$nilaiisak = $this->model_samsat_survei->hitungISAK(1992);
				$jumlahresponden = $this->model_samsat_survei->getDataSurvei(1992)->jumlah_respon;
				?>
				<div class="col-lg-3">
					<div class="border-bottom border-top text-center">
						<p>
							<span style="font-size: 75px; font-family: 'Monomaniac One', sans-serif;">
								<?= floor($nilaiikm); ?>
							</span>
						</p>

						<h3 class="footer-heading">Indeks Survei Kepuasan Masyarakat</h3>
					</div>
					<div class="border-bottom text-center">
						<p>
							<span style="font-size: 75px; font-family: 'Monomaniac One', sans-serif;">
								<?= floor($nilaiisak); ?>
							</span>
						</p>
						<h3 class="footer-heading">Indeks Survei Anti Korupsi</h3>
					</div>
					<p>
						Responden: <?= $jumlahresponden ?>
					</p>
				</div>
				<div class="col-lg-3">
					<a href="https://bapenda.riau.go.id/" target="_blank">
						<img src="https://bapenda.riau.go.id/pelayanan/assets/images/bapenda.png" class="img-fluid w-100" alt="">
					</a>
					<a href="https://www.lapor.go.id/" target="_blank">
						<img src="https://www.lapor.go.id/themes/lapor/assets/images/logo.png" class="img-fluid w-100 mt-3" alt="">
					</a>
					<a href="https://bapenda.riau.go.id/pelayanan/pengaduan/pengaduan_isi?jenis=1&tujuan=2" target="_blank">
						<img src="https://bapenda.riau.go.id/pelayanan/assets/sipengat.png" class="img-fluid w-100 w-100 mt-3" alt="">
					</a>
				</div>

			</div>
		</div>
	</div>
	<div class="footer-legal">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
					<div class="copyright">
						© Copyright <strong><span>IT BAPENDA RIAU</span></strong>. All Rights Reserved
					</div>

					<div class="credits">Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
					</div>

				</div>
				<div class="col-md-6">
					<div class="social-links mb-3 mb-lg-0 text-center text-md-end">
						<a href="https://www.facebook.com/people/Samsat-Simpang-Tiga/100081251957523/" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
						<a href="https://www.instagram.com/samsatsimpangtiga/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- FOOTER -->