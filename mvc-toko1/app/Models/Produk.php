<?php
require_once 'config/database.php';

class Produk
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function tampilkanSemuaProduk()
    {
        $sql = "SELECT * FROM barang";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function tambahProduk($nama, $harga, $stok)
    {
        $stmt = $this->conn->prepare("INSERT INTO barang (nama, harga, stok) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $nama, $harga, $stok);
        $stmt->execute();
    }

    public function getProdukById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM barang WHERE kode_barang = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateProduk($id, $nama, $harga, $stok)
    {
        $stmt = $this->conn->prepare("UPDATE barang SET nama=?, harga=?, stok=? WHERE kode_barang=?");
        $stmt->bind_param("sdii", $nama, $harga, $stok, $id);
        $stmt->execute();
    }

    public function hapusProduk($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM barang WHERE kode_barang = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
