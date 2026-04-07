<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        body { background-color: #f4f7f6; }
        .sidebar { background-color: #1a3a5f; min-height: 100vh; color: white; position: fixed; }
        .sidebar a { color: rgba(255,255,255,0.7); text-decoration: none; padding: 15px 25px; display: block; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.1); color: white; border-left: 5px solid #0d6efd; }
        .main-content { margin-left: 16.666667%; padding: 40px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .table thead { background-color: #f8f9fa; border-top: 2px solid #dee2e6; }
        .badge-category { background-color: #e7f1ff; color: #0d6efd; border-radius: 20px; padding: 5px 15px; font-weight: 500; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <div class="p-4 mb-3">
                <h4 class="fw-bold"><i class="fas fa-guitar me-2"></i> MusicRent</h4>
            </div>
            <nav>
                <a href="<?= BASEURL; ?>/AdminController" class="active"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="<?= BASEURL; ?>/AdminController/user"><i class="fas fa-users me-2"></i> Manajemen User</a>
                <a href="<?= BASEURL; ?>/AdminController/peminjaman" class="<?= ($data['judul'] == 'Daftar Peminjaman') ? 'active' : ''; ?>">
                    <i class="fas fa-history me-2"></i> Peminjaman
                </a>
                <a href="<?= BASEURL; ?>/AdminController/log"><i class="fas fa-list me-2"></i> Log Aktivitas</a>
                <div class="mt-5">
                    <a href="<?= BASEURL; ?>/AuthController/logout" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
                </div>
            </nav>
        </div>

        <div class="col-md-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark">Daftar Inventaris Alat</h2>
                    <p class="text-muted">Pantau dan kelola stok alat musik Anda di sini.</p>
                </div>
                <a href="<?= BASEURL; ?>/AdminController/tambah_view" class="btn btn-primary px-4 py-2 shadow-sm">
                    <i class="fas fa-plus me-2"></i> Tambah Alat Baru
                </a>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card p-3 d-flex flex-row align-items-center">
                        <div class="bg-primary text-white rounded-circle p-3 me-3">
                            <i class="fas fa-boxes fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="mb-0 fw-bold"><?= count($data['alat']); ?></h5>
                            <small class="text-muted">Total Jenis Alat</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4 py-3 text-muted">No</th>
                                    <th class="py-3 text-muted">Nama Alat</th>
                                    <th class="py-3 text-muted">Kategori</th>
                                    <th class="py-3 text-muted text-center">Stok</th>
                                    <th class="py-3 text-muted text-end pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($data['alat'] as $alat) : ?>
                                <tr>
                                    <td class="ps-4 fw-bold"><?= $i++; ?></td>
                                    <td class="fw-semibold text-dark"><?= $alat['nama_alat']; ?></td>
                                    <td><span class="badge-category"><?= $alat['nama_kategori']; ?></span></td>
                                    <td class="text-center">
                                        <span class="fw-bold"><?= $alat['stok']; ?></span> <small class="text-muted">unit</small>
                                    </td>
                                    <td class="text-end pe-4">
                                        <a href="<?= BASEURL; ?>/AdminController/edit_view/<?= $alat['id_alat']; ?>" 
                                           class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="<?= BASEURL; ?>/AdminController/hapus_alat/<?= $alat['id_alat']; ?>" 
                                           class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Yakin ingin menghapus alat ini?');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>