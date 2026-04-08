<?php
class AdminController extends Controller {
    
    public function index() {
        // Cek login & role admin sesuai dokumen UKK
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: ' . BASEURL . '/AuthController');
            exit;
        }
        
        $data['judul'] = 'Dashboard Admin';
        // Mengambil data alat musik untuk ditampilkan di dashboard
        $data['alat'] = $this->model('Alat')->getAllAlat();
        $this->view('admin/index', $data); 
    }

    // Fitur CRUD Alat - Tambah (HANYA SATU SAJA)
    public function tambah_alat() {
        if( $this->model('Alat')->tambahAlat($_POST) > 0 ) {
            $this->model('Log')->tambahLog($_SESSION['id_user'], 'Menambah alat baru: ' . $_POST['nama_alat']);
            header('Location: ' . BASEURL . '/AdminController');
            exit;
        }
    }

    // Method untuk menampilkan halaman form tambah
    public function tambah_view() {
        $data['judul'] = 'Tambah Alat Musik';
        // Memanggil file Kategori.php yang baru kita buat
        $data['kategori'] = $this->model('Kategori')->getAllKategori(); 
        $this->view('admin/tambah_alat', $data);
    }

    // 1. Menampilkan halaman edit dengan data yang sudah ada
    public function edit_view($id) {
        $data['judul'] = 'Edit Alat Musik';
        $data['alat'] = $this->model('Alat')->getAlatById($id);
        // Pastikan baris ini ada agar $data['kategori'] tidak undefined
        $data['kategori'] = $this->model('Kategori')->getAllKategori();
        $this->view('admin/edit_alat', $data);
    }

    // 2. Memproses perubahan data ke database
    public function edit_alat() {
        if( $this->model('Alat')->ubahDataAlat($_POST) > 0 ) {
            $this->model('Log')->tambahLog($_SESSION['id_user'], 'Mengedit data alat: ' . $_POST['nama_alat']);
            header('Location: ' . BASEURL . '/AdminController');
            exit;
        } else {
            header('Location: ' . BASEURL . '/AdminController');
            exit;
        }
    }

    public function hapus_alat($id) {
        $alat = $this->model('Alat')->getAlatById($id);
        $nama_alat = $alat ? $alat['nama_alat'] : 'alat musik';
        if($this->model('Alat')->hapusAlat($id) > 0) {
            $this->model('Log')->tambahLog($_SESSION['id_user'], 'Menghapus alat: ' . $nama_alat);
            header('Location: ' . BASEURL . '/AdminController');
            exit;
        }
    }

    // Fitur CRUD User sesuai permintaan soal
    public function user() {
        $data['judul'] = 'Manajemen Pengguna';
        // Pastikan ini 'users' agar sesuai dengan di View
        $data['users'] = $this->model('User')->getAllUser();
        $this->view('admin/user', $data);
    }

    // Di dalam AdminController.php
    public function detailUser($id) {
        $data['judul'] = 'Detail Pengguna';
        
        // Pastikan mengambil data dari model
        $data['user'] = $this->model('User_model')->getUserById($id);
        
        // Jika data tidak ditemukan, balikkan ke halaman utama user
        if (!$data['user']) {
            header('Location: ' . BASEURL . '/AdminController/user');
            exit;
        }

        $this->view('admin/detail_user', $data);
    }

    public function peminjaman() {
        $data['judul'] = 'Daftar Peminjaman';
        // Panggil model Pinjam yang tadi kita buat
        $data['pinjam'] = $this->model('Pinjam')->getAllPinjam();
        
        // Pastikan file view ini sudah dibuat di folder app/views/admin/
        $this->view('admin/peminjaman', $data);
    }

    public function tambah_pinjam_view() {
        $data['judul'] = 'Tambah Peminjaman';
        $data['alat'] = $this->model('Alat')->getAllAlat();
        $data['users'] = $this->model('User')->getAllUser();
        $this->view('admin/tambah_pinjam', $data);
    }

    public function proses_pinjam() {
        // Memanggil model Pinjam untuk insert ke database
        if( $this->model('Pinjam')->tambahPeminjaman($_POST) > 0 ) {
            header('Location: ' . BASEURL . '/AdminController/peminjaman');
            exit;
        } else {
            header('Location: ' . BASEURL . '/AdminController/peminjaman');
            exit;
        }
    }

    public function kembalikan($id)
    {
        if ($this->model('Pinjam')->prosesKembali($id) > 0) {
            $this->model('Log')->tambahLog($_SESSION['id_user'], 'Memproses pengembalian alat, pinjam #' . $id);
            header('Location: ' . BASEURL . '/AdminController/peminjaman');
            exit;
        } else {
            header('Location: ' . BASEURL . '/AdminController/peminjaman');
            exit;
        }
    }

    public function log() {
        $data['judul'] = 'Log Aktivitas';
        $data['logs'] = $this->model('Log')->getAllLog();
        $this->view('admin/log', $data);
    }

}