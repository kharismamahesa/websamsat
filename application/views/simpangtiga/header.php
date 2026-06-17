<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?= $title ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="https://bapenda.riau.go.id/assets/images/favicon1.ico" rel="icon">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<!-- Vendor CSS Files -->
	<link href="<?= base_url('assets/zenblog/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="<?= base_url('assets/zenblog/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
	<link href="<?= base_url('assets/zenblog/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/zenblog/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/zenblog/') ?>vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS Files -->
	<link href="<?= base_url('assets/zenblog/') ?>css/variables.css" rel="stylesheet">
	<link href="<?= base_url('assets/zenblog/') ?>css/main.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Monomaniac+One&display=swap" rel="stylesheet">

	<!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="font-family: 'Nunito', sans-serif;">

	<!-- HEADER -->
	<header id="header" class="header d-flex align-items-center fixed-top">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

			<a href="<?= base_url('simpangtiga') ?>" class="logo d-flex align-items-center">
				<h3>Samsat Simpang Tiga</h3>
			</a>

			<nav id="navbar" class="navbar">
				<ul>
					<li><a href="<?= base_url('simpangtiga') ?>#berita">Berita</a></li>
					<li><a href="<?= base_url('simpangtiga/pengaduan') ?>">Pengaduan</a></li>
					<li><a href="<?= base_url('simpangtiga/faq') ?>">FAQ</a></li>
					<li class="dropdown"><a href="#"><span>Publikasi</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
						<ul>
							<!-- <li><a href="<?= base_url('simpangtiga/galeri') ?>">Galeri</a></li>
							<li><a href="<?= base_url('simpangtiga/dokumen') ?>">Dokumen</a></li> -->
							<li><a href="<?= base_url('simpangtiga/tarif') ?>">Tarif</a></li>
						</ul>
					</li>
					<li><a href="https://bapenda.riau.go.id/pelayanan/surveikirim?uptup=1992">Survei</a></li>
					<?php
					$getallunit = $this->model_samsat_unit->getAllUnitLinkNotNull(1992);
					if ($getallunit->num_rows() > 0) {
					?>
						<li class="dropdown"><a href="#"><span>Unit</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
							<ul>
								<?php
								foreach ($getallunit->result_array() as $dataunit) {
								?>
									<li><a href="<?= base_url('simpangtiga/u/' . $dataunit['link_unit']) ?>"><?= $dataunit['unit'] ?></a></li>
								<?php } ?>
							</ul>
						</li>
					<?php } ?>

					<li class="dropdown"><a href="#"><span>Realtime</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
						<ul>
							<li><a href="<?= base_url('simpangtiga/realtime/simpang-tiga') ?>">Penerimaan Simpang Tiga</a></li>
							<li><a href="<?= base_url('simpangtiga/realtime/samsat-keliling') ?>">Penerimaan Samsat Keliling</a></li>
							<li><a href="<?= base_url('simpangtiga/realtime/samsat-tanjak') ?>">Penerimaan Samsat Tanjak</a></li>
							<li><a href="<?= base_url('simpangtiga/realtime/drive-thru') ?>">Penerimaan Drive Thru</a></li>
						</ul>
					</li>
					<li><a href="https://sippn.menpan.go.id/instansi/157130/badan-pendapatan-daerah/upt-pengelolaan-pendapatan-simpang-tiga" target="_blank">SIPPN</a></li>
				</ul>
			</nav>

			<div class="position-relative">
				<a href="https://www.facebook.com/people/Samsat-Simpang-Tiga/100081251957523/" target="_blank" class="mx-2"><span class="bi-facebook"></span></a>
				<a href="https://www.instagram.com/samsatsimpangtiga/" target="_blank" class="mx-2"><span class="bi-instagram"></span></a>

				<i class="bi bi-list mobile-nav-toggle"></i>
			</div>

		</div>

	</header>
	<!-- HEADER -->

	<!-- MAIN -->
	<main id="main">