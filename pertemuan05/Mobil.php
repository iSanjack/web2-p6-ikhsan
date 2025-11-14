<?php
class Mobil
{
    var string $nama;
    var ?string $merk = null;
    var int $tahun;

    public function __construct(string $nama, ?string $merk, int $tahun)
    {
        $this->nama = $nama;
        $this->merk = $merk;
        $this->tahun = $tahun;
    }

    function infoMobil()
    {
        return "Nama Mobil : $this->nama <br>"
            . "Merk : $this->merk <br>"
            . "Tahun : $this->tahun <br>";
    }

    function tambahKecepatan()
    {
        echo "kecepatan bertambah!";
    }
}
