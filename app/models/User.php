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
        return $this->db->resultSet(); // Wajib ada return resultSet()
    }
}