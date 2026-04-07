<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        body { background-color: #f4f7f6; }
        .sidebar { background-color: #1a3a5f; min-height: 100vh; color: white; position: fixed; width: 16.666667%; }
        .sidebar a { color: rgba(255,255,255,0.7); text-decoration: none; padding: 15px 25px; display: block; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.1); color: white; border-left: 5px solid #0d6efd; }
        .main-content { margin-left: 16.666667%; padding: 40px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <div class="p-4 mb-3">
                <h4 class="fw-bold"><i class="fas fa-guitar me-2"></i> MusicRent</h4>
            </div>
            <nav>
                <a href="<?= BASEURL; ?>/AdminController"><i class="fas fa-home me-2"></i> Dashboard</a>
                <a href="<?= BASEURL; ?>/AdminController/user" class="active"><i class="fas fa-users me-2"></i> Manajemen User</a>
                <a href="<?= BASEURL; ?>/AdminController/peminjaman" class="<?= ($data['judul'] == 'Daftar Peminjaman') ? 'active' : ''; ?>">
                    <i class="fas fa-history me-2"></i> Peminjaman
                </a>
                <a href="<?= BASEURL; ?>/AdminController/log"><i class="fas fa-list me-2"></i> Log Aktivitas</a>
                <div class="mt-5">
                    <a href="<?= BASEURL; ?>/AuthController/logout" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
                </div>
            </nav>
        </div>

        <div class="col-md-10 main-content">
            <div class="mb-4">
                <h2 class="fw-bold text-dark">Manajemen Pengguna</h2>
                <p class="text-muted">Daftar akun yang terdaftar dalam sistem.</p>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3" style="width: 10%">No</th>
                                    <th style="width: 45%">Username</th>
                                    <th style="width: 25%">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($data['users'] as $u) : ?>
                                <tr>
                                    <td class="ps-4"><?= $i++; ?></td>
                                    <td class="fw-bold text-dark">
                                        <i class="fas fa-user-circle me-2 text-primary"></i>
                                        <?= $u['username']; ?>
                                    </td>
                                    <td>
                                        <span class="badge <?= ($u['role'] == 'admin') ? 'bg-primary' : 'bg-info text-dark'; ?>">
                                            <?= strtoupper($u['role']); ?>
                                        </span>
                                    </td>
                                    
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>