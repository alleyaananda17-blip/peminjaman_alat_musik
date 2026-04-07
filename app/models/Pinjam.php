<?php
class Pinjam {
    private $table = 'peminjaman';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPinjam() {
        $query = "SELECT 
                    peminjaman.*, 
                    alat_musik.nama_alat, 
                    users.username 
                FROM peminjaman 
                JOIN alat_musik ON peminjaman.id_alat = alat_musik.id_alat 
                JOIN users ON peminjaman.id_user = users.id_user";
                
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function tambahPeminjaman($data) {
        // Gunakan nama kolom tgl_pinjam dan tgl_kembali sesuai SQL
        $query = "INSERT INTO peminjaman (id_user, id_alat, tgl_pinjam, tgl_kembali, status) 
                  VALUES (:id_user, :id_alat, :t_pinjam, :t_kembali, 'dipinjam')";
        
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('id_alat', $data['id_alat']);
        $this->db->bind('t_pinjam', $data['tanggal_pinjam']);
        $this->db->bind('t_kembali', $data['tanggal_kembali']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function prosesKembali($id)
    {
        // 1. Ambil id_alat dulu buat nambahin stok nanti
        $this->db->query("SELECT id_alat FROM peminjaman WHERE id_pinjam = :id");
        $this->db->bind('id', $id);
        $data = $this->db->single();
        $id_alat = $data['id_alat'];

        // 2. Update status jadi 'kembali' dan tgl_kembali jadi SEKARANG (NOW)
        // Nama kolom harus 'tgl_kembali' sesuai struktur tabel
        $this->db->query("UPDATE peminjaman SET tgl_kembali = NOW(), status = 'kembali' WHERE id_pinjam = :id");
        $this->db->bind('id', $id);
        $this->db->execute();

        // 3. Tambahin stok alat musiknya lagi karena sudah dipulangin
        $this->db->query("UPDATE alat_musik SET stok = stok + 1 WHERE id_alat = :id_alat");
        $this->db->bind('id_alat', $id_alat);
        $this->db->execute();

        return $this->db->rowCount();
    }
}