<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
if ($prijavaTip == administrator) {
    if (isset($_POST["registracija"])) {
        $naziv = $_POST["naziv"];
        $opis = $_POST["opis"];
        $adresa = $_POST["adresa"];
        $velicina = $_POST["velicina"];

        $upit = "insert into Lokacija(Naziv, Adresa, Opis, Velicina) values('$naziv','$adresa','$opis','$velicina')";
        $rezultat = $baza->upitDB($upit);
        if ($rezultat) {
             $tekst = "Unos: dodana nova lokacija {$naziv}";
            $korisnik = $prijava;
            upisiLog($tekst, $korisnik, 3);
            $poruka = "Nova lokacija uspješno dodana!";
            $idi = "lokacije.php";
            include_once '_poruka.php';
           
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}

$naslov = "Nova lokacija";
$dodaci = "";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->assign('n','');
$smarty->assign('o', '');
$smarty->assign('a','');
$smarty->assign('v','');
$smarty->display('predlosci/dodaj_lokaciju.tpl');
$smarty->display('predlosci/_footer.tpl');
?>