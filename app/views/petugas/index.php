<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Petugas - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        body { background-color: #f4f7f6; }
        .sidebar { background-color: #1a3a5f; min-height: 100vh; color: white; position: fixed; width: 16.6%; }
        .sidebar a { color: rgba(255,255,255,0.7); text-decoration: none; padding: 15px 25px; display: block; }
        .sidebar a.active { background: rgba(255,255,255,0.1); color: white; border-left: 5px solid #0d6efd; }
        .main-content { margin-left: 16.6%; padding: 40px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <div class="p-4 mb-3"><h4 class="fw-bold">MusicRent</h4></div>
            <nav>
                <a href="<?= BASEURL; ?>/PetugasController" class="active"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="<?= BASEURL; ?>/PetugasController/persetujuan"><i class="fas fa-check-square me-2"></i> Persetujuan</a>
                <a href="<?= BASEURL; ?>/PetugasController/laporan"><i class="fas fa-file-alt me-2"></i> Laporan</a>
                <div class="mt-5">
                    <a href="<?= BASEURL; ?>/AuthController/logout" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
                </div>
            </nav>
        </div>

        <div class="col-md-10 main-content">
            <h2 class="fw-bold">Halo, Petugas!</h2>
            <p class="text-muted">Kelola persetujuan dan laporan peminjaman hari ini.</p>
            
            <div class="card p-4 border-0 shadow-sm" style="max-width: 300px;">
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white rounded p-3 me-3">
                        <i class="fas fa-clipboard-list fa-2x"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Peminjaman Alat</h6>
                        <h2 class="fw-bold mb-0 text-primary"><?= $data['total_pending']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>