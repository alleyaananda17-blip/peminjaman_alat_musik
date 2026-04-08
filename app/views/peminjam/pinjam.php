<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pinjam - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body { background: #f0f2f5; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 32px 16px; }
        .confirm-card { background: #fff; border-radius: 20px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); width: 100%; max-width: 440px; overflow: hidden; }
        .confirm-header { background: linear-gradient(135deg, #6d28d9, #4c1d95); padding: 28px 32px; text-align: center; }
        .confirm-header .icon { width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin: 0 auto 12px; }
        .confirm-header h4 { color: #fff; font-weight: 700; margin: 0; font-size: 1.2rem; }
        .confirm-body { padding: 28px 32px; }
        .alat-info { background: #f5f3ff; border: 1.5px solid #ddd6fe; border-radius: 12px; padding: 16px 20px; margin-bottom: 20px; }
        .alat-info small { font-size: 0.75rem; font-weight: 600; color: #5b21b6; text-transform: uppercase; letter-spacing: 0.5px; }
        .alat-info h5 { font-weight: 700; color: #0f172a; margin: 4px 0 0; font-size: 1.1rem; }
        .form-label { font-size: 0.82rem; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-control { border-radius: 10px; border: 1.5px solid #e5e7eb; padding: 10px 14px; font-size: 0.9rem; background: #f9fafb; }
        .form-control:focus { border-color: #7c3aed; box-shadow: 0 0 0 3px rgba(124,58,237,0.12); }
        .info-note { background: #f5f3ff; border-left: 3px solid #7c3aed; border-radius: 0 8px 8px 0; padding: 12px 16px; font-size: 0.82rem; color: #4c1d95; margin-bottom: 24px; }
        .btn-confirm { background: #6d28d9; border: none; border-radius: 10px; padding: 12px; font-weight: 700; color: #fff; width: 100%; transition: 0.2s; font-size: 0.95rem; }
        .btn-confirm:hover { background: #4c1d95; transform: translateY(-1px); }
        .btn-cancel { background: #f3f4f6; border: none; border-radius: 10px; padding: 12px; font-weight: 500; color: #374151; width: 100%; transition: 0.2s; text-decoration: none; display: block; text-align: center; font-size: 0.9rem; }
        .btn-cancel:hover { background: #e5e7eb; color: #111827; }
    </style>
</head>
<body>

<div class="confirm-card">
    <div class="confirm-header">
        <div class="icon">🎸</div>
        <h4>Konfirmasi Peminjaman</h4>
    </div>
    <div class="confirm-body">
        <div class="alat-info">
            <small>Alat Musik Pilihan</small>
            <h5><?= $data['alat']['nama_alat']; ?></h5>
        </div>

        <div class="info-note">
            <i class="fas fa-info-circle me-2"></i>
            Pastikan kamu merawat alat ini dan mengembalikannya tepat waktu.
        </div>

        <form action="<?= BASEURL; ?>/PeminjamController/prosesPinjam" method="POST">
            <input type="hidden" name="id_alat" value="<?= $data['alat']['id_alat']; ?>">
            <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

            <div class="mb-4">
                <label class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn-confirm">
                    <i class="fas fa-check me-2"></i> Konfirmasi Pinjam
                </button>
                <a href="<?= BASEURL; ?>/PeminjamController" class="btn-cancel">
                    <i class="fas fa-arrow-left me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
