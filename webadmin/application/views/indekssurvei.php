<div class="container-fluid">

    <!-- Content Heading -->
    <h1 class="h3 mb-2 text-gray-800">Indeks Survei</h1>

    <!-- Content Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Indeks Survei</h6>
                </div>
                <div class="card-body">

                    <form name="form" method="POST">
                        <div class="form-group">
                            <label>Durasi Tanggal</label>
                            <input type="text" name="range_tanggal" id="range_tanggal" class="form-control col-md-6" placeholder="Durasi Tanggal" readonly>
                        </div>
                        <div class="form-group">
                            <label>Pilih UPT / UP</label>
                            <select name="uptup" id="uptup" class="form-control col-md-6" style="width: 100%;">
                                <option value="">SEMUA UPT / UP</option>
                                <?php
                                foreach ($getalluptup->result_array() as $datanya) {
                                ?>
                                    <option value="<?= $datanya['kode_wilayah'] ?>"><?= $datanya['kode_wilayah'] . ' - ' . $datanya['up'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" id="prosesdata" name="prosesdata" class="btn btn-success"><i class="fas fa-paper-plane"></i> Proses Data</button>
                        <a class="btn btn-info" href="<?= base_url('dashboard/indekssurvei') ?>"><i class="fa fa-retweet"></i> Reset Data</a>
                    </form>

                    <?php
                    // DEFINISI AWAL
                    // $tgl_awal = date("Y") - 1 . '-01-01';
                    $tgl_awal = '2022-01-01';
                    $tgl_akhir = date("Y-m-d");

                    if (isset($_POST["prosesdata"])) {
                        $range = explode("-", ($_POST["range_tanggal"]));
                        $mulai = date("Y-m-d", strtotime($range[0]));
                        $selesai = date("Y-m-d", strtotime($range[1]));

                        $uptup = $_POST["uptup"];
                        if ($uptup == '') {
                            // SEMUA UPT / UP
                            $uptupnya = "SEMUA UPT / UP";
                            $fil = "AND DATE(created_date) >= '$mulai' AND DATE(created_date) <= '$selesai'";
                            $datasurvei = $this->model_survei->getSurveiByFil($fil);

                            $datapendidikan = $this->model_survei->getDSPendidikan($fil);
                            $datakelamin = $this->model_survei->getDSKelamin($fil);
                            $datapekerjaan = $this->model_survei->getDSPekerjaan($fil);
                            // UMUR
                            $dataumur1sd25 = $this->model_survei->getDSUmur1SD25($fil);
                            $dataumur26sd35 = $this->model_survei->getDSUmur26SD35($fil);
                            $dataumur36d45 = $this->model_survei->getDSUmur36SD45($fil);
                            $dataumur46d55 = $this->model_survei->getDSUmur46SD55($fil);
                            $dataumur56Atas = $this->model_survei->getDSUmur56Atas($fil);
                        } else {
                            // BERDASARKAN UPT / UP
                            $quptup = $this->model_uptup->getKantorbyKode($uptup);
                            if ($quptup->num_rows() > 0) {
                                $uptupnya = $quptup->row()->up;
                            } else {
                                $uptupnya = "TIDAK TERDAFTAR";
                            }
                            $fil = "AND kantor_pelayanan = '$uptup' AND DATE(created_date) >= '$mulai' AND DATE(created_date) <= '$selesai'";
                            $datasurvei = $this->model_survei->getSurveiByFil($fil);

                            $datapendidikan = $this->model_survei->getDSPendidikan($fil);
                            $datakelamin = $this->model_survei->getDSKelamin($fil);
                            $datapekerjaan = $this->model_survei->getDSPekerjaan($fil);
                            // UMUR
                            $dataumur1sd25 = $this->model_survei->getDSUmur1SD25($fil);
                            $dataumur26sd35 = $this->model_survei->getDSUmur26SD35($fil);
                            $dataumur36d45 = $this->model_survei->getDSUmur36SD45($fil);
                            $dataumur46d55 = $this->model_survei->getDSUmur46SD55($fil);
                            $dataumur56Atas = $this->model_survei->getDSUmur56Atas($fil);
                        }
                    } else {
                        $uptupnya = "SEMUA UPT / UP";
                        $mulai = $tgl_awal;
                        $selesai = $tgl_akhir;
                        $fil = "AND DATE(created_date) >= '$mulai' AND DATE(created_date) <= '$selesai'";
                        $datasurvei = $this->model_survei->getSurveiByFil($fil);

                        $datapendidikan = $this->model_survei->getDSPendidikan($fil);
                        $datakelamin = $this->model_survei->getDSKelamin($fil);
                        $datapekerjaan = $this->model_survei->getDSPekerjaan($fil);
                        // UMUR
                        $dataumur1sd25 = $this->model_survei->getDSUmur1SD25($fil);
                        $dataumur26sd35 = $this->model_survei->getDSUmur26SD35($fil);
                        $dataumur36d45 = $this->model_survei->getDSUmur36SD45($fil);
                        $dataumur46d55 = $this->model_survei->getDSUmur46SD55($fil);
                        $dataumur56Atas = $this->model_survei->getDSUmur56Atas($fil);
                        $uptupnya = "SEMUA UPT / UP";
                    }

                    $jumlah = $datasurvei->num_rows();
                    // var_dump($datasurvei->result_array());
                    ?>

                    <div class="text-center text-lg">
                        <strong>
                            <?= $uptupnya ?>
                            <br>
                            TANGGAL <?= $mulai . " s/d " . $selesai ?>
                        </strong>
                    </div>

                    <button class="btn btn-success btn-sm float-right" onclick="downloadcsv()"><i class="fa fa-file-excel"></i> Download .csv</button>
                    <br>
                    <br>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-bordered text-xs" id="dataTable1" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">No</th>
                                    <th rowspan="2" class="text-center">Jenis Kelamin</th>
                                    <th rowspan="2" class="text-center">Pendidikan</th>
                                    <th rowspan="2" class="text-center">Usia</th>
                                    <th rowspan="2" class="text-center">Pekerjaan</th>
                                    <th colspan="10" class="text-center">Survei Kepuasan Masyarakat</th>
                                    <th colspan="6" class="text-center">Survei Anti Korupsi</th>
                                </tr>
                                <tr>
                                    <th class="text-center">U1</th>
                                    <th class="text-center">U2</th>
                                    <th class="text-center">U3</th>
                                    <th class="text-center">U4</th>
                                    <th class="text-center">U5</th>
                                    <th class="text-center">U6</th>
                                    <th class="text-center">U7</th>
                                    <th class="text-center">U8</th>
                                    <th class="text-center">U9</th>
                                    <th class="text-center"></th>

                                    <th class="text-center">U1</th>
                                    <th class="text-center">U2</th>
                                    <th class="text-center">U3</th>
                                    <th class="text-center">U4</th>
                                    <th class="text-center">U5</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $u1 = 0;
                                $u2 = 0;
                                $u3 = 0;
                                $u4 = 0;
                                $u5 = 0;
                                $u6 = 0;
                                $u7 = 0;
                                $u8 = 0;
                                $u9 = 0;
                                $u21 = 0;
                                $u22 = 0;
                                $u23 = 0;
                                $u24 = 0;
                                $u25 = 0;
                                if ($datasurvei->num_rows() < 1) {
                                ?>
                                    <tr>
                                        <td colspan="21" class="text-center"> Data kosong</td>
                                    </tr>
                                    <?php
                                } else {
                                    foreach ($datasurvei->result_array() as $datanya) {
                                        $u1 = $u1 + $datanya['tanya1'];
                                        $u2 = $u2 + $datanya['tanya2'];
                                        $u3 = $u3 + $datanya['tanya3'];
                                        $u4 = $u4 + $datanya['tanya4'];
                                        $u5 = $u5 + $datanya['tanya5'];
                                        $u6 = $u6 + $datanya['tanya6'];
                                        $u7 = $u7 + $datanya['tanya7'];
                                        $u8 = $u8 + $datanya['tanya8'];
                                        $u9 = $u9 + $datanya['tanya9'];
                                        $u21 = $u21 + $datanya['tanya21'];
                                        $u22 = $u22 + $datanya['tanya22'];
                                        $u23 = $u23 + $datanya['tanya23'];
                                        $u24 = $u24 + $datanya['tanya24'];
                                        $u25 = $u25 + $datanya['tanya25'];
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $datanya['jenis_kelamin'] ?></td>
                                            <td><?= $datanya['pendidikan'] ?></td>
                                            <td><?= $datanya['usia'] ?></td>
                                            <td><?= $datanya['pekerjaan'] ?></td>

                                            <td><?= $datanya['tanya1'] ?></td>
                                            <td><?= $datanya['tanya2'] ?></td>
                                            <td><?= $datanya['tanya3'] ?></td>
                                            <td><?= $datanya['tanya4'] ?></td>
                                            <td><?= $datanya['tanya5'] ?></td>
                                            <td><?= $datanya['tanya6'] ?></td>
                                            <td><?= $datanya['tanya7'] ?></td>
                                            <td><?= $datanya['tanya8'] ?></td>
                                            <td><?= $datanya['tanya9'] ?></td>
                                            <td></td>
                                            <td><?= $datanya['tanya21'] ?></td>
                                            <td><?= $datanya['tanya22'] ?></td>
                                            <td><?= $datanya['tanya23'] ?></td>
                                            <td><?= $datanya['tanya24'] ?></td>
                                            <td><?= $datanya['tanya25'] ?></td>
                                            <td></td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                            <?php
                            if ($jumlah > 0) {
                            ?>
                                <thead>
                                    <tr>
                                        <th colspan="5">TOTAL</th>
                                        <th><?= $u1 ?></th>
                                        <th><?= $u2 ?></th>
                                        <th><?= $u3 ?></th>
                                        <th><?= $u4 ?></th>
                                        <th><?= $u5 ?></th>
                                        <th><?= $u6 ?></th>
                                        <th><?= $u7 ?></th>
                                        <th><?= $u8 ?></th>
                                        <th><?= $u9 ?></th>
                                        <th></th>
                                        <th><?= $u21 ?></th>
                                        <th><?= $u22 ?></th>
                                        <th><?= $u23 ?></th>
                                        <th><?= $u24 ?></th>
                                        <th><?= $u25 ?></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5">NRR</th>
                                        <th><?= number_format(($u1 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u2 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u3 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u4 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u5 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u6 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u7 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u8 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u9 / $jumlah), 3, ",", ".") ?></th>
                                        <th></th>
                                        <th><?= number_format(($u21 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u22 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u23 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u24 / $jumlah), 3, ",", ".") ?></th>
                                        <th><?= number_format(($u25 / $jumlah), 3, ",", ".") ?></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5">NRR TERTIMBANG</th>
                                        <th><?= number_format($nrrtu1 = (($u1 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu2 = (($u2 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu3 = (($u3 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu4 = (($u4 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu5 = (($u5 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu6 = (($u6 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu7 = (($u7 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu8 = (($u8 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu9 = (($u9 / $jumlah) * 0.111), 3, ",", ".") ?></th>
                                        <th><?= number_format($tot_nrrtertimbang1 = ($nrrtu1 + $nrrtu2 + $nrrtu3 + $nrrtu4 + $nrrtu5 + $nrrtu6 + $nrrtu7 + $nrrtu8 + $nrrtu9), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu21 = (($u21 / $jumlah) * 0.2), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu22 = (($u22 / $jumlah) * 0.2), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu23 = (($u23 / $jumlah) * 0.2), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu24 = (($u24 / $jumlah) * 0.2), 3, ",", ".") ?></th>
                                        <th><?= number_format($nrrtu25 = (($u25 / $jumlah) * 0.2), 3, ",", ".") ?></th>
                                        <th><?= number_format($tot_nrrtertimbang2 = ($nrrtu21 + $nrrtu22 + $nrrtu23 + $nrrtu24 + $nrrtu25), 3, ",", ".") ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5"></th>
                                        <th colspan="9">INDEKS SURVEI KEPUASAN MASYARAKAT</th>
                                        <th><?= number_format(($tot_nrrtertimbang1 * 25), 2, ",", ".") ?></th>
                                        <th colspan="5">INDEKS SURVEI ANTI KORUPSI</th>
                                        <th><?= number_format(($tot_nrrtertimbang2 * 25), 2, ",", ".") ?></th>
                                    </tr>
                                </thead>
                            <?php } ?>
                        </table>
                    </div>
                    <br>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-bordered text-xs" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center" rowspan="3">Nilai Bobot</th>
                                    <th colspan="18" class="text-center">Survei Kepuasan Masyarakat</th>
                                    <th colspan="10" class="text-center">Survei Anti Korupsi</th>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="2">U1</th>
                                    <th class="text-center" colspan="2">U2</th>
                                    <th class="text-center" colspan="2">U3</th>
                                    <th class="text-center" colspan="2">U4</th>
                                    <th class="text-center" colspan="2">U5</th>
                                    <th class="text-center" colspan="2">U6</th>
                                    <th class="text-center" colspan="2">U7</th>
                                    <th class="text-center" colspan="2">U8</th>
                                    <th class="text-center" colspan="2">U9</th>
                                    <th class="text-center" colspan="2">U1</th>
                                    <th class="text-center" colspan="2">U2</th>
                                    <th class="text-center" colspan="2">U3</th>
                                    <th class="text-center" colspan="2">U4</th>
                                    <th class="text-center" colspan="2">U5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fil2 = '';

                                for ($i = 1; $i <= 4; $i++) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td class="text-center">
                                            <?= $tanya1 = $this->model_survei->getRespondenbyBobot('tanya1', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    $persen1 = ($tanya1 / $jumlah) * 100;
                                                    echo number_format(($persen1), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya2 = $this->model_survei->getRespondenbyBobot('tanya2', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya2 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya3 = $this->model_survei->getRespondenbyBobot('tanya3', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya3 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya4 = $this->model_survei->getRespondenbyBobot('tanya4', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya4 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya5 = $this->model_survei->getRespondenbyBobot('tanya5', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya5 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya6 = $this->model_survei->getRespondenbyBobot('tanya6', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya6 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya7 = $this->model_survei->getRespondenbyBobot('tanya7', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya7 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya8 = $this->model_survei->getRespondenbyBobot('tanya8', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya8 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya9 = $this->model_survei->getRespondenbyBobot('tanya9', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya9 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <!-- ====================================================== -->
                                        <td class="text-center">
                                            <?= $tanya21 = $this->model_survei->getRespondenbyBobot('tanya21', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya21 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya22 = $this->model_survei->getRespondenbyBobot('tanya22', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya22 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya23 = $this->model_survei->getRespondenbyBobot('tanya23', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya23 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya24 = $this->model_survei->getRespondenbyBobot('tanya24', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya24 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                        <td class="text-center">
                                            <?= $tanya25 = $this->model_survei->getRespondenbyBobot('tanya25', $i, $fil, $fil2)->row()->jumlah; ?>
                                        </td>
                                        <td class="text-center">
                                            <code>
                                                <?php
                                                if ($jumlah < 1) {
                                                    echo '0%';
                                                } else {
                                                    echo number_format((($tanya25 / $jumlah) * 100), 1, ",", ".") . ' %';
                                                }
                                                ?>
                                            </code>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <br>
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-bordered text-xs" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Pendidikan</th>
                                    <th class="text-center">Usia</th>
                                    <th class="text-center">Pekerjaan</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <table class="table">
                                            <?php
                                            $totalkelamin = 0;
                                            foreach ($datakelamin->result_array() as $datanya1) {
                                                echo "<tr><td>" . $datanya1['jenis_kelamin'] . "</td>";
                                                echo "<td>" . $datanya1['jumlah'] . "</td></tr>";
                                                $totalkelamin = $totalkelamin + $datanya1['jumlah'];
                                            }
                                            echo "<tr>
                                                <th>TOTAL</th>
                                                <th>" . $totalkelamin . "</th>
                                                </tr>";
                                            ?>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            <?php
                                            $totalpendidikan = 0;
                                            foreach ($datapendidikan->result_array() as $datanya2) {
                                                echo "<tr><td>" . $datanya2['pendidikan'] . "</td>";
                                                echo "<td>" . $datanya2['jumlah'] . "</td></tr>";
                                                $totalpendidikan = $totalpendidikan + $datanya2['jumlah'];
                                            }
                                            echo "<tr>
                                                <th>TOTAL</th>
                                                <th>" . $totalpendidikan . "</th>
                                                </tr>";
                                            ?>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            <?php
                                            // $dataumur1sd25 = $this->model_survei->getDSUmur1SD25($fil);
                                            // $dataumur26sd35 = $this->model_survei->getDSUmur26SD35($fil);
                                            // $dataumur36d45 = $this->model_survei->getDSUmur36SD45($fil);
                                            // $dataumur46d55 = $this->model_survei->getDSUmur46SD55($fil);
                                            // $dataumur56Atas = $this->model_survei->getDSUmur56Atas($fil);

                                            $totalusia = 0;
                                            echo "<tr><td>" . $dataumur1sd25->row()->usia . "</td>";
                                            echo "<td>" . $total1sd25 = $dataumur1sd25->row()->jumlah . "</td></tr>";

                                            echo "<tr><td>" . $dataumur26sd35->row()->usia . "</td>";
                                            echo "<td>" . $total26sd35 = $dataumur26sd35->row()->jumlah . "</td></tr>";

                                            echo "<tr><td>" . $dataumur36d45->row()->usia . "</td>";
                                            echo "<td>" . $total36sd45 = $dataumur36d45->row()->jumlah . "</td></tr>";

                                            echo "<tr><td>" . $dataumur46d55->row()->usia . "</td>";
                                            echo "<td>" . $total46sd55 = $dataumur46d55->row()->jumlah . "</td></tr>";

                                            echo "<tr><td>" . $dataumur56Atas->row()->usia . "</td>";
                                            echo "<td>" . $total56atas = $dataumur56Atas->row()->jumlah . "</td></tr>";

                                            $totalusia = (int)$total1sd25 + (int)$total26sd35 + (int)$total36sd45 + (int)$total46sd55 + (int)$total56atas;

                                            echo "<tr>
                                                <th>TOTAL</th>
                                                <th>" . $totalusia . "</th>
                                                </tr>";
                                            ?>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table">
                                            <?php
                                            $totalpekerjaan = 0;
                                            foreach ($datapekerjaan->result_array() as $datanya4) {
                                                echo "<tr><td>" . $datanya4['pekerjaan'] . "</td>";
                                                echo "<td>" . $datanya4['jumlah'] . "</td></tr>";
                                                $totalpekerjaan = $totalpekerjaan + $datanya4['jumlah'];
                                            }
                                            echo "<tr>
                                                <th>TOTAL</th>
                                                <th>" . $totalpekerjaan . "</th>
                                                </tr>";
                                            ?>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>

<?php $this->load->view('template/footer'); ?>
</body>

<script src="<?= base_url('assets/sbadmin2/vendor/') ?>jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sbadmin2/vendor/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sbadmin2/vendor/') ?>jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/sbadmin2/js/') ?>sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/sbadmin2/vendor/datatables/') ?>jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin2/vendor/datatables/') ?>dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/summernote/summernote.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    var table;
    $(document).ready(function() {

        // $('#id_kategori').select2();
        $('#range_tanggal').daterangepicker({
            "locale": {
                format: 'YYYY/MM/DD',
            },
            "ignoreReadonly": true,
            "allowInputToggle": true
        });

    });

    function downloadcsv(filename = 'Data Survei') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById('dataTable1');
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>


</html>