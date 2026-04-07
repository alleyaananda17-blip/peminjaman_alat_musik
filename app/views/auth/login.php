<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            background: white;
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        .login-card h2 {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            border-color: #3498db;
        }
        .btn-login {
            background-color: #3498db;
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-login:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        .footer-text {
            font-size: 0.9rem;
            color: #7f8c8d;
        }
        .footer-text a {
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-4">
        <h2>MusicRent</h2>
        <p class="text-muted">Silakan masuk ke akun Anda</p>
    </div>

    <form action="<?= BASEURL; ?>/AuthController/prosesLogin" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label small fw-bold">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required autocomplete="off">
        </div>
        
        <div class="mb-4">
            <label for="password" class="form-label small fw-bold">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-login w-100 mb-3 text-white">Login</button>
    </form>

    <p>Belum punya akun? <a href="<?= BASEURL; ?>/AuthController/register">Daftar di sini</a></p>
</div>

</body>
</html>