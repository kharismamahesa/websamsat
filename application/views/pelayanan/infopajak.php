<section class="breadcrumbs">
	<div class="container">
		<h2>Informasi Pajak Kendaraan Bermotor</h2>
	</div>
</section>


<main id="main">

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">
			<div class="row gy-4">

				<div class="col-lg-6">
					<div class="php-email-form">
						<div class="row gy-4">

							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="text" class="form-control text-uppercase" id="aa" name="aa" placeholder="BM" value="BM" readonly>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<input type="text" class="form-control text-uppercase" id="ab" name="ab" placeholder="1234" value="">
							</div>
							<div class="col-md-3 col-sm-3 col-xs-3">
								<input type="text" class="form-control text-uppercase" id="ac" name="ac" placeholder="GC" value="">
							</div>
							<div class="col-md-12">
								<input type="text" class="form-control text-uppercase" id="norangka" name="norangka" placeholder="NOMOR RANGKA 5 DIGIT TERAKHIR" value="">
							</div>

							<div class="col-md-12">
								<button type="button" id="btncekdata" class="btn btn-success rounded-0">Cek Pajak <i class="bi bi-arrow-right"></i> </button>
							</div>

						</div>
					</div>
				</div>


				<div class="col-lg-6">
					<div class="bg-white" style="border-radius: 10px;" id="plat">
						<div class="alert text-white mt-3" role="alert">
							<div style="font-family: 'Varela Round', sans-serif;" class="text-center">
								<table class="table table-borderless text-white text-center" style="font-size: 35px; font-weight: bolder;">
									<tr>
										<td style="width: 25%;"><span id="plat_aa">BM</span></td>
										<td style="width: 50%;"><span id="plat_ab">9999</span></td>
										<td style="width: 25%;"><span id="plat_ac">XX</span></td>
									</tr>
								</table>
								<span style="font-size: 20px;"><strong><span id="plat_tgl_stnk">01.27</span></strong></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 p-2" style="background-color: #f9f9cd; border-radius: 10px;" id="detail_plat">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-sm table-bordered" style="font-size: 14px; border: #f9f9cd 1px solid;">
								<tr>
									<td width="40%"><b>Tahun Pembuatan</b></td>
									<td width="60%" class="" colspan="3"><span id="detail_tahun_pembuatan">Null</span></td>
								</tr>
								<tr>
									<td><b>Merk Kendaraan</b></td>
									<td colspan="3"><span id="detail_merk">Null</span></td>
								</tr>
								<tr>
									<td><b>Tipe Kendaraan</b></td>
									<td colspan="3"><span id="detail_tipe">Null</span></td>
								</tr>
								<tr>
									<td><b>Warna Kendaraan</b></td>
									<td colspan="3"><span id="detail_warna">Null</span></td>
								</tr>
								<tr>
									<td><b>Model Kendaraan</b></td>
									<td colspan="3"><span id="detail_model">Null</span></td>
								</tr>
								<tr>
									<td><b>Jenis Kendaraan</b></td>
									<td colspan="3"><span id="detail_jenis">Null</span></td>
								</tr>
								<tr>
									<td style="font-size: 20px;" class="bg-dark text-white"><b>Jatuh Tempo</b></td>
									<td colspan="3" style="font-size: 20px;" class="bg-dark text-white"><span id="detail_jatuhtempo">Null</span></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<table class="table table-sm table-bordered" style="font-size: 14px; border: #f9f9cd 3px solid;">
								<tr>
									<td colspan="2" class="bg-dark text-white text-center"><b>Estimasi Jumlah Yang Harus Dibayar</b></td>
									<td rowspan="2" class="text-center">
										<img src="<?= base_url('assets/samsat_korlantas.png') ?>" style="height: 45px; filter: grayscale()">
										<img src="<?= base_url('assets/samsat_riau.png') ?>" style="height: 45px; filter: grayscale()">
										<img src="<?= base_url('assets/samsat_jr.png') ?>" style="height: 45px; filter: grayscale()">
									</td>
								</tr>
								<tr>
									<td class="bg-dark text-white text-center"><b>Pokok</b></td>
									<td class="bg-dark text-white text-center"><b>Sanksi Adm.</b></td>
								</tr>
								<tr>
									<td width="35%" class="text-dark" style="text-align: right;"><span id="detail_pokokbbn">0</span></td>
									<td width="35%" class="text-dark" style="text-align: right;"><span id="detail_dendabbn">0</span></td>
									<td width="30%" class="bg-dark text-white">BBN-KB</td>
								</tr>
								<tr>
									<td class="text-dark" style="text-align: right;"><span id="detail_pokokpkb">0</span></td>
									<td class="text-dark" style="text-align: right;"><span id="detail_dendapkb">0</span></td>
									<td class="bg-dark text-white ">PKB</td>
								</tr>
								<tr>
									<td class="text-dark" style="text-align: right;"><span id="detail_pokokswdk">0</span></td>
									<td class="text-dark" style="text-align: right;"><span id="detail_dendaswdk">0</span></td>
									<td class="bg-dark text-white">SWDKLLJ</td>
								</tr>
								<tr>
									<td class="text-dark" style="text-align: right;"><span id="detail_pnbpstnk">0</span></td>
									<td class="text-dark" style="text-align: right;">0</td>
									<td class="bg-dark text-white">PNBP Pengesahan STNK</td>
								</tr>
								<tr>
									<td class="text-right"></td>
									<td class="text-right"></td>
									<td class="bg-dark text-white">&nbsp</td>
								</tr>
								<tr>
									<td class="bg-dark text-white" colspan="2" style="text-align: center; font-size: 20px;"><span id="detail_jumlahpokok"><b>0</b></span></td>
									<td class="bg-dark text-white" style="font-size: 20px;"><b>Jumlah</b></td>
								</tr>
							</table>
						</div>
						<div class="col-md-12 text-center">
							<span style="font-style: italic;">Nilai Estimasi merupakan Nilai PERKIRAAN dan dapat berubah sewaktu-waktu</span>
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
	function clear_data() {
		$("#plat_aa").html('');
		$("#plat_ab").html('');
		$("#plat_ac").html('');
		$("#detail_tahun_pembuatan").html('');
		$("#detail_merk").html('');
		$("#detail_tipe").html('');
		$("#detail_warna").html('');
		$("#detail_model").html('');
		$("#detail_jenis").html('');
		$("#detail_jatuhtempo").html('');
		$("#detail_pokokbbn").html('');
		$("#detail_dendabbn").html();
		$("#detail_pokokpkb").html();
		$("#detail_dendapkb").html();
		$("#detail_pokokswdk").html();
		$("#detail_dendaswdk").html();
		$("#detail_pnbpstnk").html();
		$("#detail_jumlahpokok").html('');
	}

	$(document).ready(function() {
		clear_data();
		$("#ab").focus();
		$('#plat').hide();
		$('#detail_plat').hide();

		$('#btncekdata').click(function() {
			var ab = $("#ab").val();
			var ac = $("#ac").val();
			var norangka = $("#norangka").val();
			if ((ab == '') || (ac == '') || (norangka == '')) {
				Swal.fire({
					title: 'Peringatan!',
					text: 'Silahkan lengkapi data terlebih dahulu',
					icon: 'error',
					confirmButtonText: 'OK',
					confirmButtonColor: '#E74C3C',
				});
			} else {
				var nopol = 'BM ' + ab + ' ' + ac;
				var jenis_transaksi = 1;
				var warnatnkb;
				$.ajax({
					url: "<?= base_url('api/pajaktahunan') ?>",
					method: "POST",
					data: {
						nopol: nopol,
						jenis_transaksi: jenis_transaksi,
						norangka: norangka,
					},
					async: true,
					dataType: 'JSON',
					success: function(res) {
						// console.log(res);
						clear_data();
						if (res.NoPolLengkap == null) {
							Swal.fire({
								title: 'Peringatan!',
								text: "Maaf Nopol tidak ditemukan dalam database Badan Pendapatan Provinsi Riau!",
								icon: 'error',
								confirmButtonText: 'OK',
								confirmButtonColor: '#E74C3C',
							});
							$('#detail_plat').hide();
							$('#plat').hide();
						} else {
							if (res.status_data == 1) {
								if (res.pokokpkb.length > 3) {
									const TglSTNK = res.TglSTNK1.split("-");
									$("#plat_aa").html('BM');
									$("#plat_ab").html(ab.toUpperCase());
									$("#plat_ac").html(ac.toUpperCase());
									$("#plat_tgl_stnk").html(TglSTNK[1] + ' . ' + String(TglSTNK[2]).slice(-2));
									if (res.WarnaTNKB == 'HITAM') {
										warnatnkb = 'bg-dark';
									} else if (res.WarnaTNKB == 'MERAH') {
										warnatnkb = 'bg-danger';
									} else if (res.WarnaTNKB == 'KUNING') {
										warnatnkb = 'bg-warning';
									} else {
										warnatnkb = 'bg-white text-dark';
									}
									$('#plat').removeClass();
									$('#plat').addClass(warnatnkb);
									$('#plat').show();

									$("#detail_tahun_pembuatan").html(res.TahunPembuatan);
									$("#detail_merk").html(res.Merk);
									$("#detail_tipe").html(res.Type);
									$("#detail_warna").html(res.Warna);
									$("#detail_model").html(res.NamaModelKendaraan);
									$("#detail_jenis").html(res.NamaJenis);
									$("#detail_jatuhtempo").html('<b>' + res.ket + '</b>');
									$("#detail_pokokbbn").html(res.pokokbbnnya);
									$("#detail_dendabbn").html(res.dendabbnnya);
									$("#detail_pokokpkb").html(res.pokokpkbnya);
									$("#detail_dendapkb").html(res.dendapkbnya);
									$("#detail_pokokswdk").html(res.pokokswdknya);
									$("#detail_dendaswdk").html(res.dendaswdknya);
									$("#detail_pnbpstnk").html(res.pnbptnkbnya);
									$("#detail_jumlahpokok").html('<b>' + res.Total + '</b>');
									$('#detail_plat').show();
								} else {
									Swal.fire({
										title: 'Peringatan!',
										text: "Maaf, NJKB untuk kendaraan " +
											res.NamaGolonganKendaraan + " Merk " +
											res.Merk + " " +
											res.Type +
											" Tahun " + res.TahunPembuatan + " Tidak ditemukan!",
										icon: 'error',
										confirmButtonText: 'OK',
										confirmButtonColor: '#E74C3C',
									});
									$('#detail_plat').hide();
									$('#plat').hide();
								}
								// console.log(res);
							} else {
								$('#detail_plat').hide();
								$('#plat').hide();
							}
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(xhr + ' | ' + thrownError);
					}
				});

			}
		});
	});
</script>

</body>

</html>