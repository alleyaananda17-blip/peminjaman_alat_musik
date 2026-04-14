# CRUD - MusicRent

## KONEKSI DATABASE
```php
<?php
$host    = 'localhost';
$db      = 'db_melodi_pinjam';
$user    = 'root';
$pass    = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "Koneksi Berhasil!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
```

## CREATE
```php
public function tambahAlat($data) {
    $query = "INSERT INTO alat_musik (nama_alat, kategori_id, stok) 
              VALUES (:nama_alat, :kategori_id, :stok)";
    $this->db->query($query);
    $this->db->bind(':nama_alat', $data['nama_alat']);
    $this->db->bind(':kategori_id', $data['kategori_id']);
    $this->db->bind(':stok', $data['stok']);
    $this->db->execute();
    return $this->db->rowCount();
}
```

## READ
```php
public function getAllAlat() {
    $this->db->query("SELECT alat_musik.*, kategori.nama_kategori 
                      FROM alat_musik 
                      LEFT JOIN kategori ON alat_musik.kategori_id = kategori.id_kategori");
    return $this->db->resultSet();
}
```

## UPDATE
```php
public function ubahDataAlat($data) {
    $query = "UPDATE alat_musik SET nama_alat=:nama_alat, kategori_id=:kategori_id, stok=:stok 
              WHERE id_alat=:id_alat";
    $this->db->query($query);
    $this->db->bind(':nama_alat', $data['nama_alat']);
    $this->db->bind(':kategori_id', $data['kategori_id']);
    $this->db->bind(':stok', $data['stok']);
    $this->db->bind(':id_alat', $data['id_alat']);
    $this->db->execute();
    return $this->db->rowCount();
}
```

## DELETE
```php
public function hapusAlat($id) {
    $this->db->query("DELETE FROM alat_musik WHERE id_alat = :id");
    $this->db->bind(':id', $id);
    $this->db->execute();
    return $this->db->rowCount();
}
```
