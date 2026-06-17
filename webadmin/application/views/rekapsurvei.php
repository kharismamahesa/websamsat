<div class="container-fluid">

    <!-- Content Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rekapitulasi Survei</h1>

    <!-- Content Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Rekapitulasi Survei</h6>
                </div>
                <div class="card-body">

                    <form name="form" method="POST">
                        <div class="form-group">
                            <label>Durasi Tanggal</label>
                            <input type="text" name="range_tanggal" id="range_tanggal" class="form-control col-md-6" placeholder="Durasi Tanggal" readonly>
                        </div>
                        <button type="submit" id="prosesdata" name="prosesdata" class="btn btn-success"><i class="fas fa-paper-plane"></i> Proses Data</button>
                    </form>

                    <?php
                    // DEFINISI AWAL
                    $totalresponden = 0;
                    $tgl_awal = date("Y") . '-01-01';
                    $tgl_akhir = date("Y-m-d");


                    if (isset($_POST["prosesdata"])) {
                        $range = explode("-", ($_POST["range_tanggal"]));
                        $mulai = date("Y-m-d", strtotime($range[0]));
                        $selesai = date("Y-m-d", strtotime($range[1]));
                    } else {
                        $mulai = $tgl_awal;
                        $selesai = $tgl_akhir;
                    }
                    ?>

                    <div class="text-center text-lg">
                        <strong>
                            TANGGAL <?= $mulai . " s/d " . $selesai ?>
                        </strong>
                    </div>

                    <!-- BATAS -->

                    <div class="table-responsive mt-3">
                        <table class="table table-bordered text-xs" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">UPT / UP</th>
                                    <th class="text-center">JUMLAH RESPONDEN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($getalluptup->result_array() as $datanya) {
                                    $jumlahresponden = 0;
                                    $fil = "AND DATE(created_date) >= '$mulai'
                                        AND DATE(created_date) <= '$selesai' 
                                        AND kantor_pelayanan = '" . $datanya['kode_wilayah'] . "'";
                                    $q = $this->model_survei->getSurveiByFil($fil);
                                    $qjumlahresponden = $q->num_rows();
                                    if ($qjumlahresponden > 0) {
                                        $jumlahresponden = $qjumlahresponden;
                                    } else {
                                        $jumlahresponden = 0;
                                    }

                                    $totalresponden = $totalresponden + $jumlahresponden;

                                ?>
                                    <tr>
                                        <td><?= $datanya['kode_wilayah'] . ' - ' . $datanya['up'] ?></td>
                                        <td><?= $jumlahresponden ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>

                        </table>

                        <div class="text-lg mt-5">
                            <strong>
                                Total Responden <?= $totalresponden ?>
                            </strong>
                        </div>
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
    $(document).ready(function() {

        $('#range_tanggal').daterangepicker({
            "locale": {
                format: 'YYYY/MM/DD',
            },
            "ignoreReadonly": true,
            "allowInputToggle": true
        });

        $('#dataTable').DataTable({
            order: [
                [1, 'desc']
            ],
        });

    });
</script>


</html>