
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';

$id = $_GET['id'];
$korisnik = $_GET['korisnik'];
if ($prijavaTip == administrator) {
    $result = $baza->upitDB("DELETE FROM Pobjednik WHERE Natjecanje_ID_natjecanje=$id and Korisnik_Korisnicko_ime='$korisnik'");
    if ($result) {
        upisiLog("Brisanje: Obrisan pobjednik natjecanja {$id}", $prijava, 3);
        $poruka="Uspješno ste obrisali {$korisnik} kao pobjednika natjecanja {$id}. Uskoro ćete biti preusmjereni";
        $idi="pobjednici.php";
        include_once '_poruka.php';
    }
   // header("Location:pobjednici.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


