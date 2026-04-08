<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pinjam - MusicRent</title>
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
        .user-chip { background: #fff; border: 1.5px solid #e5e7eb; border-radius: 20px; padding: 6px 16px; font-size: 0.82rem; font-weight: 600; color: #374151; display: flex; align-items: center; gap: 8px; }

        /* Summary */
        .summary-bar { display: flex; gap: 12px; margin-bottom: 28px; flex-wrap: wrap; }
        .summary-pill {
            background: #fff; border-radius: 14px; padding: 16px 22px;
            display: flex; align-items: center; gap: 12px; flex: 1; min-width: 130px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 12px rgba(0,0,0,0.04);
            transition: 0.25s;
        }
        .summary-pill:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(109,40,217,0.12); }
        .pill-icon { width: 42px; height: 42px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
        .pill-icon.v1 { background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; }
        .pill-icon.v2 { background: linear-gradient(135deg, #6d28d9, #a78bfa); color: #fff; }
        .pill-icon.v3 { background: linear-gradient(135deg, #8b5cf6, #ddd6fe); color: #4c1d95; }
        .summary-pill strong { font-size: 1.4rem; font-weight: 800; color: #0f172a; display: block; line-height: 1; }
        .summary-pill span { font-size: 0.75rem; color: #64748b; font-weight: 500; }

        /* Riwayat Cards */
        .riwayat-card {
            background: #fff; border-radius: 16px; padding: 20px 22px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 14px rgba(0,0,0,0.05);
            display: flex; align-items: center; gap: 16px;
            transition: 0.25s; border-left: 4px solid #6d28d9;
        }
        .riwayat-card:hover { transform: translateX(4px); box-shadow: 0 4px 20px rgba(109,40,217,0.1); }
        .riwayat-card.card-kembali { border-left-color: #a78bfa; }

        .alat-icon-sm { width: 46px; height: 46px; border-radius: 12px; background: #ede9fe; color: #6d28d9; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0; }
        .riwayat-info { flex: 1; min-width: 0; }
        .riwayat-info h6 { font-weight: 700; color: #0f172a; margin: 0 0 4px; font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .riwayat-info small { color: #94a3b8; font-size: 0.75rem; display: flex; align-items: center; gap: 4px; }

        .status-dipinjam { background: #4c1d95; color: #fff; border-radius: 20px; padding: 5px 14px; font-size: 0.72rem; font-weight: 700; white-space: nowrap; }
        .status-kembali  { background: #ede9fe; color: #4c1d95; border: 1.5px solid #c4b5fd; border-radius: 20px; padding: 5px 14px; font-size: 0.72rem; font-weight: 700; white-space: nowrap; }

        /* Empty */
        .empty-state { text-align: center; padding: 60px 20px; background: #fff; border-radius: 18px; color: #94a3b8; box-shadow: 0 1px 3px rgba(0,0,0,0.06); }
        .empty-state i { font-size: 3rem; margin-bottom: 12px; display: block; opacity: 0.3; }
        .empty-state h5 { font-weight: 700; color: #64748b; margin: 0 0 6px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h4><div class="brand-icon"><i class="fas fa-guitar fa-sm text-white"></i></div> MusicRent</h4>
    </div>
    <div class="sidebar-label">Menu</div>
    <nav>
        <a href="<?= BASEURL; ?>/PeminjamController"><i class="fas fa-th-large"></i> Daftar Alat</a>
        <a href="<?= BASEURL; ?>/PeminjamController/riwayat" class="active"><i class="fas fa-history"></i> Riwayat Pinjam</a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
        <a href="<?= BASEURL; ?>/PeminjamController/hapusAkun"
           onclick="return confirm('Yakin ingin menghapus akun? Data tidak bisa dikembalikan.')"
           style="color:#f87171; margin-top:4px;">
            <i class="fas fa-user-times"></i> Hapus Akun
        </a>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <div>
            <h2>Riwayat Peminjaman</h2>
            <p>Daftar alat musik yang sedang atau telah kamu gunakan.</p>
        </div>
        <div class="user-chip">
            <i class="fas fa-user-circle" style="color:#7c3aed;"></i>
            <?= $_SESSION['nama']; ?>
        </div>
    </div>

    <?php
        $total    = count($data['riwayat']);
        $dipinjam = count(array_filter($data['riwayat'], fn($r) => strtolower($r['status']) == 'dipinjam'));
        $kembali  = count(array_filter($data['riwayat'], fn($r) => strtolower($r['status']) == 'kembali'));
    ?>
    <div class="summary-bar">
        <div class="summary-pill">
            <div class="pill-icon v1"><i class="fas fa-list"></i></div>
            <div><strong><?= $total; ?></strong><span>Total Pinjam</span></div>
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

    <?php if(empty($data['riwayat'])) : ?>
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h5>Belum ada riwayat</h5>
            <p>Kamu belum pernah meminjam alat musik.</p>
        </div>
    <?php else : ?>
    <div class="row g-3">
        <?php foreach($data['riwayat'] as $r) : ?>
        <?php $s = strtolower($r['status']); ?>
        <div class="col-12">
            <div class="riwayat-card <?= $s == 'kembali' ? 'card-kembali' : ''; ?>">
                <div class="alat-icon-sm">
                    <i class="fas fa-guitar"></i>
                </div>
                <div class="riwayat-info">
                    <h6><?= $r['nama_alat']; ?></h6>
                    <small><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($r['tgl_pinjam'])); ?></small>
                </div>
                <?php if($s == 'dipinjam') : ?>
                    <span class="status-dipinjam"><i class="fas fa-hourglass-half me-1"></i>Dipinjam</span>
                <?php else : ?>
                    <span class="status-kembali"><i class="fas fa-check me-1"></i>Kembali</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
