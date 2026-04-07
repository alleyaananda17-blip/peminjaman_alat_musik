<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alat - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; margin: 0; display: flex; }
        .sidebar { position: fixed; width: 260px; height: 100vh; background-color: #2c3e50; color: white; z-index: 1000; }
        .sidebar h3 { padding: 25px 20px; font-weight: 600; margin: 0; background: #1a252f; }
        .nav-link { color: rgba(255,255,255,0.7) !important; padding: 15px 25px; display: flex; align-items: center; text-decoration: none; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { background-color: #34495e; color: white !important; }
        .main-content { margin-left: 260px; padding: 40px; width: 100%; min-height: 100vh; }
        .card-instrument { border: none; border-radius: 20px; transition: 0.3s; background: white; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .card-instrument:hover { transform: translateY(-10px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>MusicRent</h3>
    <div class="py-3">
        <small class="px-4 text-uppercase fw-bold opacity-50" style="font-size: 10px; letter-spacing: 1px;">Menu Utama</small>
        <a href="<?= BASEURL; ?>/PeminjamController" class="nav-link active mt-2">
            <i class="bi bi-grid-fill me-3"></i> Daftar Alat
        </a>
        <a href="<?= BASEURL; ?>/PeminjamController/riwayat" class="nav-link">
            <i class="bi bi-clock-history me-3"></i> Riwayat Pinjam
        </a>
    </div>
    <div style="position: absolute; bottom: 20px; width: 100%;">
        <a href="<?= BASEURL; ?>/AuthController/logout" class="nav-link text-danger">
            <i class="bi bi-box-arrow-left me-3"></i> Keluar
        </a>
    </div>
</div>

<div class="main-content">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="fw-bold m-0 text-dark">Pilih Alat Musik</h2>
            <p class="text-muted mb-0">Temukan alat musik terbaik untuk hobi Anda.</p>
        </div>
        <div class="text-end">
            <span class="badge bg-info text-dark rounded-pill px-3 py-2">
                <i class="bi bi-person-circle me-1"></i> <?= $_SESSION['nama']; ?>
            </span>
        </div>
    </div>

    <div class="row">
        <?php foreach($data['alat'] as $alt) : ?>
        <div class="col-md-4 mb-4">
            <div class="card card-instrument p-3">
                <div class="card-body">
                    <h5 class="fw-bold"><?= $alt['nama_alat']; ?></h5>
                    <p class="text-muted small">Tersedia: <span class="badge bg-primary"><?= $alt['stok']; ?> unit</span></p>
                    <hr class="opacity-25">
                    <a href="<?= BASEURL; ?>/PeminjamController/pinjam/<?= $alt['id_alat']; ?>" class="btn btn-primary w-100 rounded-pill py-2">Pinjam Sekarang</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>