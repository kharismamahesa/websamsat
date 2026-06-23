 <!DOCTYPE html>
 <html lang="en">

 <head>
 	<meta charset="utf-8">
 	<title><?= $title ?></title>
 	<meta content="width=device-width, initial-scale=1.0" name="viewport">
 	<meta content="Free HTML Templates" name="keywords">
 	<meta content="Free HTML Templates" name="description">

 	<link href="img/favicon.ico" rel="icon">
 	<link rel="preconnect" href="https://fonts.googleapis.com">
 	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css2?family=Monomaniac+One&display=swap" rel="stylesheet">
 	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
 	<link href="<?= base_url('assets/startup/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
 	<link href="<?= base_url('assets/startup/') ?>lib/animate/animate.min.css" rel="stylesheet">
 	<link href="<?= base_url('assets/startup/') ?>css/bootstrap.min.css" rel="stylesheet">
 	<link href="<?= base_url('assets/startup/') ?>css/style.css?v=<?= time() ?>" rel="stylesheet">

 	<style>
 		.bg-header {
 			background: linear-gradient(rgba(9, 30, 62, .7), rgba(9, 30, 62, .7)),
 				url('<?= base_url('assets/img/samsat-pekanbaru-kota.jpeg') ?>') center center no-repeat;
 			background-size: cover;
 		}
 	</style>
 </head>

 <body>
 	<!-- HEADER -->
 	<div class="container-fluid position-relative p-0">
 		<!-- NAVBAR -->
 		<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
 			<a href="<?= base_url('pekanbarukota') ?>" class="navbar-brand p-0">
 				<img src="<?= base_url() ?>assets/img/logobapenda.png" style="height: 80px;" />
 			</a>
 			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
 				<span class="fa fa-bars"></span>
 			</button>
 			<div class="collapse navbar-collapse" id="navbarCollapse">
 				<div class="navbar-nav ms-auto py-0">
 					<a href="<?= base_url('pekanbarukota') ?>" class="nav-item nav-link">Beranda</a>
 					<div class="nav-item dropdown">
 						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Berita</a>
 						<div class="dropdown-menu m-0">
 							<a href="<?= base_url('pekanbarukota/semuaberita') ?>" class="dropdown-item">Berita</a>
 							<a href="<?= base_url('pekanbarukota/semuavideo') ?>" class="dropdown-item">Video</a>
 						</div>
 					</div>
 					<div class="nav-item dropdown">
 						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>
 						<div class="dropdown-menu m-0">
 							<a href="<?= base_url('pekanbarukota/strukturorganisasi') ?>" class="dropdown-item">Struktur Organisasi</a>
 							<a href="<?= base_url('pekanbarukota/visimisi') ?>" class="dropdown-item">Visi dan Misi</a>
 						</div>
 					</div>
 					<div class="nav-item dropdown">
 						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi</a>
 						<div class="dropdown-menu m-0">
 							<a href="<?= base_url('pekanbarukota/realtime') ?>" class="dropdown-item">Realtime Penerimaan</a>
 							<a href="https://bapenda.riau.go.id/dashboard/layanan/infopajak" class="dropdown-item">Pajak Kendaraan Bermotor</a>
 							<a href="<?= base_url('pekanbarukota/datasurvei') ?>" class="dropdown-item">Data Survei</a>
 						</div>
 					</div>
 					<div class="nav-item dropdown">
 						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Unit Layanan</a>
 						<div class="dropdown-menu m-0">
 							<a href="<?= base_url('pekanbarukota/unit/samsattanjak') ?>" class="dropdown-item">Samsat Tanjak</a>
 							<a href="<?= base_url('pekanbarukota/unit/mpp') ?>" class="dropdown-item">Mall Pelayanan Publik</a>
 						</div>
 					</div>
 					<a href="<?= base_url('pekanbarukota/faq') ?>" class="nav-item nav-link">FAQ</a>
 				</div>
 				<a href="https://bapenda.riau.go.id/pelayanan/pengaduankirim?uptup=1&jenis=1" class="btn btn-success py-2 px-4 ms-3"><i class="fa fa-phone-alt"></i> Pengaduan</a>
 			</div>
 		</nav>