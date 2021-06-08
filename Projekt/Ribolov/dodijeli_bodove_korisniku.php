<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
$korisnik = $_GET['korisnik'];
if ($prijavaTip == administrator || $prijavaTip == moderator) {
    if (isset($_POST["prihvati"])) {
        $bodovi = $_POST["bodovi"];
        $upit = "update Korisnik_natjecanje set Bodovi='$bodovi' where Korisnik_Korisnicko_ime='$korisnik' and Natjecanje_ID_natjecanje='$id'";
        $rezultat = $baza->upitDB($upit);
        if ($rezultat) {

            upisiLog("Izmjena: Dodijeljeni bodovi korisniku {$korisnik}", $prijava, 3);
            $poruka="Uspješno ste dodijelili bodove korisniku {$korisnik}. Uskoro ćete biti preusmjereni.";
            $idi="dodijeli_bodove.php";
            include_once '_poruka.php';
         //   header("Location: dodijeli_bodove.php");
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


$naslov = "Dodijeli bodove korisniku";
$dodaci = "";
$pozovi = "dodijeli_bodove_korisniku.php?id=$id&korisnik=$korisnik";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/prihvati_prijavu.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
   
