<?php

class Pinjam_model {
    private $table = 'peminjaman'; // Sesuaikan dengan nama tabel di database kamu
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Mengambil semua data peminjaman untuk laporan petugas
    public function getAllPinjam()
    {
        $query = "SELECT peminjaman.*, users.nama_lengkap, users.username, alat_musik.nama_alat 
                  FROM " . $this->table . "
                  JOIN users ON peminjaman.id_user = users.id_user
                  JOIN alat_musik ON peminjaman.id_alat = alat_musik.id_alat";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    // Menghitung jumlah peminjaman yang statusnya masih 'dipinjam' (Pending)
    public function countPending()
    {
        $this->db->query("SELECT COUNT(*) as total FROM " . $this->table . " WHERE status = 'dipinjam'");
        $result = $this->db->single();
        return $result['total'];
    }

    // Mengambil data peminjaman berdasarkan status tertentu
    public function getAllPinjamByStatus($status)
    {
        $query = "SELECT peminjaman.*, users.username, alat_musik.nama_alat 
                  FROM " . $this->table . "
                  JOIN users ON peminjaman.id_user = users.id_user
                  JOIN alat_musik ON peminjaman.id_alat = alat_musik.id_alat
                  WHERE peminjaman.status = :status";
        $this->db->query($query);
        $this->db->bind('status', $status);
        return $this->db->resultSet();
    }

    public function getPinjamByUser($id_user) {
        // Query untuk mengambil riwayat berdasarkan ID user yang sedang login
        $query = "SELECT p.*, a.nama_alat 
                  FROM " . $this->table . " p
                  JOIN alat_musik a ON p.id_alat = a.id_alat
                  WHERE p.id_user = :id_user 
                  ORDER BY p.tgl_pinjam DESC";
                  
        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        return $this->db->resultSet();
    }

    public function updateStatus($id, $status)
    {
        $query = "UPDATE " . $this->table . " SET status = :status WHERE id_pinjam = :id";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function getLaporanProsedur()
    {
        $this->db->query("CALL cetak_laporan_peminjaman()");
        return $this->db->resultSet();
    }

    public function tambahDataPeminjaman($data) {
    // Pastikan kolom sesuai: id_user, id_alat, tgl_pinjam, status
    $query = "INSERT INTO peminjaman (id_user, id_alat, tgl_pinjam, status) 
              VALUES (:id_user, :id_alat, :tgl_pinjam, :status)";
    
    $this->db->query($query);
    $this->db->bind('id_user', $_SESSION['id_user']); // Pastikan session id_user ada
    $this->db->bind('id_alat', $data['id_alat']);
    $this->db->bind('tgl_pinjam', date('Y-m-d'));
    $this->db->bind('status', 'dipinjam');

    return $this->db->execute();
}
}