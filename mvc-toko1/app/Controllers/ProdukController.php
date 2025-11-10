<?php
require_once 'app/models/Produk.php';

class ProdukController
{
    public function daftarProduk()
    {
        $produk = new produk();
        $data = $produk->tampilkanSemuaProduk();
        require 'app/views/produk_view.php';
    }

}
