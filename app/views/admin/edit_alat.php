<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <style>
        body { 
            background-color: #1a3a5f; /* Biru gelap sesuai tema Dashboard */
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .card { 
            border: none; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .card-header { 
            border-radius: 15px 15px 0 0 !important; 
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            
            <div class="card">
                <div class="card-header bg-primary text-white p-3 text-center">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Data Alat</h4>
                </div>
                
                <div class="card-body p-4">
                    <p class="text-muted text-center mb-4">Ubah informasi alat musik di bawah ini</p>
                    
                    <form action="<?= BASEURL; ?>/AdminController/edit_alat" method="post">
                        <input type="hidden" name="id_alat" value="<?= $data['alat']['id_alat']; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Alat Musik</label>
                            <input type="text" name="nama_alat" class="form-control form-control-lg" 
                                   value="<?= $data['alat']['nama_alat']; ?>" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Stok</label>
                                <div class="input-group">
                                    <input type="number" name="stok" class="form-control" 
                                           value="<?= $data['alat']['stok']; ?>" min="0" required>
                                    <span class="input-group-text bg-light">Unit</span>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select name="kategori_id" class="form-select" required>
                                    <?php foreach($data['kategori'] as $k) : ?>
                                        <option value="<?= $k['id_kategori']; ?>" 
                                            <?= ($k['id_kategori'] == $data['alat']['kategori_id']) ? 'selected' : ''; ?>>
                                            <?= $k['nama_kategori']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <hr class="my-4">
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg shadow">
                                <i class="fas fa-save me-2"></i>Simpan Perubahan
                            </button>
                            <a href="<?= BASEURL; ?>/AdminController" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer text-center py-3 bg-light" style="border-radius: 0 0 15px 15px;">
                    <small class="text-muted">ID Alat: #<?= $data['alat']['id_alat']; ?></small>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>