<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
include_once 'klase/dnevnik.php';
$baza = new Baza();
if ($prijavaTip == administrator) {
    if (isset($_POST["registracija"])) {
        $naziv = $_POST["naziv"];
        $opis = $_POST["opis"];
        $adresa = $_POST["adresa"];
        $datum = $_POST["datum"];

        $upit = "insert into Ribicki_klub(Naziv, Adresa, Opis, Datum_osnivanja) values('$naziv','$adresa','$opis','$datum')";
        $rezultat = $baza->upitDB($upit);
        if ($rezultat) {
             $tekst = "Unos: dodan novi ribicki klub {$naziv}";
            $korisnik = $prijava;
            upisiLog($tekst, $korisnik, 3);
            $poruka = "Novi klub uspješno dodan!";
            $idi = "klubovi.php";
            include '_poruka.php';
           
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


$naslov = "Novi ribički klub";
$dodaci = "";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->display('predlosci/dodaj_klub_1.tpl');
$smarty->display('predlosci/_footer.tpl');
?>