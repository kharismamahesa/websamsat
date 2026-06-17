<div class="container-fluid">

    <!-- Content Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Data Realtime</h1>

    <!-- Content Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">List Data Realtime</h6>
                </div>
                <div class="card-body">
                    <button id="btntambahdata" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</button>
                    <button onclick="load_data()" class="btn btn-info"><i class="fa fa-retweet"></i> Loading Data</button>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Unit</th>
                                    <th>Total</th>
                                    <th>Kategori Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
</div>


<div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> FAQ</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" hidden>
                    <input type="text" name="id" id="id" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="text" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal Penerimaan">
                </div>

                <div class="form-group">
                    <label>Unit</label>
                    <input type="number" name="unit" id="unit" class="form-control" placeholder="Unit">
                </div>

                <div class="form-group">
                    <label>Total</label>
                    <input type="number" name="total" id="total" class="form-control" placeholder="Total Penerimaan">
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label>Kategori Unit</label>
                        <select name="kategori_unit" id="kategori_unit" class="form-control" style="width: 100%;">
                            <option value="">PILIH KATEGORI</option>
                            <option value="1">SAMSAT KELILING</option>
                            <option value="2">SAMSAT TANJAK</option>
                            <option value="3">DRIVE THRU</option>
                        </select>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <div class="form-group">
                        <label>Jenis Pajak</label>
                        <select name="jenis_pajak" id="jenis_pajak" class="form-control" style="width: 100%;">
                            <option value="">PILIH JENIS PAJAK</option>
                            <option value="1">PKB</option>
                        </select>
                    </div>
                </div> -->

            </div>
            <div class="modal-footer">
                <button id="btnbatal" class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
                <button id="btnsimpandata" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <button id="btnubahdata" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('websamsat/footer'); ?>
</body>


<script src="<?= base_url('assets/sbadmin2/vendor/') ?>jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sbadmin2/vendor/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>

<script src="<?= base_url('assets/sbadmin2/vendor/') ?>jquery-easing/jquery.easing.min.js"></script>

<!-- <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> -->
<script src="<?= base_url('assets/sbadmin2/js/') ?>sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/sbadmin2/vendor/datatables/') ?>jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin2/vendor/datatables/') ?>dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/summernote/summernote.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var table;
    $(document).ready(function() {
        $('#tanggal').datepicker({
            'format': 'yyyy-mm-dd',
        });

        table = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('samsat/realtime_data') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 4, 5],
                "orderable": false,
            }, ],
        });

    });

    function load_data() {
        table.ajax.reload(null, false);
    }

    function clear_data() {
        $("#id").val('');
        $("#tanggal").val('');
        $("#unit").val('');
        $("#total").val('');
        $("#kategori_unit").val('');
    }

    $("#btntambahdata").click(function(e) {
        clear_data();
        $(".modal-title").html("<i class='fa fa-plus'></i> Tambah Data Realtime");
        $("#modalform").modal('show');
        $("#btnsimpandata").show();
        $("#btnubahdata").hide();
    });

    $("#btnsimpandata").click(function(e) {
        var tanggal = $('#tanggal').val();
        var unit = $('#unit').val();
        var total = $('#total').val();
        var kategori_unit = $('#kategori_unit').val();

        $.ajax({
            type: "POST",
            url: "<?= base_url('samsat/saverealtime') ?>",
            dataType: "JSON",
            data: {
                tanggal: tanggal,
                unit: unit,
                total: total,
                kategori_unit: kategori_unit,
            },
            success: function(response) {
                if (response.success == true) {
                    swal({
                        title: 'Pesan',
                        text: response.messages,
                        icon: "success",
                    });
                    table.ajax.reload(null, false);
                    clear_data();
                    $("#modalform").modal('hide');
                } else {
                    swal({
                        title: 'Pesan',
                        text: response.messages,
                        icon: "error",
                    });
                    table.ajax.reload(null, false);
                }
            }
        });
    });

    $("#btnubahdata").click(function(e) {
        var id = $('#id').val();
        var tanggal = $('#tanggal').val();
        var unit = $('#unit').val();
        var total = $('#total').val();
        var kategori_unit = $('#kategori_unit').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('samsat/updaterealtime') ?>",
            dataType: "JSON",
            data: {
                id: id,
                tanggal: tanggal,
                unit: unit,
                total: total,
                kategori_unit: kategori_unit,
            },
            success: function(response) {
                if (response.success == true) {
                    swal({
                        title: 'Pesan',
                        text: response.messages,
                        icon: "success",
                    });
                    table.ajax.reload(null, false);
                    clear_data();
                } else {
                    swal({
                        title: 'Pesan',
                        text: response.messages,
                        icon: "error",
                    });
                    table.ajax.reload(null, false);
                }
                $("#modalform").modal('hide');
            }
        });
    });

    function ubah_data(id) {
        $("#btnsimpandata").hide();
        $("#btnubahdata").show();
        $.ajax({
            url: "<?= base_url('samsat/getrealtime') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(response) {
                $("#id").val(response.id);
                $("#tanggal").val(response.tanggal);
                $("#unit").val(response.unit);
                $("#total").val(response.total);
                $("#kategori_unit").val(response.kategori_unit);
                $("#kategori_unit").trigger('change');
                $(".modal-title").html("<i class='fa fa-edit'></i> Ubah Data Realtime");
                $("#modalform").modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal memproses data");
                table.ajax.reload(null, false);
            }
        });
    }

    function hapus_data(id) {
        swal({
            title: "Konfirmasi",
            text: "Apakah anda yakin ingin menghapus berita ini?",
            icon: "warning",
            buttons: [
                'No',
                'Yes'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?= site_url('samsat/deleterealtime') ?>",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                    },
                    success: function(response) {
                        if (response.success == true) {
                            swal({
                                title: 'Pesan',
                                text: response.messages,
                                icon: "success",
                            });
                            table.ajax.reload(null, false);
                        } else {
                            swal({
                                title: 'Pesan',
                                text: response.messages,
                                icon: "error",
                            });
                            table.ajax.reload(null, false);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Gagal memproses data");
                        table.ajax.reload(null, false);
                    }
                });
            }
        });
    }
</script>


</html>