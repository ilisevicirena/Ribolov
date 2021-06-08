
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
$prijavaTip = dohvatiLogKorTip();
if ($prijavaTip == administrator || $prijavaTip==moderator) {
    $result = $baza->upitDB("DELETE FROM Ribicki_klub WHERE ID_klub=$id");
    if ($result) {
        upisiLog("Brisanje: Obrisan klub {$id}", $prijava, 3);
        $poruka="Uspješno ste obrisali ribički klub. Uskoro ćete biti preusmjereni.";
        $idi="klubovi.php";
        include_once '_poruka.php';
    }

  //  header("Location:klubovi.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


