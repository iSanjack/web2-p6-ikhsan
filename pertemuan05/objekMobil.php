<?php
require_once "Mobil.php";
require_once "MobilSport.php";

// objek mobil 
$brio = new Mobil("Brio", "Honda", 2020);
echo $brio->infoMobil();

// objek mobilsport 
$lambo = new MobilSport("Lamborgini", "Lamborgini", 2022);
echo $lambo->infoMobil();
echo $lambo->jalankanTurbo();
