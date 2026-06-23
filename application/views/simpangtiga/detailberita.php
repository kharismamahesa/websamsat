<section class="single-post-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 post-content" data-aos="fade-up">

				<?php
				$tgl = date_format(new DateTime($getberitabylink->created_date), "Y-m-d");
				$tanggal_berita = $this->lib_func->tgl_indo($tgl);
				$allowed = '<div><span><pre><p><br><hr><hgroup><h1><h2><h3><h4><h5><h6>
					<ul><ol><li><dl><dt><dd><strong><em><b><i><u>
					<img><a><abbr><address><blockquote><area><audio><video>
					<form><fieldset><label><input><textarea>
					<caption><table><tbody><td><tfoot><th><thead><tr>
					<iframe>';
				?>

				<!-- BERITA DETAIL -->
				<div class="single-post">
					<div class="post-meta"><span class="date"><?= $tanggal_berita ?></span></div>
					<h1 class="mb-5"><?= $getberitabylink->judul ?></h1>
				</div>
				<div class="single-post col-md-9">
					<figure class="my-4 text-center">
						<img src="<?= base_url('upload/berita/') . $getberitabylink->cover ?>" alt="" class="img-fluid w-75">
					</figure>
					<div style="font-family: Georgia !important;">
						<?= strip_tags($getberitabylink->berita, $allowed) ?>
					</div>
				</div>
				<!-- BERITA DETAIL -->


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