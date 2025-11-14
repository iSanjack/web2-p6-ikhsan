<?php
require_once 'config/database.php';

class Pelanggan {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function tampilkanSemuaPelanggan() {
        $sql = "SELECT * FROM pelanggan";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
public function tambahPelanggan($nama, $alamat)
    {
        $stmt = $this->conn->prepare("INSERT INTO pelanggan (nama, alamat) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $alamat);
        $stmt->execute();
    }

    public function getPelangganById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM pelanggan WHERE id_pelanggan = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updatePelanggan($id, $nama, $alamat)
    {
        $stmt = $this->conn->prepare("UPDATE pelanggan SET nama=?, alamat=? WHERE id_pelanggan=?");
        $stmt->bind_param("ssi", $nama, $alamat, $id);
        $stmt->execute();
    }

    public function hapusPelanggan($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM pelanggan WHERE id_pelanggan = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}
?>
