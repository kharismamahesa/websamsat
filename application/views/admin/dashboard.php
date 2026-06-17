<div class="row">
    <!-- Stat Card: Total Berita Kantor -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Berita Anda</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php 
                                $id_uptup = $this->session->userdata('admin_id_uptup');
                                if ($id_uptup) {
                                    $this->db->where('kantor_id', $id_uptup);
                                }
                                $query = $this->db->get('samsat_berita');
                                echo $query->num_rows();
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-history mr-2"></i>Aktivitas Cepat</h6>
            </div>
            <div class="card-body">
                <p class="card-text text-muted">Gunakan menu navigasi di sebelah kiri untuk berpindah halaman dan mengelola portal berita website Samsat sesuai dengan unit kantor Anda.</p>
                <a href="<?= base_url('admin/berita') ?>" class="btn btn-success font-weight-bold d-inline-flex align-items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Kelola Berita Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
