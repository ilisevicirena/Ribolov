
<?php

include("klase/baza.php");
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
include_once 'klase/dnevnik.php';
$baza = new Baza();
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
$id = $_GET['id'];
if ($prijavaTip == administrator) {
    $result = $baza->upitDB("update Korisnik set Blokiran='1' WHERE Korisnicko_ime='$id'");
    if ($result) {
        upisiLog("Izmjena: Blokiran korisnik {$id}", $prijava, 3);
        $poruka="Uspješno ste blokirali korisnika {$id}. Uskoro ćete biti preusmjereni";
        $idi="korisnici.php";
        include_once '_poruka.php';
    }

    //header("Location:korisnici.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

