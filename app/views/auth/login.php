<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0f172a 100%);
            min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;
        }
        .login-wrap { display: flex; width: 100%; max-width: 860px; border-radius: 24px; overflow: hidden; box-shadow: 0 24px 60px rgba(0,0,0,0.4); }
        .login-left {
            flex: 1; background: linear-gradient(160deg, #6d28d9, #4c1d95);
            padding: 48px 40px; display: flex; flex-direction: column; justify-content: center; color: #fff;
        }
        .login-left .logo { width: 52px; height: 52px; background: rgba(255,255,255,0.2); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 28px; }
        .login-left h2 { font-weight: 800; font-size: 1.8rem; margin: 0 0 10px; }
        .login-left p { opacity: 0.8; font-size: 0.9rem; line-height: 1.6; margin: 0; }
        .login-right { flex: 1; background: #fff; padding: 48px 40px; }
        .login-right h3 { font-weight: 700; color: #0f172a; margin: 0 0 6px; font-size: 1.4rem; }
        .login-right p { color: #64748b; font-size: 0.875rem; margin: 0 0 28px; }
        .form-label { font-size: 0.82rem; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .input-group-text { background: #f9fafb; border: 1.5px solid #e5e7eb; border-right: none; border-radius: 10px 0 0 10px; color: #9ca3af; }
        .form-control { border: 1.5px solid #e5e7eb; border-left: none; border-radius: 0 10px 10px 0; padding: 10px 14px; font-size: 0.9rem; }
        .form-control:focus { border-color: #7c3aed; box-shadow: none; }
        .input-group:focus-within .input-group-text { border-color: #7c3aed; }
        .toggle-btn { background: #f9fafb; border: 1.5px solid #e5e7eb; border-left: none; border-radius: 0 10px 10px 0; color: #9ca3af; cursor: pointer; padding: 0 14px; transition: 0.2s; }
        .toggle-btn:hover { color: #6d28d9; }
        .input-group:focus-within .toggle-btn { border-color: #7c3aed; }
        .btn-login {
            background: linear-gradient(135deg, #6d28d9, #4c1d95);
            border: none; border-radius: 12px; padding: 14px;
            font-weight: 700; color: #fff; width: 100%; font-size: 1rem; margin-top: 8px;
            box-shadow: 0 4px 16px rgba(109,40,217,0.4); transition: 0.25s;
            display: flex; align-items: center; justify-content: center; gap: 10px;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(109,40,217,0.5); color: #fff; }
        .btn-login:active { transform: translateY(0); }
        .register-link { text-align: center; margin-top: 20px; font-size: 0.875rem; color: #64748b; }
        .register-link a { color: #6d28d9; font-weight: 600; text-decoration: none; }
        .register-link a:hover { text-decoration: underline; }
        @media (max-width: 640px) { .login-left { display: none; } .login-wrap { max-width: 420px; } }
    </style>
</head>
<body>

<div class="login-wrap">
    <div class="login-left">
        <div class="logo"><i class="fas fa-guitar"></i></div>
        <h2>MusicRent</h2>
        <p>Platform peminjaman alat musik yang mudah, cepat, dan terpercaya untuk semua kalangan.</p>
    </div>
    <div class="login-right">
        <h3>Selamat Datang</h3>
        <p>Masuk ke akun Anda untuk melanjutkan</p>

        <form action="<?= BASEURL; ?>/AuthController/prosesLogin" method="POST" autocomplete="off">
            <input type="text" style="display:none;" name="fakeuser">
            <input type="password" style="display:none;" name="fakepass">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user fa-sm"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autocomplete="new-password">
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock fa-sm"></i></span>
                    <input type="password" name="password" id="loginPass" class="form-control" placeholder="Masukkan password" required autocomplete="new-password">
                    <button type="button" class="toggle-btn" id="toggleLogin">
                        <i class="fas fa-eye fa-sm" id="eyeLogin"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="<?= BASEURL; ?>/AuthController/register">Daftar di sini</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('toggleLogin').addEventListener('click', function() {
        const input = document.getElementById('loginPass');
        const icon  = document.getElementById('eyeLogin');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
            icon.style.color = '#6d28d9';
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
            icon.style.color = '';
        }
    });
</script>
</body>
</html>
