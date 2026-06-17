<div class="container-fluid">

    <!-- Content Heading -->
    <h1 class="h3 mb-2 text-gray-800">List Konten Video</h1>

    <!-- Content Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">List Konten Video</h6>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('samsat/tambahvideo') ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Video</a>
                    <button onclick="load_data()" class="btn btn-info"><i class="fa fa-retweet"></i> Loading Data</button>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Berita</th>
                                    <th>URL</th>
                                    <th><i>Thumbnail</i></th>
                                    <th><i>Created Date</i></th>
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

<?php $this->load->view('websamsat/footer'); ?>
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
                "url": "<?= site_url('samsat/listvideo_data') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, ],
        });

    });

    function load_data() {
        table.ajax.reload(null, false);
    }

    function hapus_data(id) {
        // alert(id);
        swal({
            title: "Konfirmasi",
            text: "Apakah anda yakin ingin menghapus video ini?",
            icon: "warning",
            buttons: [
                'No',
                'Yes'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?= site_url('samsat/deletevideo') ?>",
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

    // function ubah_data(id) {
    //     alert('Sedang diproses pengembangan');
    // }
</script>


</html>