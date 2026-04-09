<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">

<div class="container mt-5">
    <h2 class="text-center">LAPORAN PEMINJAMAN ALAT MUSIK</h2>
    <h5 class="text-center mb-4">MusicRent - Melodi Pinjam</h5>
    <hr>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Alat Musik</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($data['pinjam'] as $p) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $p['nama_lengkap'] ?: '(nama belum diisi)'; ?></td>
                <td><?= $p['nama_alat']; ?></td>
                <td><?= $p['tgl_pinjam']; ?></td>
                <td><?= strtoupper($p['status']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-end mt-5">
        <p>Dicetak pada: <?= date('d-m-Y H:i'); ?></p>
        <br><br>
        <p>____________________<br>Petugas Inventaris</p>
    </div>

    <div class="no-print text-center mt-4">
        <button onclick="window.print()" class="btn btn-primary">Klik Cetak Lagi</button>
        <a href="<?= BASEURL; ?>/PetugasController/laporan" class="btn btn-secondary">Kembali</a>
    </div>
</div>

</body>
</html>