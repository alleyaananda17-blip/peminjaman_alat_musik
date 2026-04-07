<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; font-family: 'Inter', sans-serif; }
        .sidebar { background-color: #1a3a5f; min-height: 100vh; color: white; position: fixed; width: 16.66%; }
        .sidebar a { color: rgba(255,255,255,0.7); text-decoration: none; padding: 15px 25px; display: block; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.1); color: white; border-left: 5px solid #0d6efd; }
        .main-content { margin-left: 16.66%; padding: 40px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .badge-pending { background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar">
        <div class="p-4">
            <h3 class="fw-bold mb-0">MusicRent</h3>
        </div>
        <nav class="nav flex-column mt-3">
            <a class="nav-link" href="<?= BASEURL; ?>/PetugasController/index">Dashboard</a>
            <a class="nav-link" href="<?= BASEURL; ?>/PetugasController/persetujuan">Persetujuan</a>
            <a class="nav-link active" href="<?= BASEURL; ?>/PetugasController/laporan">Laporan</a>
            
            <div style="margin-top: 100px;">
                <a class="nav-link text-danger" href="<?= BASEURL; ?>/Auth/logout">Keluar</a>
            </div>
        </nav>
    </div>

    <div class="main-content w-100">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold m-0">Laporan Transaksi</h1>
                <p class="text-muted">Riwayat penyewaan alat musik oleh member.</p>
            </div>
            <a href="<?= BASEURL; ?>/PetugasController/cetak" target="_blank" class="btn btn-success px-4 py-2 shadow-sm">
                Cetak Laporan
            </a>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr class="text-muted">
                                <th width="60">No</th>
                                <th>Nama Peminjam</th>
                                <th>Alat Musik</th>
                                <th>Tanggal Pinjam</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($data['pinjam'] as $p) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td class="fw-bold text-primary"><?= $p['nama_lengkap']; ?></td>
                                <td><?= $p['nama_alat']; ?></td>
                                <td><?= date('d M Y', strtotime($p['tgl_pinjam'])); ?></td>
                                <td class="text-center">
                                    <?php if($p['status'] == 'dipinjam') : ?>
                                        <span class="badge bg-warning text-dark rounded-pill badge-status">DIPINJAM</span>
                                    <?php else : ?>
                                        <span class="badge bg-success rounded-pill badge-status text-uppercase"><?= $p['status']; ?></span>
                                    <?php endif; ?>
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

</body>
</html>