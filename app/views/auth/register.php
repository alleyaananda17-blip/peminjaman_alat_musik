<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* Gradasi latar belakang biru disesuaikan dengan image_1.png */
            background: linear-gradient(135deg, #1a4888 0%, #10297c 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .register-card {
            background: white;
            padding: 50px;
            border-radius: 25px; /* Sudut membulat besar seperti image_1.png */
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px; /* Lebar card disesuaikan */
            text-align: center;
        }
        .brand-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: #120c64;
            margin-bottom: 5px;
        }
        .brand-subtitle {
            font-size: 1rem;
            color: #7f8c8d;
            margin-bottom: 40px;
        }
        .form-label {
            font-weight: 500;
            color: #34495e;
            display: flex;
            margin-bottom: 8px;
        }
        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            background-color: #fcfcfc;
            margin-bottom: 20px;
        }
        .form-control:focus {
            border-color: #3a7bd5;
            box-shadow: 0 0 0 0.2rem rgba(58, 123, 213, 0.25);
        }
        .btn-register {
            background: #3a7bd5; /* Warna tombol biru seperti image_1.png */
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px;
            width: 100%;
            font-weight: 600;
            font-size: 1.1rem;
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn-register:hover {
            background: #043881;
            transform: translateY(-2px);
        }
        .login-link {
            margin-top: 25px;
            font-size: 0.95rem;
            color: #7f8c8d;
        }
        .login-link a {
            color: #3a7bd5;
            text-decoration: none;
            font-weight: 500;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="register-card">
        <div class="brand-title">MusicRent</div>
        <div class="brand-subtitle">Silakan lengkapi data untuk mendaftar</div>

        <form action="<?= BASEURL; ?>/AuthController/prosesRegister" method="post">
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required autocomplete="off">
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn-register">Daftar Sekarang</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="<?= BASEURL; ?>/AuthController/login">Login di sini</a>
        </div>
    </div>

</body>
</html>