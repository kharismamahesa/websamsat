<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Daftar Berita</h6>
                <button class="btn btn-success btn-sm font-weight-bold d-flex align-items-center" id="btn-add-berita">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Berita
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-berita" class="table table-bordered table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="15%">Cover</th>
                                <th>Judul</th>
                                <th width="15%">Penulis</th>
                                <th width="15%">Tanggal</th>
                                <th width="10%">Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- AJAX Data populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Berita -->
<div class="modal fade" id="modal-berita" tabindex="-1" role="dialog" aria-labelledby="modal-berita-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title font-weight-bold" id="modal-berita-title">Form Berita</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-berita" enctype="multipart/form-data">
                <input type="hidden" name="id" id="berita-id">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="judul" class="font-weight-bold text-dark">Judul Berita <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul berita..." required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="berita" class="font-weight-bold text-dark">Isi Berita <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="berita" name="berita" rows="8" placeholder="Tulis isi berita secara detail di sini..." required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="author" class="font-weight-bold text-dark">Penulis / Author <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="author" name="author" placeholder="Nama Penulis..." required>
                        </div>
                        <div class="col-md-6 form-group mb-3">
                            <label for="created_date" class="font-weight-bold text-dark">Tanggal Berita <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="created_date" name="created_date" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group mb-3">
                            <label for="cover" class="font-weight-bold text-dark">Cover Image</label>
                            <input type="file" class="form-control-file" id="cover" name="cover" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, PNG, JPEG, WEBP. Maks 2MB.</small>
                            <div id="preview-cover-container" class="mt-2 d-none">
                                <p class="small text-muted mb-1">Cover Saat Ini:</p>
                                <img id="preview-cover" src="" width="120" class="img-thumbnail">
                            </div>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="status" class="font-weight-bold text-dark">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="1">Aktif / Publikasikan</option>
                                <option value="0">Draft / Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success font-weight-bold" id="btn-save-berita">
                        <span class="spinner-border spinner-border-sm d-none mr-2" role="status" aria-hidden="true" id="save-spinner"></span>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Initialize DataTable
    const table = $('#table-berita').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('admin/berita_datatable') ?>",
            "type": "GET"
        },
        "columns": [
            { "data": "id" },
            { "data": "cover", "orderable": false },
            { "data": "judul" },
            { "data": "author" },
            { "data": "created_date" },
            { "data": "status" },
            { "data": "action", "orderable": false }
        ],
        "order": [[4, "desc"]], // Default order by created_date DESC
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Tidak ada data ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data tersedia",
            "infoFiltered": "(difilter dari _MAX_ total data)",
            "search": "Cari:",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        }
    });

    let isEditMode = false;

    // Reset Form & Show Add Modal
    $('#btn-add-berita').on('click', function() {
        isEditMode = false;
        $('#form-berita')[0].reset();
        $('#berita-id').val('');
        $('#author').val('<?= $this->session->userdata("admin_nama") ?>');
        $('#created_date').val(new Date().toISOString().substring(0, 10));
        $('#preview-cover-container').addClass('d-none');
        $('#preview-cover').attr('src', '');
        $('#modal-berita-title').text('Tambah Berita Baru');
        $('#modal-berita').modal('show');
    });

    // Handle Edit Click
    $('#table-berita').on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        isEditMode = true;

        $.ajax({
            url: "<?= base_url('admin/berita_get') ?>",
            type: "GET",
            data: { id: id },
            dataType: "JSON",
            success: function(response) {
                if (response.status === 'success') {
                    const data = response.data;
                    $('#berita-id').val(data.id);
                    $('#judul').val(data.judul);
                    $('#berita').val(data.berita);
                    $('#author').val(data.author);
                    if (data.created_date) {
                        $('#created_date').val(data.created_date.substring(0, 10));
                    }
                    $('#status').val(data.status);
                    $('#modal-berita-title').text('Edit Berita');

                    if (data.cover) {
                        $('#preview-cover').attr('src', "<?= base_url('upload/berita/') ?>" + data.cover);
                        $('#preview-cover-container').removeClass('d-none');
                    } else {
                        $('#preview-cover-container').addClass('d-none');
                    }

                    $('#modal-berita').modal('show');
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Gagal memuat data berita.', 'error');
            }
        });
    });

    // Save/Update Form via AJAX
    $('#form-berita').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const url = isEditMode ? "<?= base_url('admin/berita_update') ?>" : "<?= base_url('admin/berita_save') ?>";
        
        $('#btn-save-berita').prop('disabled', true);
        $('#save-spinner').removeClass('d-none');

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(response) {
                $('#btn-save-berita').prop('disabled', false);
                $('#save-spinner').addClass('d-none');

                if (response.status === 'success') {
                    Swal.fire('Berhasil', response.message, 'success');
                    $('#modal-berita').modal('hide');
                    table.ajax.reload(null, false); // Keep paging position
                } else if (response.status === 'validation_error') {
					Swal.fire('Peringatan', response.errors, 'warning');
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function() {
                $('#btn-save-berita').prop('disabled', false);
                $('#save-spinner').addClass('d-none');
                Swal.fire('Error', 'Terjadi kesalahan pada sistem.', 'error');
            }
        });
    });

    // Handle Delete Click
    $('#table-berita').on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Berita yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "<?= base_url('admin/berita_delete') ?>",
					type: "POST",
					data: { id: id },
					dataType: "JSON",
					success: function(response) {
						if (response.status === 'success') {
							Swal.fire('Terhapus!', response.message, 'success');
							table.ajax.reload(null, false);
						} else {
							Swal.fire('Error', response.message, 'error');
						}
					},
					error: function() {
						Swal.fire('Error', 'Terjadi kesalahan sistem saat menghapus data.', 'error');
					}
				});
			}
		});
	});
});
</script>
