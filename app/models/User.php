<?php
class User {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database; // Pastikan class Database sudah ada di config
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function getAllUser() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function hapusAkun($id_user) {
        // Hapus data peminjaman dulu baru hapus akun
        $this->db->query("DELETE FROM peminjaman WHERE id_user = :id_user");
        $this->db->bind(':id_user', $id_user);
        $this->db->execute();

        $this->db->query("DELETE FROM " . $this->table . " WHERE id_user = :id_user");
        $this->db->bind(':id_user', $id_user);
        $this->db->execute();
        return $this->db->rowCount();
    }
}