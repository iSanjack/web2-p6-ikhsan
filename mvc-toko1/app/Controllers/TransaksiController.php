<?php
require_once 'app/models/Transaksi.php';

class TransaksiController
{
    public function daftarTransaksi()
    {
        $transaksi = new Transaksi();
        $data = $transaksi->tampilkanSemuaTransaksi();
        require 'app/views/transaksi_view.php';
    }
}
