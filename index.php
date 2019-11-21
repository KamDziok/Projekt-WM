<?php
    require_once 'vendor/autoload.php';
    include_once 'model/Rezerwacje.php';

    $rez = new Rezerwacje(20, 1, 2, 1);

    echo "<p>" . 'Bilety normalne: ' . $rez->iloscNormalnych . "</br>" . ' Bilety uczeń/senior: ' . $rez->iloscUczenSenior . "</br>" . ' Bilety studenckie: ' . $rez->iloscStudent . "</p>";
    echo "<p>" . 'Cena biletów: ' . $rez->cena() . "</p>";