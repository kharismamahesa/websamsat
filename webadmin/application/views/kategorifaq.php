<div class="container-fluid">

    <!-- Content Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategori FAQ</h1>

    <!-- Content Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">List Kategori FAQ</h6>
                </div>
                <div class="card-body">
                    <button id="tambahkategori" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Kategori</button>
                    <button onclick="load_data()" class="btn btn-info"><i class="fa fa-retweet"></i> Loading Data</button>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
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

<div class="modal fade" id="tambahkategorifaq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus"></i> Kategori</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" hidden>
                    <input type="text" name="id_kategori" id="id_kategori" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Nama Kategori">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
                <button id="simpankategorifaq" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <button id="ubahkategorifaq" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    var table;
    $(document).ready(function() {
        table = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('dashboard/kategorifaq_data') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 3],
                "orderable": false,
            }, ],
        });

    });

    function clear_data() {
        $("#id_kategori").val('');
        $("#nama_kategori").val('');
        $("#keterangan").val('');
    }

    function load_data() {
        table.ajax.reload(null, false);
    }

    $("#tambahkategori").click(function(e) {
        clear_data();
        $(".modal-title").html("<i class='fa fa-plus'></i> Tambah Kategori");
        $("#tambahkategorifaq").modal('show');
        $("#simpankategorifaq").show();
        $("#ubahkategorifaq").hide();
    });

    $("#simpankategorifaq").click(function(e) {
        var nama_kategori = $('#nama_kategori').val();
        var keterangan = $('#keterangan').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('dashboard/savekategorifaq') ?>",
            dataType: "JSON",
            data: {
                nama_kategori: nama_kategori,
                keterangan: keterangan,
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
                $("#tambahkategorifaq").modal('hide');
            }
        });
    });

    $("#ubahkategorifaq").click(function(e) {
        var id_kategori = $('#id_kategori').val();
        var nama_kategori = $('#nama_kategori').val();
        var keterangan = $('#keterangan').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('dashboard/updatekategorifaq') ?>",
            dataType: "JSON",
            data: {
                id_kategori: id_kategori,
                nama_kategori: nama_kategori,
                keterangan: keterangan,
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
                $("#tambahkategorifaq").modal('hide');
            }
        });
    });

    function hapus_data(id) {
        swal({
            title: "Konfirmasi",
            text: "Apakah anda yakin ingin menghapus data ini?",
            icon: "warning",
            buttons: [
                'No',
                'Yes'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?= base_url('dashboard/deletekategorifaq') ?>",
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

    function ubah_data(id) {
        $("#simpankategorifaq").hide();
        $("#ubahkategorifaq").show();
        $.ajax({
            url: "<?= base_url('dashboard/getkategorifaq') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_kategori").val(response.id_kategori);
                $("#nama_kategori").val(response.nama_kategori);
                $("#keterangan").val(response.keterangan);
                $(".modal-title").html("<i class='fa fa-edit'></i> Ubah Kategori");
                $("#tambahkategorifaq").modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal memproses data");
                table.ajax.reload(null, false);
            }
        });
    }
</script>


</html>