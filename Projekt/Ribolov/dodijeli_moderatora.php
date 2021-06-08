<?php

include_once 'klase/baza.php';
include_once 'klase/sesija.php';
include_once 'klase/dnevnik.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
$baza=new Baza();
$vrijeme= vrijemeSad();
if ($prijavaTip == administrator) {
    if (isset($_POST['dodaj_moderatora'])) {
        $klub=$_POST["klub"];
        $moderator=$_POST["moderator"];
        $rezult=$baza->upitDB("insert into Moderator_klub (Datum,Korisnik_Korisnicko_ime, Ribicki_klub_ID_klub)"
                . "values ('$datum','$moderator','$klub')");
        if ($rezult) {
            upisiLog("Unos: Dodijeljen novi moderator klubu {$klub}", $prijava, 3);
            $poruka="Uspješno ste dodijelili novog moderatora klubu {$klub}. Uskoro ćete biti preusmjereni.";
            $idi="moderatori.php";
            include_once '_poruka.php';
            // header("Location: moderatori.php");
        }
    }
} else {
    header("Location: greske.php?kod=20"); # NEMA PRAVO PRISTUPA
}


$baza1= new Baza();
$pogledA = array();
$upit1 = "SELECT Korisnicko_ime, Ime, Prezime from Korisnik where Tip_korisnika_ID_tip=3";
$rezultat1 = $baza1->upitDB($upit1);
if ($rezultat1->num_rows > 0) {
    while ($red = $rezultat1->fetch_assoc()) {
        $pogledA[$red['Korisnicko_ime']] = $red['Ime'].' '.$red['Prezime'];
    }
}

$pogledB = array();
$upit = "SELECT ID_klub, Naziv FROM Ribicki_klub";
$rezultat = $baza1->upitDB($upit);
if ($rezultat->num_rows > 0) {
    while ($red = $rezultat->fetch_assoc()) {
        $pogledB[$red['ID_klub']] = $red['Naziv'];
    }
}


$naslov = "Dodaj moderatora";
$dodaci = "";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('aktivnaSkripta', basename($_SERVER['PHP_SELF']));
$smarty->assign('moderatori', $pogledA);
$smarty->assign('klubovi', $pogledB);
$smarty->display('predlosci/dodaj_moderatora.tpl');
$smarty->display('predlosci/_footer.tpl');
?>

