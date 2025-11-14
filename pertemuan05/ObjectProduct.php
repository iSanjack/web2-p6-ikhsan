<?php
require_once "Product.php";
//buat objek
$produk = new Product("Aple", 20000);
echo $produk->getNama();
echo "<br>";
echo $produk->getHarga();
