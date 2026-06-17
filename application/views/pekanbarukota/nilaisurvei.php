<div class="container-fluid bg-secondary py-5 bg-header" style="margin-bottom:30px;">
	<div class="row py-5">
		<div class="col-12 pt-lg-5 mt-lg-3 text-center">
			<h2 class="text-white animated zoomIn">Data Survei</h2>
			<a href="https://bapenda.riau.go.id/pelayanan/surveikirim?uptup=1" target="_blank" class="btn btn-success text-center"><i class="fa fa-list"></i> Silahkan Isi Survei Berikut</a>
		</div>

	</div>
</div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
	<div class="container py-5">
		<?php
		$nilaiikm = $this->model_samsat_survei->hitungIKM(1);
		$nilaiisak = $this->model_samsat_survei->hitungISAK(1);
		$jumlahresponden = $this->model_samsat_survei->getDataSurvei(1)->jumlah_respon;
		?>
		<div class="row mb-5">
			<div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
				<div class="bg-success shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
					<div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 100px; height: 100px;">
						<h1><i class="fa fa-check-square text-success"></i></h1>
					</div>
					<div class="ps-4">
						<h5 class="text-white mb-0">Indeks Survei Kepuasan Masyarakat</h5>
						<h1 class="text-white mb-0" style="font-size: 70px; font-family: 'Monomaniac One', sans-serif;" data-toggle="counter-up"><?= floor($nilaiikm) ?></h1>
					</div>
				</div>
			</div>
			<div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
				<div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
					<div class="bg-success d-flex align-items-center justify-content-center rounded mb-2" style="width: 100px; height: 100px;">
						<h1><i class="fa fa-check-square text-white"></i></h1>
					</div>
					<div class="ps-4">
						<h5 class="text-success mb-0">Indeks Survei Anti Korupsi</h5>
						<h1 class="text-success mb-0" style="font-size: 70px; font-family: 'Monomaniac One', sans-serif;" data-toggle="counter-up"><?= floor($nilaiisak) ?></h1>
					</div>
				</div>
			</div>
			<div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
				<div class="bg-success shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
					<div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 100px; height: 100px;">
						<h1><i class="fa fa-users text-success"></i></h1>
					</div>
					<div class="ps-4">
						<h5 class="text-white mb-0">Jumlah Responden</h5>
						<h1 class="text-white mb-0" style="font-size: 70px; font-family: 'Monomaniac One', sans-serif;" data-toggle="counter-up"><?= $jumlahresponden ?></h1>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-5">
			<div class="col-lg-6">
				<h5 class="text-dark mb-2 text-center">Berdasarkan Pendidikan</h5>
				<canvas id="chart1" style="width:100%;"></canvas>
			</div>
			<div class="col-lg-6 mb-5">
				<h5 class="text-dark mb-2 text-center">Berdasarkan Umur</h5>
				<canvas id="chart2" style="width:100%;"></canvas>
			</div>
			<div class="col-lg-6 mb-5">
				<h5 class="text-dark mb-2 text-center">Berdasarkan Jenis Kelamin</h5>
				<canvas id="chart3" style="width:100%;"></canvas>
			</div>
		</div>

	</div>
</div>
<!-- Blog End -->


<?php
$this->load->view('pekanbarukota/footer');
?>
<!-- https://coolors.co/palette/786b61-276e5a-1f2f48-293c58-0e203d-708296-eff0f3-354b6b-fefefe-15223c -->
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<?php
$umur1 = $this->model_samsat_survei->umur1(1)->row()->jumlah;
$umur2 = $this->model_samsat_survei->umur2(1)->row()->jumlah;
$umur3 = $this->model_samsat_survei->umur3(1)->row()->jumlah;
$umur4 = $this->model_samsat_survei->umur4(1)->row()->jumlah;
$umur5 = $this->model_samsat_survei->umur5(1)->row()->jumlah;
?>

<script>
	var cPendidikan = JSON.parse('<?php echo $datapendidikan; ?>');
	var cJenisKelamin = JSON.parse('<?php echo $datajeniskelamin; ?>');

	var barColors = [
		"#7F8DA9",
		"#FEC514",
		"#952FFE",
		"#8282F1",
		"#2599D4",
		"#2563D6",
		"#9524D4",
	];
	new Chart("chart1", {
		type: "bar",
		data: {
			labels: cPendidikan.pendidikan,
			datasets: [{
				backgroundColor: barColors,
				data: cPendidikan.jumlah
			}]
		},
		options: {
			legend: {
				display: false
			},
			animation: {
				duration: 5000,
			},
		}
	});

	new Chart("chart2", {
		type: "doughnut",
		data: {
			labels: ["1-25", "26-35", "36-45", "46-55", "Diatas 56"],
			datasets: [{
				backgroundColor: barColors,
				data: ['<?= $umur1 ?>', '<?= $umur2 ?>', '<?= $umur3 ?>', '<?= $umur4 ?>', '<?= $umur5 ?>']
			}]
		},
		options: {
			animation: {
				duration: 5000,
			},
		}
	});

	new Chart("chart3", {
		type: "pie",
		data: {
			labels: cJenisKelamin.jenis_kelamin,
			datasets: [{
				backgroundColor: barColors,
				data: cJenisKelamin.jumlah
			}]
		},
		options: {
			legend: {
				display: true
			},
			animation: {
				duration: 5000,
			},
		}
	});
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/wow/wow.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/easing/easing.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/waypoints/waypoints.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/counterup/counterup.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/startup/') ?>js/main.js"></script>



</html>