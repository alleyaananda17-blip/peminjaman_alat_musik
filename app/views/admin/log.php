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
        .topbar { margin-bottom: 28px; }
        .topbar h2 { font-size: 1.5rem; font-weight: 700; color: #0f172a; margin: 0; }
        .topbar p { color: #64748b; margin: 4px 0 0; font-size: 0.875rem; }
        .table-card { background: #fff; border-radius: 16px; box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 4px 16px rgba(0,0,0,0.04); overflow: hidden; }
        .table-card-header { padding: 20px 24px; border-bottom: 1px solid #f1f5f9; }
        .table-card-header h5 { font-weight: 600; color: #0f172a; margin: 0; }
        .table thead th { background: #f8fafc; color: #64748b; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; padding: 12px 16px; border: none; }
        .table tbody td { padding: 14px 16px; border-color: #f1f5f9; vertical-align: middle; }
        .table tbody tr:hover { background: #fafbfc; }
        .log-dot { width: 8px; height: 8px; border-radius: 50%; background: #6d28d9; display: inline-block; margin-right: 8px; flex-shrink: 0; }
        .user-badge {
            display: inline-flex; align-items: center; gap: 6px;
            background: #4c1d95; color: #fff;
            border-radius: 20px; padding: 5px 14px;
            font-size: 0.72rem; font-weight: 700; letter-spacing: 0.5px;
        }
        .user-badge i { font-size: 0.65rem; opacity: 0.85; }
        .log-message { display: flex; align-items: center; }
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
        <a href="<?= BASEURL; ?>/AdminController/peminjaman"><i class="fas fa-exchange-alt"></i> Peminjaman</a>
        <a href="<?= BASEURL; ?>/AdminController/log" class="active"><i class="fas fa-clipboard-list"></i> Log Aktivitas</a>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= BASEURL; ?>/AuthController/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <h2>Log Aktivitas</h2>
        <p>Pantau seluruh catatan sistem dan aktivitas pengguna.</p>
    </div>

    <div class="table-card">
        <div class="table-card-header">
            <h5>Riwayat Aktivitas</h5>
        </div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width:60px">No</th>
                        <th>Waktu</th>
                        <th>User</th>
                        <th>Aktivitas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data['logs'])) : ?>
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-2x mb-2 d-block opacity-30"></i>
                                Belum ada data log aktivitas.
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1; foreach($data['logs'] as $log) : ?>
                    <tr>
                        <td class="fw-semibold text-muted"><?= $i++; ?></td>
                        <td>
                            <div class="fw-semibold text-dark small"><?= date('d M Y', strtotime($log['waktu'])); ?></div>
                            <div class="text-muted" style="font-size:0.75rem;"><?= date('H:i', strtotime($log['waktu'])); ?> WIB</div>
                        </td>
                        <td>
                            <span class="user-badge">
                                <i class="fas fa-user"></i>
                                <?= strtoupper($log['username']); ?>
                            </span>
                        </td>
                        <td>
                            <div class="log-message">
                                <span class="log-dot"></span>
                                <span class="text-dark"><?= $log['pesan']; ?></span>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
