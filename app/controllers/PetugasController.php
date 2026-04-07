<?php

class PetugasController extends Controller {
    
    public function index() {
        $data['judul'] = 'Dashboard Petugas';
        $data['total_pending'] = $this->model('Pinjam_model')->countPending();
        
        // Langsung panggil view utama karena tidak pakai templates/header
        $this->view('petugas/index', $data);
    }

    public function persetujuan() {
        $data['judul'] = 'Persetujuan Peminjaman';
        $data['pinjam'] = $this->model('Pinjam_model')->getAllPinjam(); 
        
        $this->view('petugas/persetujuan', $data);
    }

    public function laporan() {
        $data['judul'] = 'Laporan Peminjaman';
        $data['pinjam'] = $this->model('Pinjam_model')->getAllPinjam();
        
        $this->view('petugas/laporan', $data);
    }

    public function prosesSetuju($id) {
        if( $this->model('Pinjam_model')->updateStatus($id, 'dipinjam') > 0 ) {
            header('Location: ' . BASEURL . '/PetugasController/persetujuan');
            exit;
        }
    }

    public function cetak()
    {
        $data['judul'] = 'Cetak Laporan Peminjaman';
        $data['pinjam'] = $this->model('Pinjam_model')->getLaporanProsedur();
        
        // Memanggil view khusus cetak tanpa navigasi/sidebar
        $this->view('petugas/cetak_laporan', $data);
    }
}