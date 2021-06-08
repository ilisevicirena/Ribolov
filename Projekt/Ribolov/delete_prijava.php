
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
if ($prijavaTip == administrator) {
    $result = $baza->upitDB("DELETE FROM Prijava WHERE ID_prijava=$id");
    if ($result) {
        upisiLog("Brisanje: Obrisana prijava {$id}", $prijava, 3);
        $poruka="Uspješno ste obrisali prijavu na natjecanje. Uskoro ćete biti preusmjereni.";
        $idi="prijave.php";
        include_once '_poruka.php';
    }

    //header("Location:prijave.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


