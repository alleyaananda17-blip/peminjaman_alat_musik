<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?> - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f2f5; margin: 0; }

        /* Sidebar */
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

        /* Summary pills */
        .summary-bar { display: flex; gap: 12px; margin-bottom: 28px; flex-wrap: wrap; }
        .summary-pill {
            background: #fff; border-radius: 14px; padding: 14px 20px;
            display: flex; align-items: center; gap: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 12px rgba(0,0,0,0.04);
            flex: 1; min-width: 140px;
            transition: 0.25s; cursor: default;
        }
        .summary-pill:hover { transform: translateY(-5px); box-shadow: 0 10px 28px rgba(109,40,217,0.15); }
        .pill-icon { width: 40px; height: 40px; border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
        .pill-icon.total   { background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; }
        .pill-icon.active  { background: linear-gradient(135deg, #6d28d9, #a78bfa); color: #fff; }
        .pill-icon.done    { background: linear-gradient(135deg, #8b5cf6, #ddd6fe); color: #4c1d95; }
        .summary-pill strong { font-size: 1.3rem; font-weight: 800; color: #0f172a; display: block; line-height: 1; }
        .summary-pill span { font-size: 0.75rem; color: #64748b; font-weight: 500; }

        /* Pinjam Cards */
        .pinjam-card {
            background: #fff; border-radius: 18px; padding: 22px 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.05);
            transition: 0.25s; border-top: 3px solid transparent;
        }
        .pinjam-card:hover { transform: translateY(-3px); box-shadow: 0 8px 28px rgba(109,40,217,0.1); }
        .pinjam-card.card-dipinjam { border-top-color: #7c3aed; }
        .pinjam-card.card-kembali  { border-top-color: #a78bfa; }
        .pinjam-card.card-pending  { border-top-color: #4c1d95; }

        .card-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; }
        .user-info { display: flex; align-items: center; gap: 12px; }
        .user-avatar { width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1rem; flex-shrink: 0; }
        .user-name { font-weight: 700; color: #0f172a; font-size: 0.95rem; margin: 0; }
        .user-id { font-size: 0.72rem; color: #94a3b8; }

        .status-badge { padding: 5px 14px; border-radius: 20px; font-size: 0.72rem; font-weight: 700; letter-spacing: 0.3px; }
        .status-dipinjam { background: #ede9fe; color: #4c1d95; border: 1.5px solid #c4b5fd; }
        .status-kembali  { background: #f5f3ff; color: #6d28d9; border: 1.5px solid #ddd6fe; }
        .status-pending  { background: #4c1d95; color: #fff; }

        .card-body-info { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 16px; }
        .info-chip { background: #f8fafc; border-radius: 8px; padding: 6px 12px; font-size: 0.78rem; color: #475569; display: flex; align-items: center; gap: 6px; }
        .info-chip i { color: #7c3aed; font-size: 0.7rem; }
        .info-chip strong { color: #0f172a; }

        .card-footer-row { display: flex; justify-content: space-between; align-items: center; padding-top: 14px; border-top: 1px solid #f1f5f9; }
        .alat-name { font-weight: 600; color: #0f172a; font-size: 0.875rem; display: flex; align-items: center; gap: 8px; }
        .alat-name i { color: #7c3aed; }

        .btn-kembalikan {
            background: #6d28d9; color: #fff; border: none;
            border-radius: 10px; padding: 8px 18px; font-size: 0.8rem; font-weight: 600;
            transition: 0.2s; box-shadow: 0 3px 10px rgba(109,40,217,0.35);
            text-decoration: none; display: inline-flex; align-items: center; gap: 6px;
        }
        .btn-kembalikan:hover { background: #4c1d95; color: #fff; box-shadow: 0 5px 16px rgba(76,29,149,0.45); transform: translateY(-1px); }

        .empty-state { text-align: center; padding: 60px 20px; color: #94a3b8; background: #fff; border-radius: 18px; }
        .empty-state i { font-size: 3rem; margin-bottom: 12px; display: block; opacity: 0.3; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h4><div class="brand-icon"><i class="fas fa-guitar fa-sm text-white"></i></div> MusicRent</h4>
    </div>
    <div class="sidebar-label">Menu</div>
    <nav>
        <a href="<?= BASEURL; ?>/AdminController"><i class="fas fa-home"></i> Dashboard</a>
        <a href="<?= BASEURL; ?>/AdminController/user"><i class="fas fa-users"></i> Manajemen User</a>
        <a href="<?= BASEURL; ?>/AdminController/peminjaman" class="active"><i class="fas fa-exchange-alt"></i> Peminjaman</a>
        <a href="<?= BASEURL; ?>/AdminController/log"><i class="fas fa-clipboard-list"></i> Log Aktivitas</a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <div>
            <h2>Data Peminjaman</h2>
            <p>Daftar transaksi penyewaan alat musik.</p>
        </div>
    </div>

    <?php
        $total     = count($data['pinjam']);
        $dipinjam  = count(array_filter($data['pinjam'], fn($p) => strtolower($p['status']) == 'dipinjam'));
        $kembali   = count(array_filter($data['pinjam'], fn($p) => strtolower($p['status']) == 'kembali'));
    ?>
    <div class="summary-bar">
        <div class="summary-pill">
            <div class="pill-icon total"><i class="fas fa-list"></i></div>
            <div><strong><?= $total; ?></strong><span>Total Transaksi</span></div>
        </div>
        <div class="summary-pill">
            <div class="pill-icon active"><i class="fas fa-hourglass-half"></i></div>
            <div><strong><?= $dipinjam; ?></strong><span>Sedang Dipinjam</span></div>
        </div>
        <div class="summary-pill">
            <div class="pill-icon done"><i class="fas fa-check-circle"></i></div>
            <div><strong><?= $kembali; ?></strong><span>Sudah Kembali</span></div>
        </div>
    </div>

    <?php if(empty($data['pinjam'])) : ?>
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            Belum ada data peminjaman.
        </div>
    <?php else : ?>
    <div class="row g-3">
        <?php foreach($data['pinjam'] as $p) : ?>
        <?php $s = strtolower($p['status']); ?>
        <div class="col-lg-6 col-12">
            <div class="pinjam-card card-<?= $s; ?>">
                <div class="card-top">
                    <div class="user-info">
                        <div class="user-avatar"><?= strtoupper(substr($p['username'], 0, 1)); ?></div>
                        <div>
                            <p class="user-name"><?= $p['username']; ?></p>
                        </div>
                    </div>
                    <?php if($s == 'dipinjam') : ?>
                        <span class="status-badge status-dipinjam"><i class="fas fa-hourglass-half me-1"></i>DIPINJAM</span>
                    <?php elseif($s == 'kembali') : ?>
                        <span class="status-badge status-kembali"><i class="fas fa-check me-1"></i>KEMBALI</span>
                    <?php else : ?>
                        <span class="status-badge status-pending"><?= strtoupper($p['status']); ?></span>
                    <?php endif; ?>
                </div>

                <div class="card-body-info">
                    <div class="info-chip">
                        <i class="fas fa-calendar-alt"></i>
                        Pinjam: <strong><?= date('d M Y', strtotime($p['tgl_pinjam'])); ?></strong>
                    </div>
                    <div class="info-chip">
                        <i class="fas fa-calendar-check"></i>
                        Kembali: <strong>
                            <?= ($p['tgl_kembali'] != null && $p['tgl_kembali'] != '0000-00-00')
                                ? date('d M Y', strtotime($p['tgl_kembali'])) : '-'; ?>
                        </strong>
                    </div>
                </div>

                <div class="card-footer-row">
                    <div class="alat-name">
                        <i class="fas fa-guitar"></i> <?= $p['nama_alat']; ?>
                    </div>
                    <?php if($s != 'kembali') : ?>
                    <a href="<?= BASEURL; ?>/AdminController/kembalikan/<?= $p['id_pinjam']; ?>"
                       class="btn-kembalikan"
                       onclick="return confirm('Yakin sudah dikembalikan?')">
                        <i class="fas fa-undo"></i> Kembalikan
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
