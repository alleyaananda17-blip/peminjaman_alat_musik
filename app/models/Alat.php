<?php
class Alat {
    private $table = 'alat_musik';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllAlat() {
        $this->db->query("SELECT a.*, k.nama_kategori FROM " . $this->table . " a LEFT JOIN kategori k ON a.kategori_id = k.id_kategori");
        return $this->db->resultSet();
    }

    public function getAlatById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_alat = :id");
        $this->db->bind('id', $id);
        return $this->db->single(); // Harus single()
    }

    public function tambahAlat($data) {
        $query = "INSERT INTO " . $this->table . " (nama_alat, kategori_id, stok) VALUES (:nama, :kategori, :stok)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama_alat']);
        $this->db->bind('kategori', $data['kategori_id']);
        $this->db->bind('stok', $data['stok']);
        $this->db->execute();
        
        return $this->db->rowCount(); // Ini wajib agar Controller tahu data masuk
    }

    public function ubahDataAlat($data) {
        $query = "UPDATE " . $this->table . " SET 
                    nama_alat = :nama, 
                    kategori_id = :kategori, 
                    stok = :stok 
                WHERE id_alat = :id";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama_alat']);
        $this->db->bind('kategori', $data['kategori_id']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('id', $data['id_alat']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusAlat($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_alat = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}