<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        body { background-color: #f4f7f6; font-family: 'Inter', sans-serif; }
        .sidebar { background-color: #1a3a5f; min-height: 100vh; color: white; position: fixed; width: 16.66%; }
        .sidebar a { color: rgba(255,255,255,0.7); text-decoration: none; padding: 15px 25px; display: block; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.1); color: white; border-left: 5px solid #0d6efd; }
        .main-content { margin-left: 16.66%; padding: 40px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .badge-pending { background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
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
                <a href="<?= BASEURL; ?>/PetugasController"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="<?= BASEURL; ?>/PetugasController/persetujuan" class="active"><i class="fas fa-check-circle me-2"></i> Persetujuan</a>
                <a href="<?= BASEURL; ?>/PetugasController/laporan"><i class="fas fa-file-invoice me-2"></i> Laporan</a>
                <div class="mt-5">
                    <a href="<?= BASEURL; ?>/AuthController/logout" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
                </div>
            </nav>
        </div>

        <div class="col-md-10 main-content">
            <div class="mb-4">
                <h2 class="fw-bold text-dark">Persetujuan Peminjaman</h2>
                <p class="text-muted">Konfirmasi alat yang akan dipinjam oleh member.</p>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3">No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Alat Musik</th>
                                    <th>Status</th>
                                    <th class="text-end pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($data['pinjam'])) : ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="fas fa-box-open fa-3x mb-3 d-block"></i>
                                            Belum ada antrean persetujuan.
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <?php $i = 1; foreach($data['pinjam'] as $p) : ?>
                                    <tr>
                                        <td class="ps-4 fw-bold"><?= $i++; ?></td>
                                        <td>
                                            <div class="fw-bold text-dark"><?= $p['nama_lengkap']; ?></div>
                                            <small class="text-muted">ID: #<?= $p['id_pinjam']; ?></small>
                                        </td>
                                        <td><?= $p['nama_alat']; ?></td>
                                        <td>
                                            <span class="badge rounded-pill badge-pending px-3">
                                                <?= strtoupper($p['status']); ?>
                                            </span>
                                        </td>
                                        <td class="text-end pe-4">
                                            <a href="<?= BASEURL; ?>/PetugasController/prosesSetuju/<?= $p['id_pinjam']; ?>" 
                                               class="btn btn-success btn-sm px-3 rounded-pill"
                                               onclick="return confirm('Setujui peminjaman ini?')">
                                                <i class="fas fa-check me-1"></i> Setujui
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>