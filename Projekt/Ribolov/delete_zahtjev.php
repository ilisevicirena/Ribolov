
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
if ($prijavaTip == administrator || $prijavaTip == moderator) {
    $result = $baza->upitDB("DELETE FROM Zahtjev_pobjednik WHERE ID_zahtjeva=$id");
    if ($result) {
        upisiLog("Brisanje: Obrisan zahtjev za pobjednikom {$id}", $prijava, 3);
        $poruka="Uspješno ste obrisali zahtjev za pobjednikom. Uskoro ćete biti preusmjereni.";
        $idi="zahtjevi_za_pobjednikom.php";
        include_once '_poruka.php';
    }

//    header("Location:zahtjevi_za_pobjednikom.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

