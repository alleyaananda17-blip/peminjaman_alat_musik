<?php

class PeminjamController extends Controller {
    
    public function index() {
        $data['judul'] = 'Daftar Alat Musik';
        // Kita butuh model Alat_model untuk ambil data musik
        $data['alat'] = $this->model('Alat_model')->getAllAlat();
        
        $this->view('peminjam/index', $data);
    }

    public function pinjam($id) {
        $data['judul'] = 'Konfirmasi Pinjam';
        // Mengambil data alat spesifik berdasarkan ID dari URL
        $data['alat'] = $this->model('Alat_model')->getAlatById($id);
        
        // Ini adalah baris yang memicu error jika filenya tidak ada
        $this->view('peminjam/pinjam', $data); 
    }

    public function prosesPinjam() {
        if ($this->model('Pinjam_model')->tambahDataPeminjaman($_POST) > 0) {
            $alat = $this->model('Alat_model')->getAlatById($_POST['id_alat']);
            $nama_alat = $alat ? $alat['nama_alat'] : 'alat musik';
            $this->model('Log')->tambahLog($_SESSION['id_user'], 'Mengajukan peminjaman: ' . $nama_alat);
            echo "<script>
                    alert('Peminjaman Berhasil! Silakan ambil alat di petugas.');
                    window.location.href='" . BASEURL . "/PeminjamController';
                </script>";
        } else {
            echo "<script>
                    alert('Gagal melakukan peminjaman.');
                    window.history.back();
                </script>";
        }
    }

    public function cari() {
        $data['judul'] = 'Daftar Alat Musik';
        // Mengambil data berdasarkan kata kunci (keyword)
        $data['alat'] = $this->model('Alat_model')->cariDataAlat($_POST['keyword']);
        
        $this->view('peminjam/index', $data);
    }

    public function riwayat() {
        $data['judul'] = 'Riwayat';
        $data['riwayat'] = $this->model('Pinjam_model')->getPinjamByUser($_SESSION['id_user']);
        $this->view('peminjam/riwayat', $data);
    }

    public function hapusAkun() {
        $id_user = $_SESSION['id_user'];
        $this->model('User')->hapusAkun($id_user);
        session_destroy();
        header('Location: ' . BASEURL . '/AuthController/login');
        exit;
    }
}