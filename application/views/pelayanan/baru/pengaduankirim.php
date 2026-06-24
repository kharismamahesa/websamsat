<link href="<?= base_url('/assets/flexstart/assets/css/sweetalert2.min.css') ?>" rel="stylesheet">

<style>
    .form-control-custom {
        padding: 15px;
        border-radius: 12px;
        border: 2px solid rgba(16, 185, 129, 0.2);
        background: #fdfdfd;
        transition: all 0.3s ease;
    }
    .form-control-custom:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.1);
        background: #fff;
    }
</style>

<section class="hero-section" style="padding: 140px 0 60px; min-height: auto;">
    <div class="container text-center" data-aos="fade-up">
        <h1 class="hero-title text-gradient d-inline-block">Formulir Pengaduan</h1>
        <p class="text-secondary fs-5 mt-3">Silakan lengkapi data diri dan pesan Anda di bawah ini.</p>
    </div>
</section>

<main id="main">
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <!-- Form Column -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm border" style="border-color: rgba(16,185,129,0.1) !important;">
                        <h4 class="fw-bold mb-4 text-center text-dark">
                            <?php
                            if ($datauptup->row()->Status == '') {
                                echo $datauptup->row()->NamaUPTUP;
                            } else {
                                echo  $datauptup->row()->Status . ' ' . $datauptup->row()->NamaUPTUP;
                            }
                            ?>
                        </h4>

                        <form id="pengaduanKirimForm" method="post" action="#">
                            <div class="row g-4">
                                <div class="col-md-12">
                                    <label class="fw-bold mb-2 text-secondary">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-custom" id="nama" name="nama" placeholder="Masukkan nama Anda">
                                </div>
                                <div class="col-md-6">
                                    <label class="fw-bold mb-2 text-secondary">Nomor Handphone / WA</label>
                                    <input type="number" class="form-control form-control-custom" id="nohp" name="nohp" placeholder="Contoh: 08123456789">
                                </div>
                                <div class="col-md-6">
                                    <label class="fw-bold mb-2 text-secondary">Email Valid</label>
                                    <input type="email" class="form-control form-control-custom" id="email" name="email" placeholder="Contoh: nama@email.com">
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-bold mb-2 text-secondary">Pesan / Aduan</label>
                                    <textarea class="form-control form-control-custom" id="pesan" name="pesan" rows="6" placeholder="Tuliskan pesan Anda secara jelas..." required></textarea>
                                </div>

                                <div class="col-12 mt-5 text-end">
                                    <button type="button" id="btnkirimpengaduan" class="btn btn-gradient btn-lg px-5">
                                        Kirim Pengaduan <i class="bi bi-send ms-2"></i>
                                    </button>
                                    <button class="btn btn-gradient btn-lg px-5" type="button" id="loadingnya" disabled style="display: none;">
                                        <span class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span>
                                        Memproses...
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
<script src="<?= base_url('/assets/flexstart/assets/js/sweetalert2.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#btnkirimpengaduan').click(function() {
            var uptup = "<?= $_GET['uptup'] ?? '' ?>";
            var jenis = "<?= $_GET['jenis'] ?? '' ?>";
            var nama = $("#nama").val().trim();
            var nohp = $("#nohp").val().trim();
            var email = $("#email").val().trim();
            var pesan = $("#pesan").val().trim();

            $('#btnkirimpengaduan').prop('disabled', true);
            $('#loadingnya').show();
            $('#btnkirimpengaduan').hide();

            Swal.fire({
                title: 'Silakan tunggu, data sedang diproses!',
                color: '#10b981',
                showConfirmButton: false,
                backdrop: `rgba(16,185,129,0.2)
                    url("<?= base_url('assets/gif/paperplane.gif') ?>")
                    left top
                    no-repeat`
            });

            var mailformat = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            
            if (uptup == '' || jenis == '') {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Terjadi kesalahan sistem.',
                    icon: 'error',
                    confirmButtonColor: '#ef4444',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "pengaduan";
                    }
                });
            } else if (nama == '' || nohp == '' || email == '' || pesan == '') {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Lengkapi seluruh data terlebih dahulu',
                    icon: 'warning',
                    confirmButtonText: 'Tutup',
                    confirmButtonColor: '#ef4444',
                });
                $('#loadingnya').hide();
                $('#btnkirimpengaduan').show();
                $('#btnkirimpengaduan').prop('disabled', false);
            } else if (!email.match(mailformat)) {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Silakan masukkan email yang valid dan aktif',
                    icon: 'warning',
                    confirmButtonText: 'Tutup',
                    confirmButtonColor: '#ef4444',
                });
                $('#loadingnya').hide();
                $('#btnkirimpengaduan').show();
                $('#btnkirimpengaduan').prop('disabled', false);
            } else {
                $.ajax({
                    url: "<?= base_url('api/simpanpengaduan') ?>",
                    method: "POST",
                    data: {
                        uptup: uptup,
                        jenis: jenis,
                        nama: nama,
                        nohp: nohp,
                        email: email,
                        pesan: pesan,
                    },
                    async: true,
                    dataType: 'JSON',
                    success: function(res) {
                        if (res.success == true) {
                            Swal.fire({
                                title: 'Sukses',
                                text: res.message,
                                icon: 'success',
                                confirmButtonColor: '#10b981',
                                confirmButtonText: 'Tutup'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = "pengaduan";
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: res.message,
                                icon: 'error',
                                confirmButtonText: 'Tutup',
                                confirmButtonColor: '#ef4444',
                            });
                        }
                        $('#loadingnya').hide();
                        $('#btnkirimpengaduan').show();
                        $('#btnkirimpengaduan').prop('disabled', false);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.fire({
                            title: 'Peringatan!',
                            text: 'Terjadi kesalahan pada server. Coba lagi nanti.',
                            icon: 'error',
                            confirmButtonText: 'Tutup',
                            confirmButtonColor: '#ef4444',
                        });
                        $('#loadingnya').hide();
                        $('#btnkirimpengaduan').show();
                        $('#btnkirimpengaduan').prop('disabled', false);
                    }
                });
            }
        });
    });
</script>
