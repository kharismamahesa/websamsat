<!-- SIDEBAR -->
<div class="aside-block">
	<ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Berita Terakhir</button>
		</li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<!-- SIDEBAR POSTINGAN TERAKHIR -->
		<div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
			<?php
			if ($getallberita->num_rows() > 0) {
				$no = 1;
				foreach ($getallberita->result_array() as $datanya) {
					$nonya = $no++;
					$tgl = date_format(new DateTime($datanya['created_date']), "Y-m-d");
					$tanggal_berita = $this->lib_func->tgl_indo($tgl);
			?>
					<div class="post-entry-1 border-bottom">
						<div class="post-meta"><span class="date"><?= $tanggal_berita ?></span></div>
						<h2 class="mb-2"><a href="<?= base_url('simpangtiga/detailberita/') . $datanya['link'] ?>"><?= $datanya['judul'] ?></a></h2>
					</div>
			<?php }
			}
			?>


		</div>
		<!-- SIDEBAR POSTINGAN TERAKHIR -->
	</div>
</div>
<!-- SIDEBAR -->