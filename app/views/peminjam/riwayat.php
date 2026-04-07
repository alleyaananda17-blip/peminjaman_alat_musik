<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pinjam - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            display: flex;
        }
        /* Sidebar Tetap di Kiri */
        .sidebar {
            position: fixed;
            width: 260px;
            height: 100vh;
            background-color: #2c3e50;
            color: white;
            z-index: 1000;
        }
        .sidebar h3 {
            padding: 25px 20px;
            font-weight: 600;
            margin: 0;
            background: #1a252f;
        }
        .nav-link {
            color: rgba(255,255,255,0.7) !important;
            padding: 15px 25px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: 0.3s;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #34495e;
            color: white !important;
        }
        /* Area Konten Diberi Margin Kiri agar Tidak Tertutup Sidebar */
        .main-content {
            margin-left: 260px; 
            padding: 40px;
            width: 100%;
            min-height: 100vh;
        }
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            background: white;
            overflow: hidden;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>MusicRent</h3>
    <div class="py-3">
        <small class="px-4 text-uppercase fw-bold opacity-50" style="font-size: 10px; letter-spacing: 1px;">Menu Utama</small>
        <a href="<?= BASEURL; ?>/PeminjamController" class="nav-link mt-2">
            <i class="bi bi-grid-fill me-3"></i> Daftar Alat
        </a>
        <a href="<?= BASEURL; ?>/PeminjamController/riwayat" class="nav-link active">
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
            <h2 class="fw-bold m-0 text-dark">Riwayat Peminjaman</h2>
            <p class="text-muted mb-0">Daftar alat musik yang sedang atau telah Anda gunakan.</p>
        </div>
        <div class="text-end">
            <span class="badge bg-info text-dark rounded-pill px-3 py-2">
                <i class="bi bi-person-circle me-1"></i> <?= $_SESSION['nama']; ?>
            </span>
        </div>
    </div>

    <div class="card card-custom">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-uppercase small fw-bold text-muted">Nama Alat</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted">Tanggal Pinjam</th>
                        <th class="py-3 border-0 text-uppercase small fw-bold text-muted text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data['riwayat'])) : ?>
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                            <p class="mt-2 text-muted">Belum ada aktivitas peminjaman.</p>
                        </td>
                    </tr>
                    <?php else : ?>
                        <?php foreach($data['riwayat'] as $r) : ?>
                        <tr>
                            <td class="ps-4 py-4 fw-semibold text-dark"><?= $r['nama_alat']; ?></td>
                            <td class="py-4 text-muted"><?= date('d M Y', strtotime($r['tgl_pinjam'])); ?></td>
                            <td class="py-4 text-center">
                                <?php if($r['status'] == 'dipinjam') : ?>
                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                        <i class="bi bi- hourglass-split me-1"></i> Sedang Dipinjam
                                    </span>
                                <?php else : ?>
                                    <span class="badge bg-success text-white rounded-pill px-3 py-2">
                                        <i class="bi bi-check-circle me-1"></i> Sudah Kembali
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>