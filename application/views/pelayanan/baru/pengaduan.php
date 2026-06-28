<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="<?= base_url('/assets/flexstart/assets/css/select2-bootstrap4.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('/assets/flexstart/assets/css/sweetalert2.min.css') ?>" rel="stylesheet">

<style>
    .form-check-custom {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        border: 2px solid rgba(16, 185, 129, 0.2);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #fff;
    }
    .form-check-custom:hover {
        border-color: var(--primary-green);
        background: rgba(16, 185, 129, 0.05);
    }
    .form-check-input:checked + .form-check-label-text {
        font-weight: 700;
        color: var(--primary-green);
    }
    .select2-container--bootstrap4 .select2-selection--single {
        height: 50px !important;
        border-radius: 12px;
        border: 2px solid rgba(16, 185, 129, 0.2);
        display: flex;
        align-items: center;
        padding-left: 10px;
    }
    .select2-container--bootstrap4 .select2-selection--single:focus {
        border-color: var(--primary-green);
        box-shadow: none;
    }
    .select2-results__options {
        max-height: 200px !important;
        overflow-y: auto !important;
    }
    .select2-container--bootstrap4 .select2-dropdown {
        border-radius: 12px;
        border: 1px solid rgba(16, 185, 129, 0.2);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }
</style>

<section class="hero-section" style="padding: 140px 0 60px; min-height: auto;">
    <div class="container text-center" data-aos="fade-up">
        <h1 class="hero-title text-gradient d-inline-block">Sistem Pengaduan Masyarakat</h1>
        <p class="text-secondary fs-5 mt-3">Sampaikan keluhan, pengaduan, atau saran Anda demi pelayanan yang lebih baik.</p>
    </div>
</section>

<main id="main">
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <!-- Form Column -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm border" style="border-color: rgba(16,185,129,0.1) !important;">
                        <div class="text-center mb-5">
                            <img src="<?= base_url('assets/sipengat.png') ?>" class="img-fluid" style="max-height: 120px;" alt="Sipengat">
                        </div>

                        <form id="pengaduanForm" method="post" action="#">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-check-custom w-100" for="jenis1">
                                        <input class="form-check-input me-3" type="radio" name="jenis" id="jenis1" value="1" style="transform: scale(1.3);">
                                        <span class="form-check-label-text fs-5">Pengaduan</span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-check-custom w-100" for="jenis2">
                                        <input class="form-check-input me-3" type="radio" name="jenis" id="jenis2" value="2" style="transform: scale(1.3);">
                                        <span class="form-check-label-text fs-5">Saran</span>
                                    </label>
                                </div>

                                <div class="col-12 mt-4">
                                    <label class="fw-bold mb-2 text-secondary">Lokasi Kantor / UPT</label>
                                    <select class="form-control" id="uptup" name="uptup" style="width: 100%;">
                                        <option value="">-- SILAKAN PILIH KANTOR UPT / UP --</option>
                                        <?php
                                        foreach ($getuptup->result_array() as $datanya) {
                                            $kantornya = ($datanya['Status'] == '') ? $datanya['NamaUPTUP'] : $datanya['Status'] . ' ' . $datanya['NamaUPTUP'];
                                        ?>
                                            <option value="<?= $datanya['KodeWilayah'] ?>"><?= $kantornya ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-12 mt-5 text-end">
                                    <button type="button" id="btnpilihuptup" class="btn btn-gradient btn-lg px-5">
                                        Selanjutnya <i class="bi bi-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                    <div class="p-5 rounded-4 shadow-sm h-100 text-center" style="background: var(--bg-light); border-top: 6px solid var(--primary-green);">
                        <img src="<?= base_url('assets/riau.png') ?>" class="mb-4" width="80px" alt="Logo Riau">
                        <h3 class="fw-bold mb-3 text-dark">Badan Pendapatan Daerah<br>Provinsi Riau</h3>
                        <p class="text-secondary fs-5 mb-0">Jl. Jend. Sudirman No.6 Simpang Tiga<br>Pekanbaru</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php $this->load->view('pelayanan/baru/footer'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url('/assets/flexstart/assets/js/sweetalert2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#uptup').select2({
            theme: 'bootstrap4',
            placeholder: "-- SILAKAN PILIH KANTOR UPT / UP --"
        });

        $('#btnpilihuptup').click(function() {
            var uptup = $("#uptup").val();
            var jenis = $("input[name='jenis']:checked").val();
            if ((jenis == undefined)) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Silakan pilih jenis (Pengaduan / Saran) terlebih dahulu',
                    icon: 'warning',
                    confirmButtonText: 'Tutup',
                    confirmButtonColor: '#ef4444',
                });
            } else if (uptup == "") {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Silakan pilih lokasi kantor UPT / UP terlebih dahulu',
                    icon: 'warning',
                    confirmButtonText: 'Tutup',
                    confirmButtonColor: '#ef4444',
                });
            } else {
                window.location = "pengaduankirim?uptup=" + uptup + "&jenis=" + jenis;
            }
        });
    });
</script>
