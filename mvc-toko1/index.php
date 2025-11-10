<?php
require_once 'config/database.php';
require_once 'app/Controllers/ProdukController.php';
require_once 'app/Controllers/PelangganController.php';
require_once 'app/Controllers/TransaksiController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = null;

switch (true) {
    case str_contains($action, 'produk'):
        $controller = new ProdukController();
        if ($action === 'produk') {
            $controller->daftarProduk();
        }
        break;

    case str_contains($action, 'pelanggan'):
        $controller = new PelangganController();
        if ($action === 'pelanggan') {
            $controller->daftarPelanggan();
        } 
        break;

    case str_contains($action, 'transaksi'):
        $controller = new TransaksiController;
        if ($action === 'transaksi') {
            $controller->daftarTransaksi();
        } 
        break;

    default:
        require_once 'app/Views/index.php';
        break;
}
