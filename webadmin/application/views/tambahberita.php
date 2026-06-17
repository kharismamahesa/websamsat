<div class="container-fluid">

    <!-- Content Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Berita</h1>

    <!-- Content Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Form Tambah Berita</h6>
                </div>
                <div class="card-body">
                    <form name="form">
                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul Berita">
                            <code class="text-xs">* Maximal 80 karakter</code>
                        </div>
                        <!-- <div class="form-group">
                            <label>Kategori Berita</label>
                            <select name="kategori" id="kategori" class="form-control col-lg-6" style="width: 100%;">
                                <option value="berita">Berita</option>
                                <option value="artikel">Artikel</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label>Cover Berita</label>
                            <input type="file" name="cover" id="cover" class="form-control col-lg-6" placeholder="Cover Berita">
                            <code class="text-xs">* Maximal ukuran file 2 mb</code>
                        </div>
                        <div class="form-group">
                            <label>Isi Berita</label>
                            <textarea name="isi" id="isi" class="form-control"></textarea>
                        </div>

                        <button type="button" id="simpanberita" name="simpanberita" class="btn btn-success"><i class="fas fa-paper-plane"></i> Post Berita</button>

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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        $('#exampleFormControlSelect1').select2();

        $('#isi').summernote({
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

        $("#simpanberita").click(function(e) {
            var judul = $('#judul').val();
            var kategori = $('#kategori').val();
            var cover = $('#cover').prop('files')[0];
            var isi = $('#isi').val();
            var form_data = new FormData();

            form_data.append('judul', judul);
            form_data.append('kategori', kategori);
            form_data.append('cover', cover);
            form_data.append('isi', isi);

            $.ajax({
                url: "<?= site_url('dashboard/saveberita') ?>",
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
                            window.location = "listberita";
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