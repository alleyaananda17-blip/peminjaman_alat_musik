<?php
class Log {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllLog() {
        // Pastikan menggunakan nama tabel yang baru: log_aktivitas
        $this->db->query("SELECT log_aktivitas.*, users.nama_lengkap 
                        FROM log_aktivitas 
                        JOIN users ON log_aktivitas.id_user = users.id_user");
        return $this->db->resultSet();
    }
}