<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
if (!$prijava) {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}
include_once 'klase/baza.php';
$baza = new Baza();

$upit = "select Korisnicko_ime, Ime, Prezime, Datum_rodenja, Email, Lozinka_citljivo, Adresa, Datum_registracije, Slika from Korisnik where Korisnicko_ime='$prijava'";
$rezultat = $baza->upitDB($upit);
if ($rezultat) {
    list($korime, $ime, $prezime, $datum, $email, $lozinka, $adresa, $datum_reg, $slika) = $rezultat->fetch_array();
}

$slik = "<img src=\"img/$slika\" class=\"profilne\" />";
$naslov = "Profil";
$dodaci = "";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('slika', $slik);
$smarty->assign('korime', $korime);
$smarty->assign('ime', $ime);
$smarty->assign('prezime', $prezime);
$smarty->assign('datum', $datum);
$smarty->assign('email', $email);
$smarty->assign('adresa', $adresa);
$smarty->assign('datum_reg', $datum_reg);

$smarty->display('predlosci/profil.tpl');
$smarty->display('predlosci/_footer.tpl');


