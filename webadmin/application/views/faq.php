<div class="container-fluid">

    <!-- Content Heading -->
    <h1 class="h3 mb-2 text-gray-800">FAQ</h1>

    <!-- Content Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">List FAQ</h6>
                </div>
                <div class="card-body">
                    <button id="btntambahdata" class="btn btn-success"><i class="fas fa-plus"></i> Tambah FAQ</button>
                    <button id="btnloaddata" class="btn btn-info" onclick="load_data()"><i class="fa fa-retweet"></i> Loading Data</button>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>FAQ</th>
                                    <th>Informasi</th>
                                    <th>Kategori</th>
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
                    <input type="text" name="kode_helpdesk" id="kode_helpdesk" class="form-control">
                </div>
				<div class="form-group">
					<div class="form-group">
                        <label>Kategori FAQ</label>
                        <select name="id_kategori" id="id_kategori" class="form-control" style="width: 100%;">
							<option value="">PILIH KATEGORI</option>
							<?php
							foreach ($getallkategorifaq->result_array() as $datanya) {
							?>
                                <option value="<?= $datanya['id_kategori'] ?>"><?= $datanya['nama_kategori'] ?></option>
							<?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul FAQ">
                </div>                
				<div class="form-group">
					<label>Informasi</label>
					<textarea name="informasi" id="informasi" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnbatal" class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-ban"></i> Batal</button>
                <button id="btnsimpandata" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <button id="btnubahdata" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</button>
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
		// $('#kategori').select2({
			// dropdownParent: $('#modalform')
		// });
		$('#informasi').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
				['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
            ],
        });
        table = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('dashboard/faq_data') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 4],
                "orderable": false,
            }, ],
        });

    });

    function clear_data() {
        $("#kode_helpdesk").val('');
        $("#id_kategori").val('');
        $("#id_kategori").trigger('change');
        $("#judul").val('');
        $("#informasi").summernote('reset');
    }

    function load_data() {
        table.ajax.reload(null, false);
    }

    $("#btntambahdata").click(function(e) {
        clear_data();
        $(".modal-title").html("<i class='fa fa-plus'></i> Tambah FAQ");
        $("#modalform").modal('show');
        $("#btnsimpandata").show();
        $("#btnubahdata").hide();
    });

    $("#btnsimpandata").click(function(e) {
        var id_kategori = $('#id_kategori').val();
        var judul = $('#judul').val();
        var informasi = $('#informasi').val();
		
        $.ajax({
            type: "POST",
            url: "<?= base_url('dashboard/savefaq') ?>",
            dataType: "JSON",
            data: {
                id_kategori: id_kategori,
                judul: judul,
                informasi: informasi,
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

    $("#btnubahdata").click(function(e) {
        var kode_helpdesk = $('#kode_helpdesk').val();
        var id_kategori = $('#id_kategori').val();
        var judul = $('#judul').val();
        var informasi = $('#informasi').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('dashboard/updatefaq') ?>",
            dataType: "JSON",
            data: {
                kode_helpdesk: kode_helpdesk,
                id_kategori: id_kategori,
                judul: judul,
                informasi: informasi,
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
                    url: "<?= base_url('dashboard/deletefaq') ?>",
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
                        alert("Gagal memproses data" + textStatus);
                        table.ajax.reload(null, false);
                    }
                });
            }
        });
    }

    function ubah_data(id) {
        $("#btnsimpandata").hide();
        $("#btnubahdata").show();
        $.ajax({
            url: "<?= base_url('dashboard/getfaq') ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            success: function(response) {
                $("#kode_helpdesk").val(response.kode_helpdesk);
                $("#id_kategori").val(response.id_kategori);
                $("#id_kategori").trigger('change');
                $("#judul").val(response.judul);
                $("#informasi").summernote('code', response.informasi);
                $(".modal-title").html("<i class='fa fa-edit'></i> Ubah FAQ");
                $("#modalform").modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Gagal memproses data");
                table.ajax.reload(null, false);
            }
        });
    }
</script>


</html>