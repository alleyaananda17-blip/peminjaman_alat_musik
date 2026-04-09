<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - MusicRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0f172a 100%);
            min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;
        }
        .register-card { background: #fff; border-radius: 20px; box-shadow: 0 24px 60px rgba(0,0,0,0.35); width: 100%; max-width: 440px; overflow: hidden; }
        .register-header { background: linear-gradient(135deg, #6d28d9, #4c1d95); padding: 32px; text-align: center; }
        .register-header .logo { width: 52px; height: 52px; background: rgba(255,255,255,0.2); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; margin: 0 auto 12px; }
        .register-header h3 { color: #fff; font-weight: 700; margin: 0 0 4px; font-size: 1.3rem; }
        .register-header p { color: rgba(255,255,255,0.75); margin: 0; font-size: 0.85rem; }
        .register-body { padding: 32px; }
        .form-label { font-size: 0.82rem; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .input-group-text { background: #f9fafb; border: 1.5px solid #e5e7eb; border-right: none; border-radius: 10px 0 0 10px; color: #9ca3af; }
        .form-control { border: 1.5px solid #e5e7eb; border-left: none; border-radius: 0 10px 10px 0; padding: 10px 14px; font-size: 0.9rem; }
        .form-control:focus { border-color: #7c3aed; box-shadow: none; }
        .input-group:focus-within .input-group-text { border-color: #7c3aed; }
        .btn-register { background: #6d28d9; border: none; border-radius: 10px; padding: 12px; font-weight: 700; color: #fff; width: 100%; transition: 0.2s; font-size: 0.95rem; margin-top: 4px; }
        .btn-register:hover { background: #4c1d95; transform: translateY(-1px); }
        .login-link { text-align: center; margin-top: 18px; font-size: 0.875rem; color: #64748b; }
        .login-link a { color: #6d28d9; font-weight: 600; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="register-card">
    <div class="register-header">
        <div class="logo"><i class="fas fa-guitar"></i></div>
        <h3>Buat Akun Baru</h3>
        <p>Daftar dan mulai pinjam alat musik favoritmu</p>
    </div>
    <div class="register-body">
        <form action="<?= BASEURL; ?>/AuthController/prosesRegister" method="POST" autocomplete="off">
            <input type="text" style="display:none;" name="fakeuser">
            <input type="password" style="display:none;" name="fakepass">
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-id-card fa-sm"></i></span>
                    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap kamu (min. 5 karakter)" required autocomplete="new-password" minlength="5">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user fa-sm"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Pilih username unik" required autocomplete="new-password">
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock fa-sm"></i></span>
                    <input type="password" name="password" id="regPass" class="form-control" placeholder="Buat password yang kuat" required autocomplete="new-password">
                    <button type="button" id="toggleReg" style="background:#f9fafb;border:1.5px solid #e5e7eb;border-left:none;border-radius:0 10px 10px 0;cursor:pointer;padding:0 14px;">
                        <i class="fas fa-eye fa-sm text-muted" id="eyeReg"></i>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn-register">
                <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
            </button>
        </form>
        <div class="login-link">
            Sudah punya akun? <a href="<?= BASEURL; ?>/AuthController/login">Login di sini</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('toggleReg').addEventListener('click', function() {
        const input = document.getElementById('regPass');
        const icon  = document.getElementById('eyeReg');
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
