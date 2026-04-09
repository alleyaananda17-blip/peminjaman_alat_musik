<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f2f5; margin: 0; }
        .sidebar { position: fixed; top: 0; left: 0; width: 260px; height: 100vh; background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); z-index: 100; display: flex; flex-direction: column; box-shadow: 4px 0 20px rgba(0,0,0,0.15); }
        .sidebar-brand { padding: 28px 24px 20px; border-bottom: 1px solid rgba(255,255,255,0.07); }
        .sidebar-brand h4 { color: #fff; font-weight: 700; font-size: 1.2rem; margin: 0; display: flex; align-items: center; gap: 10px; }
        .brand-icon { width: 36px; height: 36px; background: #6d28d9; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
        .sidebar-label { padding: 20px 24px 8px; font-size: 10px; font-weight: 600; letter-spacing: 1.5px; color: rgba(255,255,255,0.3); text-transform: uppercase; }
        .sidebar nav a { display: flex; align-items: center; gap: 12px; padding: 12px 24px; color: rgba(255,255,255,0.55); text-decoration: none; font-size: 0.875rem; font-weight: 500; transition: all 0.2s; border-left: 3px solid transparent; }
        .sidebar nav a:hover { color: #fff; background: rgba(255,255,255,0.06); }
        .sidebar nav a.active { color: #fff; background: rgba(109,40,217,0.25); border-left-color: #7c3aed; }
        .sidebar nav a i { width: 18px; text-align: center; font-size: 0.9rem; }
        .sidebar-footer { margin-top: auto; padding: 16px 24px; border-top: 1px solid rgba(255,255,255,0.07); }
        .sidebar-footer a { display: flex; align-items: center; gap: 10px; color: #f87171; text-decoration: none; font-size: 0.875rem; font-weight: 500; padding: 10px 12px; border-radius: 8px; transition: 0.2s; }
        .sidebar-footer a:hover { background: rgba(248,113,113,0.1); }
        .main-content { margin-left: 260px; padding: 32px; min-height: 100vh; }

        /* Topbar */
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; }
        .topbar h2 { font-size: 1.5rem; font-weight: 800; color: #0f172a; margin: 0; }
        .topbar p { color: #64748b; margin: 4px 0 0; font-size: 0.875rem; }
        .btn-cetak {
            background: #6d28d9; color: #fff; border: none;
            border-radius: 12px; padding: 10px 22px; font-weight: 700; font-size: 0.875rem;
            text-decoration: none; display: inline-flex; align-items: center; gap: 8px;
            box-shadow: 0 4px 14px rgba(109,40,217,0.4); transition: 0.2s;
        }
        .btn-cetak:hover { background: #4c1d95; color: #fff; transform: translateY(-1px); }

        /* Summary */
        .summary-bar { display: flex; gap: 12px; margin-bottom: 28px; flex-wrap: wrap; }
        .summary-pill {
            background: #fff; border-radius: 14px; padding: 16px 22px;
            display: flex; align-items: center; gap: 12px; flex: 1; min-width: 140px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 12px rgba(0,0,0,0.04);
            transition: 0.25s;
        }
        .summary-pill:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(109,40,217,0.12); }
        .pill-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
        .pill-icon.v1 { background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; }
        .pill-icon.v2 { background: linear-gradient(135deg, #6d28d9, #a78bfa); color: #fff; }
        .pill-icon.v3 { background: linear-gradient(135deg, #8b5cf6, #ddd6fe); color: #4c1d95; }
        .summary-pill strong { font-size: 1.5rem; font-weight: 800; color: #0f172a; display: block; line-height: 1; }
        .summary-pill span { font-size: 0.78rem; color: #64748b; font-weight: 500; }

        /* Transaksi Card */
        .trx-card {
            background: #fff; border-radius: 16px; padding: 20px 22px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 14px rgba(0,0,0,0.05);
            transition: 0.25s; border-left: 4px solid #6d28d9;
            display: flex; align-items: center; gap: 16px;
        }
        .trx-card:hover { transform: translateX(4px); box-shadow: 0 4px 20px rgba(109,40,217,0.1); }
        .trx-num { width: 36px; height: 36px; border-radius: 10px; background: #ede9fe; color: #4c1d95; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.82rem; flex-shrink: 0; }
        .trx-avatar { width: 42px; height: 42px; border-radius: 11px; background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1rem; flex-shrink: 0; }
        .trx-info { flex: 1; min-width: 0; }
        .trx-info h6 { font-weight: 700; color: #0f172a; margin: 0 0 3px; font-size: 0.9rem; }
        .trx-info small { color: #94a3b8; font-size: 0.75rem; }
        .trx-alat { font-size: 0.82rem; color: #6d28d9; font-weight: 600; display: flex; align-items: center; gap: 5px; white-space: nowrap; }
        .trx-date { font-size: 0.78rem; color: #64748b; white-space: nowrap; text-align: right; }
        .status-badge { padding: 4px 12px; border-radius: 20px; font-size: 0.72rem; font-weight: 700; white-space: nowrap; }
        .status-dipinjam { background: #ede9fe; color: #4c1d95; border: 1.5px solid #c4b5fd; }
        .status-kembali  { background: #f5f3ff; color: #6d28d9; border: 1.5px solid #ddd6fe; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h4><div class="brand-icon"><i class="fas fa-guitar fa-sm text-white"></i></div> MusicRent</h4>
    </div>
    <div class="sidebar-label">Menu</div>
    <nav>
        <a href="<?= BASEURL; ?>/PetugasController"><i class="fas fa-home"></i> Dashboard</a>
        <a href="<?= BASEURL; ?>/PetugasController/persetujuan"><i class="fas fa-check-circle"></i> Persetujuan</a>
        <a href="<?= BASEURL; ?>/PetugasController/laporan" class="active"><i class="fas fa-file-alt"></i> Laporan</a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <div>
            <h2>Laporan Transaksi</h2>
            <p>Riwayat penyewaan alat musik oleh member.</p>
        </div>
        <a href="<?= BASEURL; ?>/PetugasController/cetak" target="_blank" class="btn-cetak">
            <i class="fas fa-print"></i> Cetak Laporan
        </a>
    </div>

    <?php
        $total    = count($data['pinjam']);
        $dipinjam = count(array_filter($data['pinjam'], fn($p) => strtolower($p['status']) == 'dipinjam'));
        $kembali  = count(array_filter($data['pinjam'], fn($p) => strtolower($p['status']) == 'kembali'));
    ?>
    <div class="summary-bar">
        <div class="summary-pill">
            <div class="pill-icon v1"><i class="fas fa-list"></i></div>
            <div><strong><?= $total; ?></strong><span>Total Transaksi</span></div>
        </div>
        <div class="summary-pill">
            <div class="pill-icon v2"><i class="fas fa-hourglass-half"></i></div>
            <div><strong><?= $dipinjam; ?></strong><span>Sedang Dipinjam</span></div>
        </div>
        <div class="summary-pill">
            <div class="pill-icon v3"><i class="fas fa-check-circle"></i></div>
            <div><strong><?= $kembali; ?></strong><span>Sudah Kembali</span></div>
        </div>
    </div>

    <div class="row g-3">
        <?php $i = 1; foreach($data['pinjam'] as $p) : ?>
        <div class="col-12">
            <div class="trx-card">
                <div class="trx-num"><?= $i++; ?></div>
                <div class="trx-avatar"><?= strtoupper(substr($p['nama_lengkap'] ?: $p['username'], 0, 1)); ?></div>
                <div class="trx-info">
                    <h6><?= $p['nama_lengkap'] ?: '<span style="color:#ef4444;font-size:0.8rem;">Nama belum diisi</span>'; ?></h6>
                    <div class="trx-alat"><i class="fas fa-guitar"></i><?= $p['nama_alat']; ?></div>
                </div>
                <div class="trx-date">
                    <div class="fw-semibold text-dark small"><?= date('d M Y', strtotime($p['tgl_pinjam'])); ?></div>
                    <div class="text-muted" style="font-size:0.72rem;">Tgl Pinjam</div>
                </div>
                <div>
                    <?php if(strtolower($p['status']) == 'dipinjam') : ?>
                        <span class="status-badge status-dipinjam"><i class="fas fa-hourglass-half me-1"></i>DIPINJAM</span>
                    <?php else : ?>
                        <span class="status-badge status-kembali"><i class="fas fa-check me-1"></i>KEMBALI</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
