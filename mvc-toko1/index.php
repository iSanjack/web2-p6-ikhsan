<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Include semua controller & koneksi database
require_once 'config/database.php';
require_once 'app/Controllers/LoginController.php';
require_once 'app/Controllers/ProdukController.php';
require_once 'app/Controllers/PelangganController.php';
require_once 'app/Controllers/TransaksiController.php';


// Inisialisasi koneksi DB
$db = (new Database())->getConnection();

// Ambil action dari URL (default = 'login' agar langsung ke login page)
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Cek status login
if (!isset($_SESSION['user'])) {
    // Jika belum login dan bukan sedang proses login, arahkan ke login page
    if ($action !== 'login' && $action !== 'prosesLogin') {
        header("Location: index.php?action=login");
        exit;
    }
}

// Routing utama
switch ($action) {
    // ====== LOGIN ======
    case 'login':
        $controller = new LoginController($db);
        $controller->index();
        break;

    case 'prosesLogin':
        $controller = new LoginController($db);
        $controller->prosesLogin();
        break;

    case 'logout':
        $controller = new LoginController($db);
        $controller->logout();
        break;

    // ====== PRODUK ======
    case 'produk':
        $controller = new ProdukController();
        $subaction = isset($_GET['subaction']) ? $_GET['subaction'] : 'daftarProduk';

        switch ($subaction) {
            case 'daftarProduk':
                $controller->daftarProduk();
                break;
            case 'tambah':
                $controller->tambah();
                break;
            case 'simpan':
                $controller->simpan();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'update':
                $controller->update();
                break;
            case 'hapus':
                $controller->hapus();
                break;
            default:
                echo "Aksi produk tidak ditemukan!";
        }
        break;


    // ====== PELANGGAN ======
    case 'pelanggan':
        $controller = new PelangganController();
        $subaction = isset($_GET['subaction']) ? $_GET['subaction'] : 'daftarPelanggan';

        switch ($subaction) {
            case 'daftarPelanggan':
                $controller->daftarPelanggan();
                break;
            case 'tambah':
                $controller->tambah();
                break;
            case 'simpan':
                $controller->simpan();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'update':
                $controller->update();
                break;
            case 'hapus':
                $controller->hapus();
                break;
            default:
                echo "Aksi pelanggan tidak ditemukan!";
        }
        break;




    // ====== TRANSAKSI ======
    case 'transaksi':
        $controller = new TransaksiController();
        $subaction = isset($_GET['subaction']) ? $_GET['subaction'] : 'daftarTransaksi';

        switch ($subaction) {
            case 'daftarTransaksi':
                $controller->daftarTransaksi();
                break;

            case 'tambah':
                $controller->tambah();
                break;

            case 'simpan':
                $controller->simpan();
                break;

            case 'hapus':
                if (isset($_GET['id'])) {
                    $controller->hapus($_GET['id']);
                }
                break;

            default:
                $controller->daftarTransaksi();
                break;
        }
        break;

    case 'detail_transaksi':
        $controller = new TransaksiController();
        $controller->detail();
        break;


    // ====== HALAMAN UTAMA ======
    case 'index':
    default:
        require 'app/Views/index.php';
        break;
}
