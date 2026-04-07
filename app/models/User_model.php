<?php

class User_model {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
    // Tambahkan pengecekan agar tidak error "Undefined array key"
    $nama = isset($data['nama_lengkap']) ? $data['nama_lengkap'] : '';
    $username = $data['username'];
    
    // Cek apakah username sudah ada
    if($this->getUserByUsername($username)) {
        return 0; 
    }

    try {
        $query = "INSERT INTO users (nama_lengkap, username, password, role) 
                  VALUES (:nama_lengkap, :username, :password, :role)";
        
        $this->db->query($query);
        $this->db->bind('nama_lengkap', $nama);
        $this->db->bind('username', $username);
        
        // Hash password sesuai standar keamanan
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('role', 'peminjam');

        $this->db->execute();
        return $this->db->rowCount();
    } catch (PDOException $e) {
        return 0;
    }
}
    public function getAllUser() {
        // Menggunakan tabel 'users' sesuai SQL terbaru
        $this->db->query("SELECT id_user, username, role FROM users");
        return $this->db->resultSet();
    }

    public function tambahDataUser($data) {
        $query = "INSERT INTO user (nama, username, password, role) 
                VALUES (:nama, :username, :password, :role)";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        // Sebaiknya gunakan password_hash untuk keamanan
        $this->db->bind('password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind('role', 'peminjam'); // Default role saat daftar

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserByUsername($username) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function getUserById($id) {
        $this->db->query("SELECT * FROM users WHERE id_user = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}