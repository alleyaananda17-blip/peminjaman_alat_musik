<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas - MusicRent</title>
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
        .welcome-banner::before { content: ''; position: absolute; right: -60px; top: -60px; width: 260px; height: 260px; border-radius: 50%; background: rgba(255,255,255,0.05); }
        .welcome-banner::after  { content: ''; position: absolute; right: 80px; bottom: -80px; width: 200px; height: 200px; border-radius: 50%; background: rgba(255,255,255,0.04); }
        .welcome-banner h2 { color: #fff; font-weight: 800; font-size: 1.6rem; margin: 0 0 6px; }
        .welcome-banner p  { color: rgba(255,255,255,0.75); margin: 0; font-size: 0.9rem; }
        .banner-badge {
            background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.3);
            border-radius: 14px; padding: 12px 22px; color: #fff; text-align: center;
            backdrop-filter: blur(4px); z-index: 1; flex-shrink: 0;
        }
        .banner-badge .badge-num { font-size: 2rem; font-weight: 800; line-height: 1; display: block; }
        .banner-badge .badge-label { font-size: 0.78rem; opacity: 0.85; }

        /* Stat Cards */
        .stat-card {
            background: #fff; border-radius: 18px; padding: 24px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.05);
            text-decoration: none; display: block;
            position: relative; overflow: hidden; transition: 0.25s;
            border-top: 3px solid #6d28d9;
        }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(109,40,217,0.15); }
        .stat-card::after { content: ''; position: absolute; right: -20px; bottom: -20px; width: 90px; height: 90px; border-radius: 50%; background: rgba(109,40,217,0.05); }
        .stat-icon { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; margin-bottom: 16px; }
        .stat-icon.v1 { background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; }
        .stat-icon.v2 { background: linear-gradient(135deg, #6d28d9, #a78bfa); color: #fff; }
        .stat-card h3 { font-size: 2rem; font-weight: 800; color: #0f172a; margin: 0 0 4px; }
        .stat-card p  { color: #64748b; font-size: 0.82rem; margin: 0; font-weight: 500; }
        .stat-trend { font-size: 0.72rem; font-weight: 600; margin-top: 8px; display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 20px; background: #f5f3ff; color: #6d28d9; }

        /* Menu Cards */
        .section-title { font-weight: 700; color: #0f172a; font-size: 1rem; margin: 28px 0 16px; }
        .menu-card {
            background: #fff; border-radius: 18px; padding: 28px 24px;
            text-decoration: none; display: flex; align-items: center; gap: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.05);
            transition: 0.25s; border-left: 4px solid #6d28d9; height: 100%;
        }
        .menu-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(109,40,217,0.15); }
        .menu-icon { width: 56px; height: 56px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; }
        .menu-icon.m1 { background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; }
        .menu-icon.m2 { background: linear-gradient(135deg, #6d28d9, #a78bfa); color: #fff; }
        .menu-card h5 { font-weight: 700; color: #0f172a; margin: 0 0 4px; font-size: 1rem; }
        .menu-card p  { color: #64748b; font-size: 0.8rem; margin: 0; }
        .menu-arrow { margin-left: auto; color: #c4b5fd; font-size: 1rem; flex-shrink: 0; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h4><div class="brand-icon"><i class="fas fa-guitar fa-sm text-white"></i></div> MusicRent</h4>
    </div>
    <div class="sidebar-label">Menu</div>
    <nav>
        <a href="<?= BASEURL; ?>/PetugasController" class="active"><i class="fas fa-home"></i> Dashboard</a>
        <a href="<?= BASEURL; ?>/PetugasController/persetujuan"><i class="fas fa-check-circle"></i> Persetujuan</a>
        <a href="<?= BASEURL; ?>/PetugasController/laporan"><i class="fas fa-file-alt"></i> Laporan</a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
</div>

<div class="main-content">

    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div>
            <h2>Halo, Petugas! 👋</h2>
            <p>Kelola persetujuan dan laporan peminjaman hari ini.</p>
        </div>
    </div>

    <!-- Stat -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon v1"><i class="fas fa-hourglass-half"></i></div>
                <h3><?= $data['total_pending']; ?></h3>
                <p>Menunggu Persetujuan</p>
                <span class="stat-trend"><i class="fas fa-bell"></i> Perlu ditindaklanjuti</span>
            </div>
        </div>
    </div>

    <!-- Menu Navigasi -->
    <p class="section-title"><i class="fas fa-th-large me-2" style="color:#6d28d9;"></i> Menu Utama</p>
    <div class="row g-3">
        <div class="col-md-6">
            <a href="<?= BASEURL; ?>/PetugasController/persetujuan" class="menu-card">
                <div class="menu-icon m1"><i class="fas fa-check-double"></i></div>
                <div>
                    <h5>Persetujuan Peminjaman</h5>
                    <p>Konfirmasi dan setujui pengajuan peminjaman alat dari member.</p>
                </div>
                <i class="fas fa-chevron-right menu-arrow"></i>
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?= BASEURL; ?>/PetugasController/laporan" class="menu-card">
                <div class="menu-icon m2"><i class="fas fa-chart-bar"></i></div>
                <div>
                    <h5>Laporan Transaksi</h5>
                    <p>Lihat riwayat seluruh peminjaman dan cetak laporan.</p>
                </div>
                <i class="fas fa-chevron-right menu-arrow"></i>
            </a>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
