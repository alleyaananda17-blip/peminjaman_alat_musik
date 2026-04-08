<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan - MusicRent</title>
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
        .count-badge { background: #4c1d95; color: #fff; border-radius: 12px; padding: 8px 18px; font-size: 0.82rem; font-weight: 700; }

        /* Persetujuan Card */
        .pinjam-card {
            background: #fff; border-radius: 18px; padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.05);
            transition: 0.25s; border-top: 3px solid #6d28d9;
        }
        .pinjam-card:hover { transform: translateY(-4px); box-shadow: 0 10px 28px rgba(109,40,217,0.12); }

        .card-head { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 18px; }
        .user-row { display: flex; align-items: center; gap: 12px; }
        .user-avatar { width: 46px; height: 46px; border-radius: 12px; background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem; flex-shrink: 0; }
        .user-name { font-weight: 700; color: #0f172a; font-size: 0.95rem; margin: 0; }
        .badge-pending { background: #ede9fe; color: #4c1d95; border-radius: 20px; padding: 4px 12px; font-size: 0.72rem; font-weight: 700; border: 1.5px solid #c4b5fd; }
        .badge-kembali { background: #f5f3ff; color: #6d28d9; border-radius: 20px; padding: 4px 12px; font-size: 0.72rem; font-weight: 700; border: 1.5px solid #ddd6fe; }
        .badge-dipinjam { background: #4c1d95; color: #fff; border-radius: 20px; padding: 4px 12px; font-size: 0.72rem; font-weight: 700; }

        .alat-row { background: #f8fafc; border-radius: 10px; padding: 12px 16px; display: flex; align-items: center; gap: 10px; margin-bottom: 18px; }
        .alat-row i { color: #6d28d9; }
        .alat-row span { font-weight: 600; color: #0f172a; font-size: 0.875rem; }

        .btn-setuju {
            background: #6d28d9; color: #fff; border: none;
            border-radius: 10px; padding: 10px; font-weight: 700; font-size: 0.875rem;
            width: 100%; transition: 0.2s; box-shadow: 0 3px 10px rgba(109,40,217,0.35);
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .btn-setuju:hover { background: #4c1d95; box-shadow: 0 5px 16px rgba(76,29,149,0.45); transform: translateY(-1px); }

        /* Empty */
        .empty-state { text-align: center; padding: 60px 20px; background: #fff; border-radius: 18px; color: #94a3b8; box-shadow: 0 1px 3px rgba(0,0,0,0.06); }
        .empty-state i { font-size: 3.5rem; margin-bottom: 16px; display: block; opacity: 0.3; }
        .empty-state h5 { font-weight: 700; color: #64748b; margin: 0 0 6px; }
        .empty-state p { font-size: 0.875rem; margin: 0; }
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
        <a href="<?= BASEURL; ?>/PetugasController/persetujuan" class="active"><i class="fas fa-check-circle"></i> Persetujuan</a>
        <a href="<?= BASEURL; ?>/PetugasController/laporan"><i class="fas fa-file-alt"></i> Laporan</a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <div>
            <h2>Persetujuan Peminjaman</h2>
            <p>Konfirmasi alat yang akan dipinjam oleh member.</p>
        </div>
    </div>

    <?php if(empty($data['pinjam'])) : ?>
        <div class="empty-state">
            <i class="fas fa-check-double"></i>
            <h5>Semua Beres!</h5>
            <p>Tidak ada antrean persetujuan saat ini.</p>
        </div>
    <?php else : ?>
    <div class="row g-3">
        <?php foreach($data['pinjam'] as $p) : ?>
        <div class="col-lg-4 col-md-6">
            <div class="pinjam-card">
                <div class="card-head">
                    <div class="user-row">
                        <div class="user-avatar"><?= strtoupper(substr($p['nama_lengkap'] ?: $p['username'], 0, 1)); ?></div>
                        <div>
                            <p class="user-name"><?= $p['nama_lengkap'] ?: $p['username']; ?></p>
                        </div>
                    </div>
                    <span class="<?= strtolower($p['status']) == 'kembali' ? 'badge-kembali' : 'badge-dipinjam'; ?>"><?= strtoupper($p['status']); ?></span>
                </div>
                <div class="alat-row">
                    <i class="fas fa-guitar"></i>
                    <span><?= $p['nama_alat']; ?></span>
                </div>
                <a href="<?= BASEURL; ?>/PetugasController/prosesSetuju/<?= $p['id_pinjam']; ?>"
                   class="btn-setuju"
                   onclick="return confirm('Setujui peminjaman ini?')">
                    <i class="fas fa-check"></i> Setujui Peminjaman
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
