<?php require_once 'app/models/Transaksi.php';
class TransaksiController
{
    public function daftarTransaksi()
    {
        $transaksi = new Transaksi();
        $data = $transaksi->tampilkanSemuaTransaksi();
        require 'app/views/transaksi_view.php';
    }
    public function tambah()
    {
        // koneksi database
        require_once 'config/database.php';
        $database = new Database();
        $conn = $database->getConnection();

        // ambil data barang
        $barang = [];
        $result = $conn->query("SELECT * FROM barang");
        if ($result && $result->num_rows > 0) {
            $barang = $result->fetch_all(MYSQLI_ASSOC);
        }

        // ambil data pelanggan
        $pelanggan = [];
        $result2 = $conn->query("SELECT * FROM pelanggan");
        if ($result2 && $result2->num_rows > 0) {
            $pelanggan = $result2->fetch_all(MYSQLI_ASSOC);
        }

        // tampilkan form
        require 'app/Views/transaksi_form.php';
    }




    public function simpan()
    {
        $transaksi = new Transaksi();

        $id_pelanggan = $_POST['id_pelanggan'];
        $barang_dibeli = $_POST['barang'];


        // 🔹 Ambil harga dari database supaya akurat
        require_once 'config/database.php';
        $database = new Database();
        $conn = $database->getConnection();

        $dataBarang = [];
        $result = $conn->query("SELECT kode_barang, harga FROM barang");
        while ($row = $result->fetch_assoc()) {
            $dataBarang[$row['kode_barang']] = $row['harga'];
        }

        // 🔹 Proses setiap barang yang dibeli
        foreach ($barang_dibeli as $kode_barang => $jumlah) {
            if ($jumlah > 0 && isset($dataBarang[$kode_barang])) {
                $harga = $dataBarang[$kode_barang];
                $total_harga = $harga * $jumlah;

                $berhasil = $transaksi->tambahTransaksi([
                    'kode_barang' => $kode_barang,
                    'id_pelanggan' => $id_pelanggan,
                    'jumlah' => $jumlah,
                    'total_harga' => $total_harga
                ]);

                // (Opsional) Tambahkan debug jika gagal insert
                if (!$berhasil) {
                    echo "Gagal menyimpan transaksi untuk barang ID: $kode_barang<br>";
                }
            }
        }

        header('Location: index.php?action=transaksi');
    }

    public function edit($id)
    {
        $transaksi = new Transaksi();
        $data = $transaksi->tampilkanTransaksiById($id);
        require 'app/Views/transaksi_form.php';
    }
    public function update($id)
    {
        $transaksi = new Transaksi();
        $transaksi->updateTransaksi($id, $_POST);
        header('Location: index.php?action=transaksi&action=daftarTransaksi');
    }
    public function hapus($id)
    {
        $transaksi = new Transaksi();
        $transaksi->hapusTransaksi($id);
        header('Location: index.php?action=transaksi&subaction=daftarTransaksi');

    }

    public function detail()
    {
        require_once 'app/Models/Transaksi.php';
        $model = new Transaksi();

        $id = $_GET['id'];
        $data = $model->getById($id);

        require_once 'app/views/detail_transaksi.php';
    }



}