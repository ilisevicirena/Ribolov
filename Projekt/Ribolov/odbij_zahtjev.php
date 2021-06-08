
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
if ($prijavaTip == administrator) {
    $bodovi = 0;
    $vrijeme = vrijemeSad();
    $result = $baza->upitDB("update Zahtjev_pobjednik set Status=0 WHERE ID_zahtjeva=$id");
    if ($result) {
        upisiLog("Izmjena: Odbijen zahtjev za pobjednikom {$id}", $prijava, 3);
        $poruka="Uspješno ste odbili zahtjev za pobjednikom na natjecanju";
        $idi="zahtjevi_za_pobjednikom.php";
        include_once '_poruka.php';
    }

    //header("Location:zahtjevi_za_pobjednikom.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
?>

