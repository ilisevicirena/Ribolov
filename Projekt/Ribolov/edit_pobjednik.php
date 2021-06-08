<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
$korisnik = $_GET['korisnik'];
if ($prijavaTip == administrator) {
    if (isset($_POST["spremi"])) {
        $bodovi = $_POST["bodovi"];
        $opis = $_POST["opis"];

        $upit = "update Pobjednik set Broj_bodova='$bodovi', Opis='$opis' where Natjecanje_ID_natjecanje='$id' and Korisnik_Korisnicko_ime='$korisnik'";
        $rezultat = $baza->upitDB($upit);

        if ($rezultat) {
            upisiLog("Izmjena: Promjenjeni podaci o pobjedniku natjecanja {$id}", $prijava, 3);
            $poruka="Uspješno ste promijenili podatke o pobjedniku natjecanja {$id}.";
            $idi="pobjednici.php";
            include_once '_poruka.php';
            //header("Location: pobjednici.php");
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
$r=$baza->upitDB("select Broj_bodova, Opis from Pobjednik where Natjecanje_ID_natjecanje='$id' and Korisnik_Korisnicko_ime='$korisnik'");
list($bod, $op)=$r->fetch_array();
$naslov = "Uredi podatke o pobjedniku";
$dodaci = "";
$pozovi = "edit_pobjednik.php?id=$id&korisnik=$korisnik";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('bod', $bod);
$smarty->assign('op',$op);
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/edit_pobjednik.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
   
