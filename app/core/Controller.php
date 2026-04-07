<?php

class Controller {
    // Fungsi untuk memanggil file di folder app/views/
    public function view($view, $data = [])
    {
        // Variabel $data akan dikirim ke file view
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model) {
        $file_path = '../app/models/' . $model . '.php';
        
        if (file_exists($file_path)) {
            require_once $file_path;
            return new $model;
        } else {
            // Berhenti dan beri pesan jelas jika file model lupa dibuat
            die("Error: Model file <b>$model.php</b> tidak ditemukan di folder app/models/!");
        }
    }

    public function persetujuan()
    {
        $data['judul'] = 'Persetujuan Peminjaman';
        // Mengambil data yang statusnya masih diproses/pending (sesuaikan enum di DB kamu)
        $data['pinjam'] = $this->model('Pinjam_model')->getAllPinjamByStatus('dipinjam');
        
        $this->view('templates/header', $data);
        $this->view('petugas/persetujuan', $data);
        $this->view('templates/footer');
    }
}