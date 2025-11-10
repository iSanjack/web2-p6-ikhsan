<?php
require_once 'app/models/Pelanggan.php';

class PelangganController
{
    public function daftarPelanggan()
    {
        $pelanggan = new Pelanggan();
        $data = $pelanggan->tampilkanSemuaPelanggan();
        require 'app/views/pelanggan_view.php';
    }
}
