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
        .sidebar { background-color: #1a3a5f; min-height: 100vh; color: white; position: fixed; width: 16.666667%; }
        .sidebar a { color: rgba(255,255,255,0.7); text-decoration: none; padding: 15px 25px; display: block; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.1); color: white; border-left: 5px solid #0d6efd; }
        .main-content { margin-left: 16.666667%; padding: 40px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
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
                <a href="<?= BASEURL; ?>/AdminController"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="<?= BASEURL; ?>/AdminController/user"><i class="fas fa-users me-2"></i> Manajemen User</a>
                <a href="<?= BASEURL; ?>/AdminController/peminjaman"><i class="fas fa-history me-2"></i> Peminjaman</a>
                <a href="<?= BASEURL; ?>/AdminController/log" class="active"><i class="fas fa-list me-2"></i> Log Aktivitas</a>
                <div class="mt-5">
                    <a href="<?= BASEURL; ?>/AuthController/logout" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
                </div>
            </nav>
        </div>

        <div class="col-md-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold text-dark">Riwayat Aktivitas</h2>
                    <p class="text-muted">Pantau seluruh catatan sistem dan aktivitas pengguna.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3" width="80">No</th>
                                    <th>Waktu</th>
                                    <th>User</th>
                                    <th>Aktivitas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($data['logs'])) : ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-5 text-muted">Belum ada data log aktivitas.</td>
                                    </tr>
                                <?php endif; ?>

                                <?php $i = 1; foreach($data['logs'] as $log) : ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-dark"><?= $i++; ?></td>
                                    <td>
                                        <div class="text-dark fw-bold"><?= date('d M Y', strtotime($log['waktu'])); ?></div>
                                        <small class="text-muted"><i class="far fa-clock me-1"></i> <?= date('H:i', strtotime($log['waktu'])); ?> WIB</small>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-info text-white px-3">
                                            <?= strtoupper($log['username']); ?>
                                        </span>
                                    </td>
                                    <td class="text-dark fw-bold"><?= $log['pesan']; ?></td>
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

</body>
</html>