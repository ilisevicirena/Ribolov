
<?php

include("klase/baza.php");
$baza = new Baza();
include ("klase/sesija.php");
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
$korisnik=$_GET['korisnik'];
if ($prijavaTip == administrator) {
    $result = $baza->upitDB("DELETE FROM Moderator_klub WHERE Korisnik_Korisnicko_ime='$korisnik' and Ribicki_klub_ID_klub='$id'");
    if ($result) {
        upisiLog("Brisanje: Obrisan moderator kluba {$id}", $prijava, 3);
        $poruka="Uspješno ste obrisali {$korisnik} kao moderatora ribičkog kluba {$id}. Uskoro ćete biti preusmjereni.";
        $idi="moderatori.php";
        include_once '_poruka.php';
    }

 //   header("Location:moderatori.php");
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


