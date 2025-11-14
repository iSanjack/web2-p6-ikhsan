<?php
require_once 'app/Models/Pelanggan.php';

class PelangganController
{
    private $pelanggan;

    public function __construct()
    {
        $this->pelanggan = new Pelanggan();
    }

    public function daftarPelanggan()
    {
        $data = $this->pelanggan->tampilkanSemuaPelanggan();
        require 'app/Views/pelanggan_view.php';
    }

    public function tambah()
    {
        require 'app/Views/pelanggan_form.php';
    }

    public function simpan()
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $this->pelanggan->tambahPelanggan($nama, $alamat);
        header("Location: index.php?action=pelanggan&subaction=daftarPelanggan");

        exit;
    }

    public function edit()
    {
        $id = $_GET['id'];
        $data = $this->pelanggan->getPelangganById($id);
        require 'app/Views/pelanggan_form.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $this->pelanggan->updatePelanggan($id, $nama, $alamat);
        header("Location: index.php?action=pelanggan&subaction=daftarPelanggan");

        exit;
    }

    public function hapus()
    {
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];

            // Hapus transaksi yang terkait terlebih dahulu
            require_once 'config/database.php';
            $db = (new Database())->getConnection();
            $stmt = $db->prepare("DELETE FROM transaksi WHERE id_pelanggan = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            // Baru hapus pelanggan
            $this->pelanggan->hapusPelanggan($id);
        }

        header("Location: index.php?action=pelanggan&subaction=daftarPelanggan");
        exit;
    }
}
?>