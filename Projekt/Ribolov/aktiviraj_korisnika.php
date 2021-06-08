
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();

if ($prijavaTip == administrator) {
    $result = $baza->upitDB("update Korisnik set Aktiviran=1, Status_prijava=0 WHERE Korisnicko_ime='$id'");
    if ($result) {
        upisiLog("Aktivacija: Aktiviran korisnik {$id}", $prijava, 5);
        $poruka="Uspješno ste aktivirali korisnika {$id}. Uskoro ćete biti preusmjereni";
        $idi="zahtjevi_za_aktivaciju.php";
        include_once '_poruka.php';
    }

  //  header("Location:zahtjevi_za_aktivaciju.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
?>

