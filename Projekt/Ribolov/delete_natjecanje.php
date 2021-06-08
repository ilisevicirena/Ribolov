
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';

$id = $_GET['id'];
if ($prijavaTip == moderator || $prijavaTip == administrator) {
    $result = $baza->upitDB("DELETE FROM Natjecanje WHERE ID_natjecanje=$id");
    if ($result) {
        upisiLog("Brisanje: Obrisano natjecanje {$id}", $prijava, 3);
        $poruka="Uspješno ste obrisali natjecanje. Uskoro ćete biti preusmjereni.";
        $idi="natjecanja.php";
        include_once '_poruka.php';
    }
   // header("Location:natjecanja.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


