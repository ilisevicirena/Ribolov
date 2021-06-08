
<?php

include("klase/baza.php");
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$baza = new Baza();
$id = $_GET['id'];
if ($prijavaTip == administrator) {
    $result = $baza->upitDB("update Korisnik set Blokiran='0' WHERE Korisnicko_ime='$id'");
    if ($result) {
        upisiLog("Uredi: Odblokiran korisnik {$id}", $prijava, 3);
        $poruka="Uspješno ste odblokirali korisnika {$id}.";
        $idi="korisnici.php";
        include_once '_poruka.php';
    }

   // header("Location:korisnici.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

