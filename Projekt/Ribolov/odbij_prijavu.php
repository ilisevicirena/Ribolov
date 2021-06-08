
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
if ($prijavaTip == administrator || $prijavaTip==moderator) {
    $bodovi = 0;
    $vrijeme = vrijemeSad();
    $result = $baza->upitDB("update Prijava set Status=0, Datum_statusa='$vrijeme', Bodovi_za_prijavu='$bodovi' WHERE ID_prijava=$id");
    if ($result) {
        upisiLog("Izmjena: Odbijena prijava {$id}", $prijava, 3);
        $poruka="Uspješno ste odbili prijavu na natjecanje";
        $idi="prijave.php";
        include_once '_poruka.php';
    }

   // header("Location:prijave.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
?>

