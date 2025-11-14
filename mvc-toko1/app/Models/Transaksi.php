<?php require_once 'config/database.php';
class Transaksi
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function tampilkanSemuaTransaksi()
    {
        $sql = "SELECT * FROM transaksi";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function tampilkanTransaksiById($id)
    {
        $sql = "SELECT * FROM transaksi WHERE id_transaksi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    public function tambahTransaksi($data)
    {
        $query = "INSERT INTO transaksi (kode_barang, id_pelanggan, jumlah, total_harga) 
              VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);


        $stmt->bind_param(
            "iiid",
            $data['kode_barang'],
            $data['id_pelanggan'],
            $data['jumlah'],
            $data['total_harga']
        );

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true; // berhasil
        } else {
            echo "Gagal tambah transaksi: " . $stmt->error;
            return false; // gagal
        }
    }
    public function updateTransaksi($id, $data)
    {
        $sql = "UPDATE transaksi SET kode_barang=?, jumlah=?, total_harga=? WHERE id_transaksi=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iidi", $data['kode_barang'], $data['jumlah'], $data['total_harga'], $id);
        $stmt->execute();
    }
    public function hapusTransaksi($id)
    {
        $query = "DELETE FROM transaksi WHERE id_transaksi = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getById($id)
    {
        $query = "SELECT t.*, 
                     b.nama AS nama_barang, 
                     b.harga AS harga_barang,
                     p.nama
              FROM transaksi t
              JOIN barang b ON t.kode_barang = b.kode_barang
              JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
              WHERE t.id_transaksi = '$id'";

        return $this->conn->query($query)->fetch_assoc();
    }



}