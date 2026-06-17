<div class="container-fluid bg-secondary py-5 bg-header" style="margin-bottom:30px;">
	<div class="row py-5">
		<div class="col-12 pt-lg-5 mt-lg-3 text-center">
			<span class="h5 text-white">Frequently Asked Questions</span>
			<h2 class="text-white animated zoomIn"><?= $getfaq->row()->kategori ?></h2>
		</div>
	</div>
</div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">

		<div class="accordion" id="accordionExample">

			<?php
			foreach ($getdetailfaq->result_array() as $datanya) {
			?>
				<div class="card">
					<div class="card-header" id="headingThree">
						<h2 class="mb-0">
							<button class="btn btn-link btn-block text-dark text-left collapsed" style="text-decoration: none; text-align: left;" type="button" data-toggle="collapse" data-target="#collapse<?= $datanya['id_faq'] ?>" aria-expanded="false" aria-controls="collapseThree">
								<?= $datanya['judul'] ?>
							</button>
						</h2>
					</div>
					<div id="collapse<?= $datanya['id_faq'] ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							<?= $datanya['informasi'] ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>
</div>
<!-- Blog End -->


<?php
$this->load->view('pekanbarukota/footer');
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</html>