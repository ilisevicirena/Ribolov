
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
include_once 'klase/dnevnik.php';
$prijavaTip = dohvatiLogKorTip();
$id = $_GET['id'];
if ($prijavaTip == administrator) {
    $result = $baza->upitDB("DELETE FROM Korisnik WHERE Korisnicko_ime='$id'");
    if ($result) {
        upisiLog("Brisanje: Obrisan korisnik {$id}", $prijava, 3);
        $poruka="Uspješno ste obrisali korisnika {$id}. Uskoro ćete biti preusmjereni";
        $idi="korisnici.php";
        include_once '_poruka.php';
    }

 //   header("Location:korisnici.php");
} else {

    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}