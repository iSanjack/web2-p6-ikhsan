<?php
class Product
{
    //deklarasi variabel
    private string $nama;
    private int $harga;

    function __construct(string $nama, int $harga)
    {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getHarga(): int
    {
        return $this->harga;
    }
}
