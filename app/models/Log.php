<?php
class Log {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahLog($id_user, $pesan) {
        $this->db->query("INSERT INTO log_aktivitas (id_user, pesan, waktu) VALUES (:id_user, :pesan, NOW())");
        $this->db->bind(':id_user', $id_user);
        $this->db->bind(':pesan', $pesan);
        $this->db->execute();
    }

    public function getAllLog() {
        $this->db->query("SELECT log_aktivitas.*, users.username, users.nama_lengkap 
                        FROM log_aktivitas 
                        LEFT JOIN users ON log_aktivitas.id_user = users.id_user
                        ORDER BY log_aktivitas.waktu DESC");
        return $this->db->resultSet();
    }
}