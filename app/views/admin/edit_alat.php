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
        body { background: #f0f2f5; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 32px 16px; }
        .form-card { background: #fff; border-radius: 20px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); width: 100%; max-width: 480px; overflow: hidden; }
        .form-card-header { background: linear-gradient(135deg, #4c1d95, #6d28d9); padding: 28px 32px; }
        .form-card-header h4 { color: #fff; font-weight: 700; margin: 0; font-size: 1.2rem; }
        .form-card-header p { color: rgba(255,255,255,0.75); margin: 4px 0 0; font-size: 0.85rem; }
        .form-card-body { padding: 28px 32px; }
        .form-label { font-size: 0.82rem; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-control, .form-select { border-radius: 10px; border: 1.5px solid #e5e7eb; padding: 10px 14px; font-size: 0.9rem; transition: 0.2s; }
        .form-control:focus, .form-select:focus { border-color: #6d28d9; box-shadow: 0 0 0 3px rgba(109,40,217,0.12); }
        .input-group-text { border-radius: 0 10px 10px 0; border: 1.5px solid #e5e7eb; border-left: none; background: #f9fafb; color: #6b7280; font-size: 0.85rem; }
        .btn-submit { background: #6d28d9; border: none; border-radius: 10px; padding: 12px; font-weight: 600; color: #fff; width: 100%; transition: 0.2s; }
        .btn-submit:hover { background: #4c1d95; transform: translateY(-1px); box-shadow: 0 4px 14px rgba(109,40,217,0.4); }
        .btn-back { background: #f3f4f6; border: none; border-radius: 10px; padding: 12px; font-weight: 500; color: #374151; width: 100%; transition: 0.2s; text-decoration: none; display: block; text-align: center; }
        .btn-back:hover { background: #e5e7eb; color: #111827; }
    </style>
</head>
<body>

<div class="form-card">
    <div class="form-card-header">
        <h4><i class="fas fa-pen me-2"></i> Edit Data Alat</h4>
        <p>Ubah informasi alat musik di bawah ini</p>
    </div>
    <div class="form-card-body">
        <form action="<?= BASEURL; ?>/AdminController/edit_alat" method="post">
            <input type="hidden" name="id_alat" value="<?= $data['alat']['id_alat']; ?>">
            <div class="mb-4">
                <label class="form-label">Nama Alat Musik</label>
                <input type="text" name="nama_alat" class="form-control" value="<?= $data['alat']['nama_alat']; ?>" required>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <label class="form-label">Stok</label>
                    <div class="input-group">
                        <input type="number" name="stok" class="form-control" value="<?= $data['alat']['stok']; ?>" min="0" required style="border-radius:10px 0 0 10px;">
                        <span class="input-group-text">Unit</span>
                    </div>
                </div>
                <div class="col-6">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-select" required>
                        <?php foreach($data['kategori'] as $k) : ?>
                            <option value="<?= $k['id_kategori']; ?>" <?= ($k['id_kategori'] == $data['alat']['kategori_id']) ? 'selected' : ''; ?>>
                                <?= $k['nama_kategori']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn-submit"><i class="fas fa-save me-2"></i>Simpan Perubahan</button>
                <a href="<?= BASEURL; ?>/AdminController" class="btn-back"><i class="fas fa-arrow-left me-2"></i>Batal</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
