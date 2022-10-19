<?php

$proizvodi = array(
    array(
        "id" => 1,
        "naziv" => "Laptop",
        "cena" => 1000,
        "kolicina" => 65
    ),
    array(
        "id" => 2,
        "naziv" => "Monitor",
        "cena" => 350,
        "kolicina" => 34
    ),
    array(
        "id" => 3,
        "naziv" => "Tastatura",
        "cena" => 200,
        "kolicina" => 47
    )
);

function vratiPDV($cena)
{
    $pdv = $cena * 0.2;
    return $pdv;
}

function vratiRabat($kolicina)
{
    if ($kolicina < 40) return 2;
    if ($kolicina < 50) return 3;
    return 5;
}

function vratiUkupanIznos($cena, $kolicina)
{
    $iznosPDV = vratiPDV($cena);
    $cenaSaPDV = $cena + $iznosPDV; // cena za jedan proizvod
    $iznos = $cenaSaPDV * $kolicina; //iznos svih proizvoda
    $iznosRabata = $iznos * vratiRabat($kolicina) / 100; //popust na iznos svih proizvoda
    return $iznos - $iznosRabata;
}

function vratiUkupno()
{
    global $proizvodi;
    $suma = 0; //neutralna vrednost
    foreach ($proizvodi as $pr) {
        $suma += vratiUkupanIznos($pr['cena'], $pr['kolicina']);
    }
    return $suma;
}
