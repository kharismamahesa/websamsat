<!-- Waktu Pelayanan -->
<section class="bg-light">
	<div class="container">
		<div class="row">
			<h5 class="text-center mt-3">Survei Kepuasan Masyarakat</h5>
			<h4 class="text-center">UPT Pengelolaan Pendapatan Pekanbaru Kota</h4>
			<!-- form  -->
			<hr>
			<form method="post" enctype="multipart/form-data" action="<?= base_url('page/simpan_survei') ?>">
				<div class="col-lg-12 col-ml-12">
					<!-- DATA PRIBADI -->
					<div class="row" id="menu_utama">
						<div class="col-lg-12">
							<div class="form-group">
								<h5>DATA RESPONDEN</h5>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg small">
									<div class="form-group">
										<label for="example-text-input" class="col-form-label">NO HP <code>(optional)</code></label>
										<input class="form-control form-control-sm" type="text" placeholder="085211223344" name="hp" id="hp">
									</div>

									<div class="form-group">
										<label for="example-text-input" class="col-form-label">E MAIL <code>(optional)</code></label>
										<input class="form-control form-control-sm" type="text" placeholder="email@gmail.com" name="email" id="email">
									</div>

									<div class="form-group">
										<label for="example-text-input" class="col-form-label">USIA</label>
										<input class="form-control form-control-sm" type="number" placeholder="28" name="usia" id="usia">
									</div>

									<div class="form-group">
										<label for="example-text-input" class="col-form-label">ALAMAT <code>(optional)</code></label>
										<input class="form-control form-control-sm" type="text" placeholder="JALAN PURWODADI, PANAM, PEKANBARU" name="alamat" id="alamat">
									</div>
									<div class="form-group">
										<div>
											<label for="example-text-input" class="col-form-label">JENIS KELAMIN</label>
										</div>
										<label class="alert alert-success small col-5" for="jk">
											<input type="radio" id="jk" name="jk" value="LAKI -LAKI">
											LAKI - LAKI</label>
										<label class="alert alert-success col-5" for="jk1">
											<input type="radio" id="jk1" name="jk" value="PEREMPUAN">
											PEREMPUAN</label>
									</div>
								</div>
								<div class="col-lg">

									<div class="form-group small">
										<div>
											<label for="example-text-input" class="col-form-label">PENDIDIKAN TERAKHIR</label>
										</div>
										<label class="alert alert-success col-5" for="pendidikan">
											<input type="radio" id="pendidikan" name="pendidikan" value="SD">
											SD</label>
										<label class="alert alert-success col-5" for="pendidikan1">
											<input type="radio" id="pendidikan1" name="pendidikan" value="SLTP/SMP">
											SLTP/SMP</label>
										<label class="alert alert-success col-5" for="pendidikan2">
											<input type="radio" id="pendidikan2" name="pendidikan" value="SLTA/SMA">
											SLTA/SMA</label>
										<label class="alert alert-success col-5" for="pendidikan3">
											<input type="radio" id="pendidikan3" name="pendidikan" value="D1/D2/D3">
											D1/D2/D3</label>
										<label class="alert alert-success col-5" for="pendidikan4">
											<input type="radio" id="pendidikan4" name="pendidikan" value="S1">
											S1</label>
										<label class="alert alert-success col-5" for="pendidikan5">
											<input type="radio" id="pendidikan5" name="pendidikan" value="S2/S3">
											S2/S3</label>
									</div>

									<div class="form-group small">
										<div>
											<label for="example-text-input" class="col-form-label">PEKERJAAN UTAMA</label>
										</div>
										<label class="alert alert-success col-5" for="pekerjaan">
											<input type="radio" id="pekerjaan" name="pekerjaan" value="PNS/TNI/POLRI">
											PNS/TNI/POLRI</label>
										<label class="alert alert-success col-5" for="pekerjaan1">
											<input type="radio" id="pekerjaan1" name="pekerjaan" value="PEGAWAI SWASTA">
											PEGAWAI SWASTA</label>
										<label class="alert alert-success col-5" for="pekerjaan2">
											<input type="radio" id="pekerjaan2" name="pekerjaan" value="WIRASWASTA">
											WIRASWASTA</label>
										<label class="alert alert-success col-5" for="pekerjaan3">
											<input type="radio" id="pekerjaan3" name="pekerjaan" value="MAHASISWA">
											MAHASISWA</label>
										<label class="alert alert-success col-5" for="pekerjaan4">
											<input type="radio" id="pekerjaan4" name="pekerjaan" value="LAINNYA">
											LAINNYA</label>
									</div>

									<div class="form-group">
										<label for="example-text-input" class="col-form-label">SUMBER INFORMASI <code>(TERKAIT PEMBEBASAN DENDA 1 FEB 2023 S/D 31 MEI 2023)</code> </label>
										<select class="form-control form-control-sm" type="text" placeholder="SUMBER" name="sumber" id="sumber">
											<option value="">Pilih Sumber</option>
											<option value="1">Website</option>
											<option value="2">Whatsapp</option>
											<option value="3">Instagram</option>
											<option value="4">Facebook</option>
											<option value="5">Twitter</option>
											<option value="6">Brosur</option>
											<option value="7">Lainnya</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12-lg text-right">
							<div class="form-group text-right">
								<button type="button" class="btn btn-flat btn-success " onclick="cek_satu()">MULAI</button>
							</div>
						</div>
					</div>
					<!-- DATA PRIBADI -->

					<!-- TANYA SATU -->
					<div class="row" id="tanya_satu">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>1. BAGAIMANA PENDAPAT SAUDARA TENTANG KESESUAIAN PERSYARATAN PELAYANAN DENGAN JENIS PELAYANANNYA?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t11">
									<input type="radio" id="t11" name="t1" value="1" onclick="cek_dua()">
									TIDAK SESUAI</label>
								<label class="alert alert-success col-5" for="t12">
									<input type="radio" id="t12" name="t1" value="2" onclick="cek_dua()">
									KURANG SESUAI</label>
								<label class="alert alert-success col-5" for="t13">
									<input type="radio" id="t13" name="t1" value="3" onclick="cek_dua()">
									SESUAI</label>
								<label class="alert alert-success col-5" for="t14">
									<input type="radio" id="t14" name="t1" value="4" onclick="cek_dua()">
									SANGAT SESUAI</label>
							</div>
						</div>
					</div>
					<!-- TANYA SATU -->

					<!-- TANYA DUA -->
					<div class="row" id="tanya_dua">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>2. BAGAIMANA PEMAHAMAN SAUDARA TENTANG KEMUDAHAN PROSEDUR PELAYANAN DI UNIT INI?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t21">
									<input type="radio" id="t21" name="t2" value="1" onclick="cek_tiga()">
									TIDAK MUDAH</label>
								<label class="alert alert-success col-5" for="t22">
									<input type="radio" id="t22" name="t2" value="2" onclick="cek_tiga()">
									KURANG MUDAH</label>
								<label class="alert alert-success col-5" for="t23">
									<input type="radio" id="t23" name="t2" value="3" onclick="cek_tiga()">
									MUDAH</label>
								<label class="alert alert-success col-5" for="t24">
									<input type="radio" id="t24" name="t2" value="4" onclick="cek_tiga()">
									SANGAT MUDAH</label>
							</div>
						</div>
					</div>
					<!-- TANYA DUA -->

					<!-- TANYA TIGA -->
					<div class="row" id="tanya_tiga">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>3. BAGAIMANA PENDAPAT SAUDARA TENTANG KECEPATAN WAKTU DALAM MEMBERIKAN PELAYANAN?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t31">
									<input type="radio" id="t31" name="t3" value="1" onclick="cek_empat()">
									TIDAK CEPAT</label>
								<label class="alert alert-success col-5" for="t32">
									<input type="radio" id="t32" name="t3" value="2" onclick="cek_empat()">
									KURANG CEPAT</label>
								<label class="alert alert-success col-5" for="t33">
									<input type="radio" id="t33" name="t3" value="3" onclick="cek_empat()">
									CEPAT</label>
								<label class="alert alert-success col-5" for="t34">
									<input type="radio" id="t34" name="t3" value="4" onclick="cek_empat()">
									SANGAT CEPAT</label>
							</div>
						</div>
					</div>
					<!-- TANYA TIGA -->

					<!-- TANYA EMPAT -->
					<div class="row" id="tanya_empat">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>4. BAGAIMANA PENDAPAT SAUDARA TENTANG KEWAJARAN BIAYA/TARIF DALAM PELAYANAN?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t41">
									<input type="radio" id="t41" name="t4" value="1" onclick="cek_lima()">
									SANGAT MAHAL</label>
								<label class="alert alert-success col-5" for="t42">
									<input type="radio" id="t42" name="t4" value="2" onclick="cek_lima()">
									CUKUP MAHAL</label>
								<label class="alert alert-success col-5" for="t43">
									<input type="radio" id="t43" name="t4" value="3" onclick="cek_lima()">
									MURAH</label>
								<label class="alert alert-success col-5" for="t44">
									<input type="radio" id="t44" name="t4" value="4" onclick="cek_lima()">
									GRATIS</label>
							</div>
						</div>
					</div>
					<!-- TANYA EMPAT -->

					<!-- TANYA LIMA -->
					<div class="row" id="tanya_lima">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>5. BAGAIMANA PENDAPAT SAUDARA TENTANG KESESUAIAN PRODUK LAYANAN DAN STANDAR PELAYANAN DENGAN HASIL YANG DIBERIKAN?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t51">
									<input type="radio" id="t51" name="t5" value="1" onclick="cek_enam()">
									TIDAK SESUAI</label>
								<label class="alert alert-success col-5" for="t52">
									<input type="radio" id="t52" name="t5" value="2" onclick="cek_enam()">
									KURANG SESUAI</label>
								<label class="alert alert-success col-5" for="t53">
									<input type="radio" id="t53" name="t5" value="3" onclick="cek_enam()">
									SESUAI</label>
								<label class="alert alert-success col-5" for="t54">
									<input type="radio" id="t54" name="t5" value="4" onclick="cek_enam()">
									SANGAT SESUAI</label>
							</div>
						</div>
					</div>
					<!-- TANYA LIMA -->

					<!-- TANYA ENAM -->
					<div class="row" id="tanya_enam">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>6. BAGAIMANA PENDAPAT SAUDARA TENTANG KOMPETENSI /KEMAMPUAN PETUGAS DALAM PELAYANAN?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t61">
									<input type="radio" id="t61" name="t6" value="1" onclick="cek_tujuh()">
									TIDAK KOMPETEN</label>
								<label class="alert alert-success col-5" for="t62">
									<input type="radio" id="t62" name="t6" value="2" onclick="cek_tujuh()">
									KURANG KOMPETEN</label>
								<label class="alert alert-success col-5" for="t63">
									<input type="radio" id="t63" name="t6" value="3" onclick="cek_tujuh()">
									KOMPETEN</label>
								<label class="alert alert-success col-5" for="t64">
									<input type="radio" id="t64" name="t6" value="4" onclick="cek_tujuh()">
									SANGAT KOMPETEN</label>
							</div>
						</div>
					</div>
					<!-- TANYA ENAM -->

					<!-- TANYA TUJUH -->
					<div class="row" id="tanya_tujuh">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>7. BAGAIMANA PENDAPAT SAUDARA TENTANG PERILAKU PETUGAS DALAM PELAYANAN TERKAIT KESOPANAN DAN KERAMAHAN?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t71">
									<input type="radio" id="t71" name="t7" value="1" onclick="cek_delapan()">
									TIDAK SOPAN DAN RAMAH</label>
								<label class="alert alert-success col-5" for="t72">
									<input type="radio" id="t72" name="t7" value="2" onclick="cek_delapan()">
									KURANG SOPAN DAN RAMAH</label>
								<label class="alert alert-success col-5" for="t73">
									<input type="radio" id="t73" name="t7" value="3" onclick="cek_delapan()">
									SOPAN DAN RAMAH</label>
								<label class="alert alert-success col-5" for="t74">
									<input type="radio" id="t74" name="t7" value="4" onclick="cek_delapan()">
									SANGAT SOPAN DAN RAMAH</label>
							</div>
						</div>
					</div>
					<!-- TANYA TUJUH -->

					<!-- TANYA DELAPAN -->
					<div class="row" id="tanya_delapan">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>8. BAGAIMANA PENDAPAT SAUDARA TENTANG KUALITAS SARANA DAN PRASARANA?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t81">
									<input type="radio" id="t81" name="t8" value="1" onclick="cek_sembilan()">
									BURUK</label>
								<label class="alert alert-success col-5" for="t82">
									<input type="radio" id="t82" name="t8" value="2" onclick="cek_sembilan()">
									CUKUP</label>
								<label class="alert alert-success col-5" for="t83">
									<input type="radio" id="t83" name="t8" value="3" onclick="cek_sembilan()">
									BAIK</label>
								<label class="alert alert-success col-5" for="t84">
									<input type="radio" id="t84" name="t8" value="4" onclick="cek_sembilan()">
									SANGAT BAIK</label>
							</div>
						</div>
					</div>
					<!-- TANYA DELAPAN -->

					<!-- TANYA SEMBILAN -->
					<div class="row" id="tanya_sembilan">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SKM] SURVEI KEPUASAN MASYARAKAT</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>9. BAGAIMANA PENDAPAT SAUDARA TENTANG PENANGANAN PENGADUAN PENGGUNA LAYANAN?</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t91">
									<input type="radio" id="t91" name="t9" value="1" onclick="cek_duasatu()">
									TIDAK ADA</label>
								<label class="alert alert-success col-5" for="t92">
									<input type="radio" id="t92" name="t9" value="2" onclick="cek_duasatu()">
									ADA TAPI TIDAK BERFUNGSI</label>
								<label class="alert alert-success col-5" for="t93">
									<input type="radio" id="t93" name="t9" value="3" onclick="cek_duasatu()">
									BERFUNGSI KURANG MAKSIMAL</label>
								<label class="alert alert-success col-5" for="t94">
									<input type="radio" id="t94" name="t9" value="4" onclick="cek_duasatu()">
									DIKELOLA DENGAN BAIK</label>
							</div>
						</div>
					</div>
					<!-- TANYA SEMBILAN -->

					<!-- TANYA DUASATU -->
					<div class="row" id="tanya_duasatu">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SAK] SURVEI ANTI KORUPSI</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>1. BAGAIMANA PENDAPAT SAUDARA BAHWA TIDAK ADA DISKRIMINASI PELAYANAN PADA UNIT KERJA INI</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t211">
									<input type="radio" id="t211" name="t21" value="1" onclick="cek_duadua()">
									SELALU</label>
								<label class="alert alert-success col-5" for="t212">
									<input type="radio" id="t212" name="t21" value="2" onclick="cek_duadua()">
									SERING</label>
								<label class="alert alert-success col-5" for="t213">
									<input type="radio" id="t213" name="t21" value="3" onclick="cek_duadua()">
									JARANG</label>
								<label class="alert alert-success col-5" for="t214">
									<input type="radio" id="t214" name="t21" value="4" onclick="cek_duadua()">
									TIDAK ADA</label>
							</div>
						</div>
					</div>
					<!-- TANYA DUASATU -->

					<!-- TANYA DUADUA -->
					<div class="row" id="tanya_duadua">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SAK] SURVEI ANTI KORUPSI</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>2. BAGAIMANA PENDAPAT SAUDARA BAHWA TIDAK ADA PELAYANAN DILUAR PROSEDUR / KECURANGAN PELAYANAN PADA UNIT LAYANAN INI.</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t221">
									<input type="radio" id="t221" name="t22" value="1" onclick="cek_duatiga()">
									SELALU</label>
								<label class="alert alert-success col-5" for="t222">
									<input type="radio" id="t222" name="t22" value="2" onclick="cek_duatiga()">
									SERING</label>
								<label class="alert alert-success col-5" for="t223">
									<input type="radio" id="t223" name="t22" value="3" onclick="cek_duatiga()">
									JARANG</label>
								<label class="alert alert-success col-5" for="t224">
									<input type="radio" id="t224" name="t22" value="4" onclick="cek_duatiga()">
									TIDAK ADA</label>
							</div>
						</div>
					</div>
					<!-- TANYA DUADUA -->

					<!-- TANYA DUATIGA -->
					<div class="row" id="tanya_duatiga">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SAK] SURVEI ANTI KORUPSI</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>3. BAGAIMANA PENDAPAT SAUDARA BAHWA TIDAK ADA PENERIMAAN IMBALAN UANG / BARANG / FASILITAS DILUAR KETENTUAN YANG BERLAKU PADA UNIT LAYANAN INI.</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t231">
									<input type="radio" id="t231" name="t23" value="1" onclick="cek_duaempat()">
									SELALU</label>
								<label class="alert alert-success col-5" for="t232">
									<input type="radio" id="t232" name="t23" value="2" onclick="cek_duaempat()">
									SERING</label>
								<label class="alert alert-success col-5" for="t233">
									<input type="radio" id="t233" name="t23" value="3" onclick="cek_duaempat()">
									JARANG</label>
								<label class="alert alert-success col-5" for="t234">
									<input type="radio" id="t234" name="t23" value="4" onclick="cek_duaempat()">
									TIDAK ADA</label>
							</div>
						</div>
					</div>
					<!-- TANYA DUATIGA -->

					<!-- TANYA DUAEMPAT -->
					<div class="row" id="tanya_duaempat">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SAK] SURVEI ANTI KORUPSI</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>4. BAGAIMANA PENDAPAT SAUDARA BAHWA TIDAK ADA PUNGUTAN LIAR (PUNGLI) PADA UNIT LAYANAN INI.</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t241">
									<input type="radio" id="t241" name="t24" value="1" onclick="cek_dualima()">
									SELALU</label>
								<label class="alert alert-success col-5" for="t242">
									<input type="radio" id="t242" name="t24" value="2" onclick="cek_dualima()">
									SERING</label>
								<label class="alert alert-success col-5" for="t243">
									<input type="radio" id="t243" name="t24" value="3" onclick="cek_dualima()">
									JARANG</label>
								<label class="alert alert-success col-5" for="t244">
									<input type="radio" id="t244" name="t24" value="4" onclick="cek_dualima()">
									TIDAK ADA</label>
							</div>
						</div>
					</div>
					<!-- TANYA DUAEMPAT -->

					<!-- TANYA DUALIMA -->
					<div class="row" id="tanya_dualima">
						<div class="col-12 mt-12">
							<div class="form-group">
								<div>
									<h3>[SAK] SURVEI ANTI KORUPSI</h3>
									<label for="example-text-input" class="col-form-label">
										<h5>5. BAGAIMANA PENDAPAT SAUDARA BAHWA TIDAK ADA PERCALOAN / PERANTARA TIDAK RESMI PADA UNIT LAYANAN INI.</h5>
									</label>
								</div>
								<label class="alert alert-success col-5" for="t251" onclick="">
									<input type="radio" id="t251" name="t25" value="1">
									SELALU</label>
								<label class="alert alert-success col-5" for="t252" onclick="">
									<input type="radio" id="t252" name="t25" value="2">
									SERING</label>
								<label class="alert alert-success col-5" for="t253" onclick="">
									<input type="radio" id="t253" name="t25" value="3">
									JARANG</label>
								<label class="alert alert-success col-5" for="t254" onclick="">
									<input type="radio" id="t254" name="t25" value="4">
									TIDAK ADA</label>
							</div>
						</div>
						<div class="card-body">
							<button type="submit" class="btn btn-flat btn-success btn-md mb-3" onclick="simpan()">SIMPAN DATA</button>
						</div>
					</div>
					<!-- TANYA DUALIMA -->
				</div>
			</form>
			<!-- form  -->
			<hr class="mt-5">
		</div>
	</div>
</section>

<?php
$this->load->view('websamsat/pekanbarukota/footer');
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/bs_landingpage/') ?>js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>


<script>
	$(document).ready(function() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeIn("fast");
	});

	function cek_utama() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeIn("fast");
	}

	function cek_satu() {
		var hp = $('#hp').val();
		var email = $('#email').val();
		var alamat = $('#alamat').val();
		var usia = $('#usia').val();
		var sumber = $('#sumber').val();

		var jk = document.getElementsByName('jk');
		var pendidikan = document.getElementsByName('pendidikan');
		var pekerjaan = document.getElementsByName('pekerjaan');
		var jk_val = false;
		var pendidikan_val = false;
		var pekerjaan_val = false;

		for (var i = 0; i < jk.length; i++) {
			if (jk[i].checked == true) {
				jk_val = true;
			}
		}
		for (var i = 0; i < pendidikan.length; i++) {
			if (pendidikan[i].checked == true) {
				pendidikan_val = true;
			}
		}
		for (var i = 0; i < pekerjaan.length; i++) {
			if (pekerjaan[i].checked == true) {
				pekerjaan_val = true;
			}
		}

		if (usia == '') {
			alert("Isi usia terlebih dahulu");
		} else {
			if (!jk_val) {
				alert("Pilih jenis kelamin terlebih dahulu");
			} else {
				if (!pendidikan_val) {
					alert("Pilih pendidikan terlebih dahulu");
				} else {
					if (!pekerjaan_val) {
						alert("Pilih pekerjaan terlebih dahulu");
					} else {
						if (sumber == '') {
							alert("Pilih sumber informasi terkait pembebasan denda terlebih dahulu");
						} else {
							$('#tanya_satu').fadeIn("fast");
							$('#tanya_dua').fadeOut("fast");
							$('#tanya_tiga').fadeOut("fast");
							$('#tanya_empat').fadeOut("fast");
							$('#tanya_lima').fadeOut("fast");
							$('#tanya_enam').fadeOut("fast");
							$('#tanya_tujuh').fadeOut("fast");
							$('#tanya_delapan').fadeOut("fast");
							$('#tanya_sembilan').fadeOut("fast");
							$('#tanya_duasatu').fadeOut("fast");
							$('#tanya_duadua').fadeOut("fast");
							$('#tanya_duatiga').fadeOut("fast");
							$('#tanya_duaempat').fadeOut("fast");
							$('#tanya_dualima').fadeOut("fast");
							$('#menu_utama').fadeOut("fast");
						}
					}
				}
			}
		}
	}

	function cek_dua() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeIn("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");
	}

	function cek_tiga() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeIn("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");
	}

	function cek_empat() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeIn("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");

	}

	function cek_lima() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeIn("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");

	}

	function cek_enam() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeIn("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");

	}

	function cek_tujuh() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeIn("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");

	}

	function cek_delapan() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeIn("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");

	}

	function cek_sembilan() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeIn("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");

	}

	function cek_duasatu() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeIn("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");
	}

	function cek_duadua() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeIn("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");
	}

	function cek_duatiga() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeIn("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");
	}

	function cek_duaempat() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeIn("fast");
		$('#tanya_dualima').fadeOut("fast");
		$('#menu_utama').fadeOut("fast");
	}

	function cek_dualima() {
		$('#tanya_satu').fadeOut("fast");
		$('#tanya_dua').fadeOut("fast");
		$('#tanya_tiga').fadeOut("fast");
		$('#tanya_empat').fadeOut("fast");
		$('#tanya_lima').fadeOut("fast");
		$('#tanya_enam').fadeOut("fast");
		$('#tanya_tujuh').fadeOut("fast");
		$('#tanya_delapan').fadeOut("fast");
		$('#tanya_sembilan').fadeOut("fast");
		$('#tanya_duasatu').fadeOut("fast");
		$('#tanya_duadua').fadeOut("fast");
		$('#tanya_duatiga').fadeOut("fast");
		$('#tanya_duaempat').fadeOut("fast");
		$('#tanya_dualima').fadeIn("fast");
		$('#menu_utama').fadeOut("fast");
	}
</script>

</html>