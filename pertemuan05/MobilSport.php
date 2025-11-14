<?php
class MobilSport extends Mobil
{
    public $turbo = false;

    function jalankanTurbo()
    {
        $this->turbo = true;
        return "menjalankan turbo!";
    }
}
