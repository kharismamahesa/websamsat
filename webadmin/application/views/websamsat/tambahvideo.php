<div class="container-fluid">

    <!-- Content Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Konten Video</h1>

    <!-- Content Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Form Tambah Konten Video</h6>
                </div>
                <div class="card-body">
                    <form name="form">
                        <div class="form-group">
                            <label>Judul Konten Video</label>
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Konten Video" maxlength="100">
                            <code class="text-xs">* Maximal 100 karakter</code>
                        </div>
                        <div class="form-group">
                            <label>Link URL Youtube</label>
                            <input type="text" name="url" id="url" class="form-control" placeholder="HZlYCvamxKM">
                            <code class="text-xs">contoh: https://www.youtube.com/watch?v=<span style="font-size: 16px; font-weight: bolder;">HZlYCvamxKM</span></code>
                        </div>

                        <button type="button" id="simpandata" name="simpandata" class="btn btn-success"><i class="fas fa-paper-plane"></i> Post Video</button>

                    </form>

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        $("#simpandata").click(function(e) {
            var judul = $('#judul').val();
            var url = $('#url').val();
            var form_data = new FormData();
            form_data.append('judul', judul);
            form_data.append('url', url);

            $.ajax({
                url: "<?= site_url('samsat/savevideo') ?>",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'POST',
                success: function(response) {
                    var respon = JSON.parse(response);
                    if (respon.success == true) {
                        swal({
                            title: 'Pesan',
                            text: respon.messages,
                            icon: "success",
                        }).then(function() {
                            window.location = "listvideo";
                        });
                    } else {
                        swal({
                            title: 'Pesan',
                            text: respon.messages,
                            icon: "error",
                        });
                    }
                },
                error: function(data) {
                    alert("Gagal memproses data");
                }
            });
        });
    });
</script>


</html>