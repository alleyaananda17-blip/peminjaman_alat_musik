<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Alat - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; }
        .topbar h2 { font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0; }
        .topbar p { color: #64748b; margin: 4px 0 0; font-size: 0.875rem; }
        .user-chip { background: #fff; border: 1.5px solid #e5e7eb; border-radius: 20px; padding: 6px 16px; font-size: 0.82rem; font-weight: 600; color: #374151; display: flex; align-items: center; gap: 8px; }
        .alat-card { background: #fff; border-radius: 16px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.04); transition: 0.25s; border: 1.5px solid transparent; }
        .alat-card:hover { transform: translateY(-4px); box-shadow: 0 8px 28px rgba(0,0,0,0.1); border-color: #ddd6fe; }
        .alat-icon { width: 64px; height: 64px; border-radius: 18px; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; margin-bottom: 16px; }
        .alat-card h5 { font-weight: 700; color: #0f172a; margin: 0 0 6px; font-size: 1rem; }
        .stok-badge { background: #dcfce7; color: #166534; border-radius: 20px; padding: 3px 10px; font-size: 0.75rem; font-weight: 600; }
        .stok-badge.habis { background: #fee2e2; color: #991b1b; }
        .btn-pinjam { background: #6d28d9; border: none; border-radius: 10px; padding: 10px; font-weight: 600; color: #fff; width: 100%; margin-top: 16px; transition: 0.2s; font-size: 0.875rem; }
        .btn-pinjam:hover { background: #4c1d95; }
        .btn-pinjam:disabled { background: #d1d5db; cursor: not-allowed; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <h4><div class="brand-icon"><i class="fas fa-guitar fa-sm text-white"></i></div> MusicRent</h4>
    </div>
    <div class="sidebar-label">Menu</div>
    <nav>
        <a href="<?= BASEURL; ?>/PeminjamController" class="active"><i class="fas fa-th-large"></i> Daftar Alat</a>
        <a href="<?= BASEURL; ?>/PeminjamController/riwayat"><i class="fas fa-history"></i> Riwayat Pinjam</a>
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
            <h2>Pilih Alat Musik</h2>
            <p>Temukan alat musik yang ingin kamu pinjam.</p>
        </div>
        <div class="user-chip">
            <i class="fas fa-user-circle" style="color:#7c3aed;"></i>
            <?= $_SESSION['nama']; ?>
        </div>
    </div>

    <div class="row g-3">
        <?php
        function getAlatEmoji($nama) {
            $nama = strtolower($nama);
            if (str_contains($nama, 'gitar') || str_contains($nama, 'guitar')) return ['icon' => 'fa-guitar', 'bg' => '#ede9fe', 'color' => '#6d28d9'];
            if (str_contains($nama, 'piano') || str_contains($nama, 'keyboard')) return ['icon' => 'fa-music', 'bg' => '#e0e7ff', 'color' => '#4338ca'];
            if (str_contains($nama, 'drum') || str_contains($nama, 'perkusi') || str_contains($nama, 'kendang') || str_contains($nama, 'gendang')) return ['icon' => 'fa-drum', 'bg' => '#fce7f3', 'color' => '#9d174d'];
            if (str_contains($nama, 'biola') || str_contains($nama, 'violin')) return ['icon' => 'fa-violin', 'bg' => '#fef3c7', 'color' => '#92400e'];
            if (str_contains($nama, 'suling') || str_contains($nama, 'flute') || str_contains($nama, 'seruling')) return ['icon' => 'fa-wind', 'bg' => '#d1fae5', 'color' => '#065f46'];
            if (str_contains($nama, 'terompet') || str_contains($nama, 'trumpet')) return ['icon' => 'fa-bullhorn', 'bg' => '#fef9c3', 'color' => '#854d0e'];
            if (str_contains($nama, 'saksofon') || str_contains($nama, 'saxophone') || str_contains($nama, 'saxofon')) return ['icon' => 'fa-music', 'bg' => '#fce7f3', 'color' => '#be185d'];
            if (str_contains($nama, 'bass')) return ['icon' => 'fa-guitar', 'bg' => '#ede9fe', 'color' => '#4c1d95'];
            if (str_contains($nama, 'ukulele') || str_contains($nama, 'ukelele')) return ['icon' => 'fa-guitar', 'bg' => '#fef3c7', 'color' => '#b45309'];
            if (str_contains($nama, 'kecapi') || str_contains($nama, 'harpa') || str_contains($nama, 'harp')) return ['icon' => 'fa-music', 'bg' => '#ede9fe', 'color' => '#7c3aed'];
            if (str_contains($nama, 'angklung')) return ['icon' => 'fa-bell', 'bg' => '#d1fae5', 'color' => '#047857'];
            if (str_contains($nama, 'gamelan')) return ['icon' => 'fa-drum', 'bg' => '#fef3c7', 'color' => '#92400e'];
            if (str_contains($nama, 'sasando')) return ['icon' => 'fa-music', 'bg' => '#e0f2fe', 'color' => '#0369a1'];
            if (str_contains($nama, 'harmonika')) return ['icon' => 'fa-wind', 'bg' => '#ede9fe', 'color' => '#6d28d9'];
            if (str_contains($nama, 'marakas') || str_contains($nama, 'tamborin')) return ['icon' => 'fa-music', 'bg' => '#fce7f3', 'color' => '#9d174d'];
            return ['icon' => 'fa-music', 'bg' => '#ede9fe', 'color' => '#6d28d9'];
        }
        ?>
        <?php foreach($data['alat'] as $alt) : ?>
        <?php $icon = getAlatEmoji($alt['nama_alat']); ?>
        <div class="col-md-4 col-sm-6">
            <div class="alat-card">
                <div class="alat-icon" style="background:<?= $icon['bg']; ?>;">
                    <i class="fas <?= $icon['icon']; ?>" style="color:<?= $icon['color']; ?>;"></i>
                </div>
                <h5><?= $alt['nama_alat']; ?></h5>
                <span class="stok-badge <?= ($alt['stok'] == 0) ? 'habis' : ''; ?>">
                    <?= ($alt['stok'] > 0) ? $alt['stok'].' unit tersedia' : 'Stok habis'; ?>
                </span>
                <?php if($alt['stok'] > 0) : ?>
                    <a href="<?= BASEURL; ?>/PeminjamController/pinjam/<?= $alt['id_alat']; ?>" class="btn-pinjam d-block text-center text-decoration-none">
                        <i class="fas fa-hand-holding me-2"></i> Pinjam Sekarang
                    </a>
                <?php else : ?>
                    <button class="btn-pinjam" disabled>Stok Habis</button>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
