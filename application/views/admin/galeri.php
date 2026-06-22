<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Galeri Kegiatan</h6>
                <button class="btn btn-success btn-sm font-weight-bold d-flex align-items-center" id="btn-add-galeri">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Galeri
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table-galeri" class="table table-bordered table-striped table-hover w-100">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Cover/Foto Utama</th>
                                <th>Keterangan</th>
                                <th width="15%">Jumlah Foto</th>
                                <th width="15%">Tanggal Dibuat</th>
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

<!-- Modal Galeri -->
<div class="modal fade" id="modal-galeri" tabindex="-1" role="dialog" aria-labelledby="modal-galeri-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title font-weight-bold" id="modal-galeri-title">Form Galeri Kegiatan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-galeri" enctype="multipart/form-data">
                <input type="hidden" name="id" id="galeri-id">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="keterangan" class="font-weight-bold text-dark">Keterangan / Deskripsi Galeri <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Tulis keterangan atau deskripsi mengenai kegiatan ini..." required></textarea>
                    </div>

                    <div class="row">
                        <!-- Cover/Main Photo -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="foto" class="font-weight-bold text-dark">Foto Utama (Cover)</label>
                            <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">
                            <small class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP. Maks 2MB.</small>
                            <div id="preview-cover-container" class="mt-2 d-none">
                                <p class="small text-muted mb-1">Foto Utama Saat Ini:</p>
                                <img id="preview-cover" src="" width="120" class="img-thumbnail">
                            </div>
                        </div>

                        <!-- Additional Photos (Multi-Upload) -->
                        <div class="col-md-6 form-group mb-3">
                            <label for="additional_photos" class="font-weight-bold text-dark">Foto Tambahan (Maks 5 Foto)</label>
                            <input type="file" class="form-control-file" id="additional_photos" name="additional_photos[]" accept="image/*" multiple>
                            <small class="form-text text-muted">Bisa memilih beberapa foto sekaligus. Maks 2MB per foto.</small>
                            
                            <!-- Current Additional Photos (Will only show on Edit Mode) -->
                            <div id="current-photos-container" class="mt-3 d-none">
                                <p class="small font-weight-bold text-dark mb-2">Foto Tambahan Saat Ini (<span id="photo-count">0</span>/5):</p>
                                <div class="row no-gutters" id="current-photos-list">
                                    <!-- Photo items appended dynamically -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary font-weight-bold" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success font-weight-bold" id="btn-save-galeri">
                        <span class="spinner-border spinner-border-sm d-none mr-2" role="status" aria-hidden="true" id="save-spinner"></span>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Lihat Foto Galeri -->
<div class="modal fade" id="modal-view-photos" tabindex="-1" role="dialog" aria-labelledby="modal-view-photos-title" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <div>
                    <h5 class="modal-title font-weight-bold" id="modal-view-photos-title">
                        <i class="fas fa-images mr-2"></i>Foto Galeri
                    </h5>
                    <p class="mb-0 small" id="modal-view-photos-subtitle" style="opacity:.85"></p>
                </div>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Loading Spinner -->
                <div id="photos-loading" class="text-center py-5">
                    <div class="spinner-border text-success" role="status"></div>
                    <p class="mt-2 text-muted">Memuat foto...</p>
                </div>
                <!-- Photo Grid -->
                <div id="photos-grid" class="row" style="display:none;"></div>
                <!-- Empty State -->
                <div id="photos-empty" class="text-center py-5" style="display:none;">
                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Belum ada foto dalam galeri ini.</p>
                </div>
            </div>
            <div class="modal-footer">
                <small class="text-muted mr-auto" id="photos-count-label"></small>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Lightbox Overlay -->
<div id="lightbox-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,.92); z-index:9999; cursor:zoom-out; align-items:center; justify-content:center; flex-direction:column;">
    <button id="lightbox-prev" style="position:absolute; left:20px; top:50%; transform:translateY(-50%); background:rgba(255,255,255,.15); border:none; color:#fff; font-size:2rem; padding:8px 18px; border-radius:50px; cursor:pointer;">&lsaquo;</button>
    <img id="lightbox-img" src="" style="max-width:92vw; max-height:85vh; object-fit:contain; border-radius:8px; box-shadow:0 8px 40px rgba(0,0,0,.6);">
    <p id="lightbox-caption" style="color:#ddd; margin-top:14px; font-size:.9rem;"></p>
    <button id="lightbox-next" style="position:absolute; right:20px; top:50%; transform:translateY(-50%); background:rgba(255,255,255,.15); border:none; color:#fff; font-size:2rem; padding:8px 18px; border-radius:50px; cursor:pointer;">&rsaquo;</button>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Initialize DataTable
    const table = $('#table-galeri').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?= base_url('admin/galeri_datatable') ?>",
            "type": "GET"
        },
        "columns": [
            { 
                "data": null,
                "orderable": false,
                "searchable": false,
                "render": function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { "data": "foto", "orderable": false },
            { "data": "keterangan" },
            { "data": "total_foto", "orderable": false },
            { "data": "created_datetime" },
            { "data": "action", "orderable": false }
        ],
        "order": [[4, "desc"]], // Default order by created_datetime DESC
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Tidak ada data ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
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
    $('#btn-add-galeri').on('click', function() {
        isEditMode = false;
        $('#form-galeri')[0].reset();
        $('#galeri-id').val('');
        $('#preview-cover-container').addClass('d-none');
        $('#preview-cover').attr('src', '');
        $('#current-photos-container').addClass('d-none');
        $('#current-photos-list').empty();
        $('#modal-galeri-title').text('Tambah Galeri Kegiatan Baru');
        $('#modal-galeri').modal('show');
    });

    // Handle Edit Click
    $('#table-galeri').on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        isEditMode = true;

        $.ajax({
            url: "<?= base_url('admin/galeri_get') ?>",
            type: "GET",
            data: { id: id },
            dataType: "JSON",
            success: function(response) {
                if (response.status === 'success') {
                    const data = response.data;
                    const fotos = response.fotos;

                    $('#galeri-id').val(data.id);
                    $('#keterangan').val(data.keterangan);
                    $('#modal-galeri-title').text('Edit Galeri Kegiatan');

                    // Main Cover Photo
                    if (data.foto) {
                        $('#preview-cover').attr('src', "<?= base_url('upload/galeri/') ?>" + data.foto);
                        $('#preview-cover-container').removeClass('d-none');
                    } else {
                        $('#preview-cover-container').addClass('d-none');
                    }

                    // Additional Photos
                    $('#current-photos-list').empty();
                    $('#photo-count').text(fotos.length);
                    if (fotos.length > 0) {
                        fotos.forEach(function(item) {
                            const photoHtml = `
                                <div class="col-4 p-1 position-relative img-item-container" id="photo-item-${item.id}">
                                    <img src="<?= base_url('upload/galeri/') ?>${item.foto}" class="img-fluid img-thumbnail" style="height: 80px; width: 100%; object-fit: cover;">
                                    <button type="button" class="btn btn-danger btn-xs position-absolute btn-delete-photo" data-id="${item.id}" style="top: 5px; right: 5px; padding: 2px 5px; font-size: 10px;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            `;
                            $('#current-photos-list').append(photoHtml);
                        });
                        $('#current-photos-container').removeClass('d-none');
                    } else {
                        $('#current-photos-container').addClass('d-none');
                    }

                    $('#modal-galeri').modal('show');
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Gagal memuat data galeri.', 'error');
            }
        });
    });

    // Delete Individual Photo on Edit Mode
    $('#current-photos-list').on('click', '.btn-delete-photo', function() {
        const photoId = $(this).data('id');

        Swal.fire({
            title: 'Hapus foto ini?',
            text: "Foto akan dihapus permanen dari server!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('admin/galeri_delete_photo') ?>",
                    type: "POST",
                    data: { photo_id: photoId },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status === 'success') {
                            $(`#photo-item-${photoId}`).remove();
                            // Update count
                            const currentCount = parseInt($('#photo-count').text()) - 1;
                            $('#photo-count').text(currentCount);
                            if (currentCount === 0) {
                                $('#current-photos-container').addClass('d-none');
                            }
                            table.ajax.reload(null, false); // Reload main datatable to update counts
                            Swal.fire('Terhapus!', response.message, 'success');
                        } else {
                            Swal.fire('Error', response.message, 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Terjadi kesalahan sistem saat menghapus foto.', 'error');
                    }
                });
            }
        });
    });

    // Save/Update Form via AJAX
    $('#form-galeri').on('submit', function(e) {
        e.preventDefault();

        // Perform basic frontend validation on file counts for additional photos
        const filesInput = document.getElementById('additional_photos');
        if (filesInput.files.length > 5) {
            Swal.fire('Peringatan', 'Anda hanya dapat mengupload maksimal 5 foto tambahan sekaligus.', 'warning');
            return;
        }

        const formData = new FormData(this);
        const url = isEditMode ? "<?= base_url('admin/galeri_update') ?>" : "<?= base_url('admin/galeri_save') ?>";
        
        $('#btn-save-galeri').prop('disabled', true);
        $('#save-spinner').removeClass('d-none');

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(response) {
                $('#btn-save-galeri').prop('disabled', false);
                $('#save-spinner').addClass('d-none');

                if (response.status === 'success') {
                    Swal.fire('Berhasil', response.message, 'success');
                    $('#modal-galeri').modal('hide');
                    table.ajax.reload(null, false);
                } else if (response.status === 'validation_error') {
                    Swal.fire('Peringatan', response.errors, 'warning');
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            },
            error: function() {
                $('#btn-save-galeri').prop('disabled', false);
                $('#save-spinner').addClass('d-none');
                Swal.fire('Error', 'Terjadi kesalahan pada sistem.', 'error');
            }
        });
    });

    // Handle Delete Click
    $('#table-galeri').on('click', '.btn-delete', function() {
        const id = $(this).data('id');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Seluruh foto dalam galeri ini akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('admin/galeri_delete') ?>",
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

    // ============================================================
    // View Photos Modal
    // ============================================================
    let lightboxPhotos = [];
    let lightboxIndex  = 0;

    function openLightbox(photos, index) {
        lightboxPhotos = photos;
        lightboxIndex  = index;
        updateLightbox();
        $('#lightbox-overlay').css('display', 'flex').hide().fadeIn(200);
    }

    function updateLightbox() {
        const p = lightboxPhotos[lightboxIndex];
        $('#lightbox-img').attr('src', p.url);
        $('#lightbox-caption').text('Foto ' + (lightboxIndex + 1) + ' dari ' + lightboxPhotos.length);
        $('#lightbox-prev').toggle(lightboxPhotos.length > 1);
        $('#lightbox-next').toggle(lightboxPhotos.length > 1);
    }

    $('#lightbox-overlay').on('click', function(e) {
        if (e.target === this) {
            $(this).fadeOut(200);
        }
    });
    $('#lightbox-prev').on('click', function(e) {
        e.stopPropagation();
        lightboxIndex = (lightboxIndex - 1 + lightboxPhotos.length) % lightboxPhotos.length;
        updateLightbox();
    });
    $('#lightbox-next').on('click', function(e) {
        e.stopPropagation();
        lightboxIndex = (lightboxIndex + 1) % lightboxPhotos.length;
        updateLightbox();
    });
    $(document).on('keydown', function(e) {
        if ($('#lightbox-overlay').is(':visible')) {
            if (e.key === 'ArrowLeft')  { $('#lightbox-prev').trigger('click'); }
            if (e.key === 'ArrowRight') { $('#lightbox-next').trigger('click'); }
            if (e.key === 'Escape')     { $('#lightbox-overlay').fadeOut(200); }
        }
    });

    $('#table-galeri').on('click', '.btn-view-photos', function() {
        const id          = $(this).data('id');
        const keterangan  = $(this).data('keterangan');

        // Reset state
        $('#photos-grid').hide().empty();
        $('#photos-empty').hide();
        $('#photos-loading').show();
        $('#modal-view-photos-subtitle').text(keterangan);
        $('#photos-count-label').text('');
        $('#modal-view-photos').modal('show');

        $.ajax({
            url: "<?= base_url('admin/galeri_photos') ?>",
            type: "GET",
            data: { id: id },
            dataType: "JSON",
            success: function(res) {
                $('#photos-loading').hide();

                if (res.status !== 'success') {
                    Swal.fire('Error', res.message, 'error');
                    return;
                }

                // Build complete photo list: cover first, then additional
                const allPhotos = [];
                if (res.cover) {
                    allPhotos.push({ url: res.cover, label: 'Cover / Foto Utama' });
                }
                res.photos.forEach(function(p) {
                    allPhotos.push({ url: p.url, label: 'Foto Tambahan' });
                });

                if (allPhotos.length === 0) {
                    $('#photos-empty').show();
                    return;
                }

                $('#photos-count-label').text('Total: ' + allPhotos.length + ' foto');

                allPhotos.forEach(function(p, idx) {
                    const card = `
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <div class="card border-0 shadow-sm h-100" style="cursor:zoom-in;" data-idx="${idx}">
                                <div style="height:160px; overflow:hidden; border-radius:6px 6px 0 0;">
                                    <img src="${p.url}" class="w-100 h-100" style="object-fit:cover; transition:transform .3s;"
                                         onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                                </div>
                                <div class="card-body p-2 text-center">
                                    <span class="badge ${idx === 0 && res.cover ? 'badge-success' : 'badge-secondary'} small">${p.label}</span>
                                </div>
                            </div>
                        </div>`;
                    $('#photos-grid').append(card);
                });

                $('#photos-grid').show();

                // Open lightbox on card click
                $('#photos-grid').off('click', '.card').on('click', '.card', function() {
                    const idx = parseInt($(this).data('idx'));
                    openLightbox(allPhotos, idx);
                });
            },
            error: function() {
                $('#photos-loading').hide();
                Swal.fire('Error', 'Gagal memuat foto galeri.', 'error');
            }
        });
    });
});
</script>
