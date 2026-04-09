<?php
class AuthController extends Controller {

    // Ini yang hilang! Method untuk nampilin halaman login awal
    public function index() {
        $data['judul'] = 'Login - Rental Alat Musik';
        $this->view('auth/login', $data); 
    }

    // Bagian di dalam AuthController.php
    public function prosesLogin() {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $this->model('User_model')->getUserByUsername($username);

    if ($user) {
        // Cek apakah password cocok (baik versi Hash maupun teks biasa)
        // ... kode pengecekan password sebelumnya ...

        if (password_verify($password, $user['password']) || $password == $user['password']) {
            
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['nama'] = $user['nama_lengkap'] ?: $user['username'];

            // Catat log login
            $this->model('Log')->tambahLog($user['id_user'], 'Login ke sistem sebagai ' . $user['role']);

            // Pengecekan Role yang lebih spesifik
            if ($user['role'] == 'admin') {
                // Arahkan ke Dashboard khusus Admin
                header('Location: ' . BASEURL . '/AdminController');
            } elseif ($user['role'] == 'petugas') {
                // Arahkan ke Dashboard khusus Petugas
                header('Location: ' . BASEURL . '/PetugasController');
            } elseif ($user['role'] == 'peminjam') {
                // Arahkan ke Dashboard khusus Peminjam/Siswa
                header('Location: ' . BASEURL . '/PeminjamController');
            }
            exit;

        } else {
            // ... pesan password salah ...
        }
            echo "<script>alert('Password Salah!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.history.back();</script>";
    }
}

public function register() {
    $data['judul'] = 'Register - MusicRent';
    // Menampilkan file view register
    $this->view('auth/register', $data);
}

    public function prosesRegister() {
        if( $this->model('User_model')->register($_POST) > 0 ) {
            header('Location: ' . BASEURL . '/AuthController/login');
            exit;
        } else {
            $nama = trim($_POST['nama'] ?? '');
            if(strlen($nama) < 5) {
                echo "<script>alert('Nama lengkap minimal 5 karakter!'); window.history.back();</script>";
            } else {
                echo "<script>alert('Username sudah digunakan, coba yang lain.'); window.history.back();</script>";
            }
        }
    }
}