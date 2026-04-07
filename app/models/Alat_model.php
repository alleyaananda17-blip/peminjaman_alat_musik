<?php

class Alat_model {
    private $table = 'alat_musik';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllAlat() {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getAlatById($id) {
        $this->db->query("SELECT * FROM alat_musik WHERE id_alat = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function cariDataAlat($keyword) {
        $query = "SELECT * FROM alat_musik WHERE nama_alat LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}