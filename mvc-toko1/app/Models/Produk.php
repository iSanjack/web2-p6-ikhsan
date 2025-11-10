<?php
require_once 'config/database.php';

class Produk {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function tampilkanSemuaProduk() {
        $sql = "SELECT * FROM barang";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
?>
