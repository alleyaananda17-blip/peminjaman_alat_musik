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

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, #3b0764 0%, #4c1d95 40%, #6d28d9 100%);
            border-radius: 20px; padding: 32px 36px; margin-bottom: 28px;
            display: flex; justify-content: space-between; align-items: center;
            position: relative; overflow: hidden;
        }
        .welcome-banner::before {
            content: ''; position: absolute; right: -60px; top: -60px;
            width: 260px; height: 260px; border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }
        .welcome-banner::after {
            content: ''; position: absolute; right: 80px; bottom: -80px;
            width: 200px; height: 200px; border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }
        .welcome-banner h2 { color: #fff; font-weight: 800; font-size: 1.6rem; margin: 0 0 6px; }
        .welcome-banner p { color: rgba(255,255,255,0.75); margin: 0; font-size: 0.9rem; }
        .banner-btn {
            background: rgba(255,255,255,0.15); color: #fff; border: 1.5px solid rgba(255,255,255,0.3);
            border-radius: 12px; padding: 10px 22px; font-weight: 600; font-size: 0.875rem;
            text-decoration: none; display: inline-flex; align-items: center; gap: 8px;
            transition: 0.2s; backdrop-filter: blur(4px); white-space: nowrap; z-index: 1;
        }
        .banner-btn:hover { background: rgba(255,255,255,0.25); color: #fff; }

        /* Stat Cards */
        .stat-card {
            background: #fff; border-radius: 18px; padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.05);
            position: relative; overflow: hidden; transition: 0.25s;
        }
        .stat-card:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(109,40,217,0.12); }
        .stat-card::after {
            content: ''; position: absolute; right: -20px; bottom: -20px;
            width: 90px; height: 90px; border-radius: 50%;
            background: rgba(109,40,217,0.05);
        }
        .stat-icon { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; margin-bottom: 16px; }
        .stat-icon.v1 { background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; }
        .stat-icon.v2 { background: linear-gradient(135deg, #6d28d9, #a78bfa); color: #fff; }
        .stat-icon.v3 { background: linear-gradient(135deg, #8b5cf6, #c4b5fd); color: #4c1d95; }
        .stat-card h3 { font-size: 2rem; font-weight: 800; color: #0f172a; margin: 0 0 4px; }
        .stat-card p { color: #64748b; font-size: 0.82rem; margin: 0; font-weight: 500; }
        .stat-trend { font-size: 0.72rem; font-weight: 600; margin-top: 8px; display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 20px; }
        .stat-trend.up { background: #f5f3ff; color: #6d28d9; }

        /* Section header */
        .section-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
        .section-header h5 { font-weight: 700; color: #0f172a; margin: 0; font-size: 1rem; }
        .section-header a { font-size: 0.8rem; color: #6d28d9; font-weight: 600; text-decoration: none; }
        .section-header a:hover { text-decoration: underline; }

        /* Alat Cards */
        .alat-card {
            background: #fff; border-radius: 16px; padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 12px rgba(0,0,0,0.04);
            display: flex; align-items: center; gap: 16px;
            transition: 0.2s; border-left: 4px solid #6d28d9;
        }
        .alat-card:hover { transform: translateX(4px); box-shadow: 0 4px 20px rgba(109,40,217,0.1); }
        .alat-num { width: 40px; height: 40px; border-radius: 10px; background: #ede9fe; color: #4c1d95; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 0.9rem; flex-shrink: 0; }
        .alat-info { flex: 1; min-width: 0; }
        .alat-info h6 { font-weight: 700; color: #0f172a; margin: 0 0 4px; font-size: 0.9rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .alat-info small { color: #94a3b8; font-size: 0.75rem; }
        .badge-cat { background: #ede9fe; color: #7c3aed; border-radius: 20px; padding: 3px 10px; font-size: 0.72rem; font-weight: 600; }
        .stok-pill { background: #4c1d95; color: #fff; border-radius: 20px; padding: 4px 12px; font-size: 0.75rem; font-weight: 700; white-space: nowrap; }
        .alat-actions { display: flex; gap: 6px; }
        .btn-icon { width: 32px; height: 32px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; border: none; transition: 0.2s; }
        .btn-icon.edit { background: #ede9fe; color: #6d28d9; }
        .btn-icon.edit:hover { background: #6d28d9; color: #fff; }
        .btn-icon.del { background: #fef2f2; color: #ef4444; }
        .btn-icon.del:hover { background: #ef4444; color: #fff; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h4><div class="brand-icon"><i class="fas fa-guitar fa-sm text-white"></i></div> MusicRent</h4>
    </div>
    <div class="sidebar-label">Menu</div>
    <nav>
        <a href="<?= BASEURL; ?>/AdminController" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="<?= BASEURL; ?>/AdminController/user"><i class="fas fa-users"></i> Manajemen User</a>
        <a href="<?= BASEURL; ?>/AdminController/peminjaman"><i class="fas fa-exchange-alt"></i> Peminjaman</a>
        <a href="<?= BASEURL; ?>/AdminController/log"><i class="fas fa-clipboard-list"></i> Log Aktivitas</a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
</div>

<div class="main-content">

    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div>
            <h2>Selamat Datang, Admin 👋</h2>
            <p>Kelola inventaris dan pantau aktivitas sistem MusicRent.</p>
        </div>
        <a href="<?= BASEURL; ?>/AdminController/tambah_view" class="banner-btn">
            <i class="fas fa-plus"></i> Tambah Alat
        </a>
    </div>

    <!-- Stat Cards -->
    <?php
        $total_stok = array_sum(array_column($data['alat'], 'stok'));
        $kategori_unik = count(array_unique(array_column($data['alat'], 'nama_kategori')));
    ?>
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon v1"><i class="fas fa-guitar"></i></div>
                <h3><?= count($data['alat']); ?></h3>
                <p>Total Jenis Alat</p>
                <span class="stat-trend up"><i class="fas fa-layer-group"></i> Inventaris aktif</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon v2"><i class="fas fa-boxes"></i></div>
                <h3><?= $total_stok; ?></h3>
                <p>Total Unit Tersedia</p>
                <span class="stat-trend up"><i class="fas fa-cubes"></i> Semua stok</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon v3"><i class="fas fa-tags"></i></div>
                <h3><?= $kategori_unik; ?></h3>
                <p>Kategori Alat</p>
                <span class="stat-trend up"><i class="fas fa-th-large"></i> Jenis kategori</span>
            </div>
        </div>
    </div>

    <!-- Daftar Alat -->
    <div class="section-header">
        <h5><i class="fas fa-list me-2" style="color:#6d28d9;"></i> Daftar Alat Musik</h5>
    </div>

    <div class="row g-3">
        <?php $i = 1; foreach($data['alat'] as $alat) : ?>
        <div class="col-12">
            <div class="alat-card">
                <div class="alat-num"><?= $i++; ?></div>
                <div class="alat-info">
                    <h6><?= $alat['nama_alat']; ?></h6>
                    <span class="badge-cat"><?= $alat['nama_kategori']; ?></span>
                </div>
                <div class="stok-pill"><i class="fas fa-cubes me-1"></i><?= $alat['stok']; ?> unit</div>
                <div class="alat-actions">
                    <a href="<?= BASEURL; ?>/AdminController/edit_view/<?= $alat['id_alat']; ?>" class="btn-icon edit" title="Edit">
                        <i class="fas fa-pen fa-xs"></i>
                    </a>
                    <a href="<?= BASEURL; ?>/AdminController/hapus_alat/<?= $alat['id_alat']; ?>" class="btn-icon del" title="Hapus"
                       onclick="return confirm('Yakin ingin menghapus alat ini?')">
                        <i class="fas fa-trash fa-xs"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
