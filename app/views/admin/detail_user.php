<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white py-3 border-0">
                    <h5 class="fw-bold mb-0">Detail Profil Pengguna</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="text-muted small d-block">Nama Lengkap</label>
                        <p class="fw-semibold fs-5"><?= $data['user']['nama_lengkap'] ?: 'Belum diisi'; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted small d-block">Username</label>
                        <p class="fw-semibold"><?= $data['user']['username']; ?></p>
                    </div>
                    <div class="mb-4">
                        <label class="text-muted small d-block">Role / Hak Akses</label>
                        <span class="badge bg-dark rounded-pill px-3"><?= strtoupper($data['user']['role']); ?></span>
                    </div>
                    <hr>
                    <a href="<?= BASEURL; ?>/AdminController/user" class="btn btn-secondary rounded-pill px-4">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>