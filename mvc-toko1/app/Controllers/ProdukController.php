<?php
require_once 'app/Models/Produk.php';

class ProdukController
{
    private $produk;

    public function __construct()
    {
        $this->produk = new Produk();
    }

    public function daftarProduk()
    {
        $data = $this->produk->tampilkanSemuaProduk();
        require 'app/Views/produk_view.php';
    }

    public function tambah()
    {
        require 'app/Views/produk_form.php';
    }

    public function simpan()
    {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $this->produk->tambahProduk($nama, $harga, $stok);
        header("Location: index.php?action=produk&subaction=daftarProduk");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'];
        $data = $this->produk->getProdukById($id);
        require 'app/Views/produk_form.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $this->produk->updateProduk($id, $nama, $harga, $stok);
        header("Location: index.php?action=produk&subaction=daftarProduk");
        exit;
    }

    public function hapus()
    {
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            $this->produk->hapusProduk($id);
        }

        header("Location: index.php?action=produk&subaction=daftarProduk");
        exit;
    }
}
