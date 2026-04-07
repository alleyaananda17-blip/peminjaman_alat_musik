<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pinjam - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .card-confirm { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .instrument-name { color: #0d6efd; font-weight: 700; font-size: 1.5rem; }
        .btn-confirm { border-radius: 12px; padding: 12px; font-weight: 600; transition: 0.3s; }
        .btn-confirm:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3); }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card card-confirm p-4">
                <div class="card-body">
                    <h3 class="fw-bold text-dark mb-4 text-center">Konfirmasi Peminjaman</h3>
                    <div class="alert alert-info border-0 rounded-4 mb-4">
                        <small class="d-block text-uppercase fw-bold opacity-75">Alat Musik Pilihan:</small>
                        <span class="instrument-name"><?= $data['alat']['nama_alat']; ?></span>
                    </div>

                    <p class="text-muted small mb-4">
                        <i class="bi bi-info-circle me-1"></i> 
                        Pastikan Anda merawat alat musik ini dan mengembalikannya tepat waktu untuk menghindari denda.
                    </p>

                    <form action="<?= BASEURL; ?>/PeminjamController/prosesPinjam" method="POST">
                        <input type="hidden" name="id_alat" value="<?= $data['alat']['id_alat']; ?>">
                        <input type="hidden" name="id_user" value="<?= $_SESSION['id_user']; ?>">

                        <div class="mb-4">
                            <label class="form-label fw-bold small">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control form-control-lg border-0 bg-light rounded-3" 
                                   value="<?= date('Y-m-d'); ?>" readonly>
                        </div>

                        <div class="row g-2">
                            <div class="col-4">
                                <a href="<?= BASEURL; ?>/PeminjamController" class="btn btn-light w-100 py-3 rounded-3 fw-bold">Batal</a>
                            </div>
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary btn-confirm w-100 py-3">Konfirmasi Pinjam</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>