<section class="breadcrumbs">
    <div class="container">
        <h2>Nilai Indeks Survei Kepuasan Masyarakat</h2>
    </div>
</section>


<?php
$tahun = date('Y');
$mulai = $tahun . '-01-01';
$selesai = date('Y-m-d');
$fil = "AND DATE(created_date) >= '$mulai' AND DATE(created_date) <= '$selesai'";
// $fil = "";

$nilaiikm = $this->model_survei->hitungIKM($fil);
$nilaiisak = $this->model_survei->hitungISAK($fil);
$totalrespon = $this->model_survei->getDataSurvei($fil);
//========================================================================================
//PENDIDIKAN
$arr_datapendidikan = [];
$datapendidikan =  $this->model_survei->data_pendidikan($fil)->result();
foreach ($datapendidikan as $data) {
    $arr_datapendidikan['pendidikan'][] = $data->pendidikan;
    $arr_datapendidikan['jumlah'][] = (int) $data->jumlah;
}
$datapendidikan = json_encode($arr_datapendidikan);
//JENIS KELAMIN
$arr_datajeniskelamin = [];
$datajeniskelamin =  $this->model_survei->data_jk($fil)->result();
foreach ($datajeniskelamin as $data) {
    if ($data->jenis_kelamin == 'L') {
        $arr_datajeniskelamin['jenis_kelamin'][] = 'Laki - Laki';
        $arr_datajeniskelamin['jumlah'][] = (int) $data->jumlah;
        $jkL = (int) $data->jumlah;
    } else if ($data->jenis_kelamin == 'P') {
        $arr_datajeniskelamin['jenis_kelamin'][] = 'Perempuan';
        $arr_datajeniskelamin['jumlah'][] = (int) $data->jumlah;
        $jkP = (int) $data->jumlah;
    }
}
$arr_datajeniskelamin['jenis_kelamin'][] = 'Tidak diketahui';
$arr_datajeniskelamin['jumlah'][] = $totalrespon->jumlah_respon - ($jkL + $jkP);
$datajeniskelamin = json_encode($arr_datajeniskelamin);

$umur1 = $this->model_survei->umur1($fil)->jumlah;
$umur2 = $this->model_survei->umur2($fil)->jumlah;
$umur3 = $this->model_survei->umur3($fil)->jumlah;
$umur4 = $this->model_survei->umur4($fil)->jumlah;
$umur5 = $this->model_survei->umur5($fil)->jumlah;

if ($nilaiikm <= 50) {
    $iconikm = 'bi-emoji-angry';
} else if ($nilaiikm <= 60) {
    $iconikm = 'bi-emoji-frown';
} else if ($nilaiikm <= 70) {
    $iconikm = 'bi-emoji-expressionless';
} else if ($nilaiikm <= 85) {
    $iconikm = 'bi-emoji-smile';
} else if ($nilaiikm > 85) {
    $iconikm = 'bi-emoji-laughing';
}

if ($nilaiisak <= 50) {
    $iconisak = 'bi-emoji-angry';
} else if ($nilaiisak <= 60) {
    $iconisak = 'bi-emoji-frown';
} else if ($nilaiisak <= 70) {
    $iconisak = 'bi-emoji-expressionless';
} else if ($nilaiisak <= 85) {
    $iconisak = 'bi-emoji-smile';
} else if ($nilaiisak > 85) {
    $iconisak = 'bi-emoji-laughing';
}

?>

<main id="main">

    <div class="counts">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="count-box">
                        <h1><i class="bi <?= $iconikm ?>"></i></h1>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="<?= floor($nilaiikm) ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Indeks Survei Kepuasan Masyarakat</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="count-box">
                        <h1><i class="bi <?= $iconisak ?>"></i></h1>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="<?= floor($nilaiisak) ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Indeks Survei Anti Korupsi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="count-box">
                        <h1><i class="bi bi-people-fill"></i></h1>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="<?= $totalrespon->jumlah_respon ?>" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Total Reponden</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 entries" style="margin-top: 0;">
                    <div style="margin-bottom: 50px;">
                        <h4>Berdasarkan Pendidikan</h4>
                        <canvas id="chart1" style="width:100%;"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 entries" style="margin-top: 0;">
                    <div style="margin-bottom: 50px;">
                        <h4>Berdasarkan Umur</h4>
                        <canvas id="chart2" style="width:100%;"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 entries" style="margin-top: 0;">
                    <div style="margin-bottom: 50px;">
                        <h4>Berdasarkan Jenis Kelamin</h4>
                        <canvas id="chart3" style="width:100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php $this->load->view('pelayanan/footer'); ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>
    var cPendidikan = JSON.parse('<?= $datapendidikan ?>');
    var cJenisKelamin = JSON.parse('<?= $datajeniskelamin ?>');

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

<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/aos/aos.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url('/assets/flexstart') ?>/assets/js/main.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</body>

</html>