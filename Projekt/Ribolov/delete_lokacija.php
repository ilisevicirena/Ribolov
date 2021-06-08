
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
if ($prijavaTip == administrator) {
    $result = $baza->upitDB("DELETE FROM Lokacija WHERE ID_lokacija=$id");
    if ($result) {
        upisiLog("Brisanje: Obrisana lokacija {$id}", $prijava, 3);
        $poruka="Uspješnp ste obrisali lokaciju. Uskoro ćete biti preusmjereni.";
        $idi="lokacije.php";
        include_once '_poruka.php';
    }

   // header("Location:lokacije.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


