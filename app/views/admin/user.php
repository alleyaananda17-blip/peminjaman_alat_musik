<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?> - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

        /* Main */
        .main-content { margin-left: 260px; padding: 32px; min-height: 100vh; }
        .topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 28px; }
        .topbar h2 { font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0; }
        .topbar p { color: #64748b; margin: 4px 0 0; font-size: 0.875rem; }

        /* Stat bar */
        .stat-bar { display: flex; gap: 16px; margin-bottom: 28px; flex-wrap: wrap; }
        .stat-pill {
            background: #fff; border-radius: 16px; padding: 20px 28px;
            display: flex; align-items: center; gap: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 12px rgba(0,0,0,0.04);
            flex: 1; min-width: 160px;
            transition: 0.25s; cursor: default;
        }
        .stat-pill:hover { transform: translateY(-5px); box-shadow: 0 10px 28px rgba(109,40,217,0.15); }
        .stat-pill .pill-icon { width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; }
        .stat-pill .pill-icon.dark  { background: #4c1d95; color: #fff; }
        .stat-pill .pill-icon.mid   { background: #ede9fe; color: #4c1d95; }
        .stat-pill .pill-icon.light { background: #f5f3ff; color: #6d28d9; }
        .stat-pill strong { font-size: 1.8rem; font-weight: 800; color: #0f172a; line-height: 1; }
        .stat-pill span { font-size: 0.9rem; color: #64748b; font-weight: 500; }

        /* User Card */
        .user-card {
            background: #fff; border-radius: 18px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.05);
            padding: 28px 20px 22px; text-align: center;
            transition: 0.25s; border: 1.5px solid transparent;
            position: relative; overflow: hidden;
        }
        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 32px rgba(109,40,217,0.13);
            border-color: #ddd6fe;
        }
        .user-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0;
            height: 4px;
        }
        .user-card.card-admin::before   { background: linear-gradient(90deg, #4c1d95, #7c3aed); }
        .user-card.card-petugas::before { background: linear-gradient(90deg, #6d28d9, #a78bfa); }
        .user-card.card-peminjam::before{ background: linear-gradient(90deg, #8b5cf6, #c4b5fd); }

        /* Avatar */
        .user-avatar {
            width: 72px; height: 72px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.6rem; font-weight: 800; margin: 0 auto 14px;
            position: relative;
        }
        .user-avatar.av-admin   { background: linear-gradient(135deg, #4c1d95, #7c3aed); color: #fff; }
        .user-avatar.av-petugas { background: linear-gradient(135deg, #6d28d9, #a78bfa); color: #fff; }
        .user-avatar.av-peminjam{ background: linear-gradient(135deg, #8b5cf6, #ddd6fe); color: #4c1d95; }

        .avatar-ring {
            position: absolute; inset: -4px; border-radius: 50%;
            border: 2px solid transparent;
        }
        .av-admin   .avatar-ring { border-color: #7c3aed; }
        .av-petugas .avatar-ring { border-color: #a78bfa; }
        .av-peminjam .avatar-ring { border-color: #c4b5fd; }

        .user-name { font-weight: 700; font-size: 1rem; color: #0f172a; margin: 0 0 10px; }

        /* Role badge */
        .role-badge {
            display: inline-flex; align-items: center; gap: 7px;
            border-radius: 20px; padding: 9px 20px;
            font-size: 0.85rem; font-weight: 700; letter-spacing: 0.5px;
        }
        .role-admin   { background: #4c1d95; color: #fff; }
        .role-petugas { background: #ede9fe; color: #4c1d95; border: 1.5px solid #c4b5fd; }
        .role-peminjam{ background: #f5f3ff; color: #6d28d9; border: 1.5px solid #ddd6fe; }

        /* No badge */
        .no-badge {
            position: absolute; top: 14px; right: 14px;
            width: 24px; height: 24px; border-radius: 50%;
            background: #f1f5f9; color: #94a3b8;
            font-size: 0.7rem; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
        }
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
        <a href="<?= BASEURL; ?>/AdminController/user" class="active"><i class="fas fa-users"></i> Manajemen User</a>
        <a href="<?= BASEURL; ?>/AdminController/peminjaman"><i class="fas fa-exchange-alt"></i> Peminjaman</a>
        <a href="<?= BASEURL; ?>/AdminController/log"><i class="fas fa-clipboard-list"></i> Log Aktivitas</a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <div>
            <h2>Manajemen Pengguna</h2>
            <p>Daftar akun yang terdaftar dalam sistem.</p>
        </div>
        <span style="background:#ede9fe;color:#4c1d95;border-radius:12px;padding:8px 18px;font-size:0.82rem;font-weight:700;">
            <i class="fas fa-users me-2"></i><?= count($data['users']); ?> Pengguna
        </span>
    </div>

    <?php
        $total_admin    = count(array_filter($data['users'], fn($u) => strtolower($u['role']) == 'admin'));
        $total_petugas  = count(array_filter($data['users'], fn($u) => strtolower($u['role']) == 'petugas'));
        $total_peminjam = count(array_filter($data['users'], fn($u) => strtolower($u['role']) == 'peminjam'));
    ?>
    <div class="stat-bar">
        <div class="stat-pill">
            <div class="pill-icon dark"><i class="fas fa-shield-alt"></i></div>
            <div><strong><?= $total_admin; ?></strong><br><span>Admin</span></div>
        </div>
        <div class="stat-pill">
            <div class="pill-icon mid"><i class="fas fa-user-tie"></i></div>
            <div><strong><?= $total_petugas; ?></strong><br><span>Petugas</span></div>
        </div>
        <div class="stat-pill">
            <div class="pill-icon light"><i class="fas fa-user"></i></div>
            <div><strong><?= $total_peminjam; ?></strong><br><span>Peminjam</span></div>
        </div>
    </div>

    <div class="row g-3">
        <?php $i = 1; foreach($data['users'] as $u) : ?>
        <?php $role = strtolower($u['role']); ?>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="user-card card-<?= $role; ?>">
                <div class="no-badge"><?= $i++; ?></div>
                <div class="user-avatar av-<?= $role; ?>">
                    <div class="avatar-ring"></div>
                    <?= strtoupper(substr($u['username'], 0, 1)); ?>
                </div>
                <p class="user-name"><?= $u['username']; ?></p>
                <?php if($role == 'admin') : ?>
                    <span class="role-badge role-admin"><i class="fas fa-shield-alt"></i> ADMIN</span>
                <?php elseif($role == 'petugas') : ?>
                    <span class="role-badge role-petugas"><i class="fas fa-user-tie"></i> PETUGAS</span>
                <?php else : ?>
                    <span class="role-badge role-peminjam"><i class="fas fa-user"></i> PEMINJAM</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
