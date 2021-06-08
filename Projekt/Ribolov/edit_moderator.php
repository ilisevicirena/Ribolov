<?php

include_once 'klase/sesija.php';
$prijava = dohvatiLogKorId();
$prijavaTip = dohvatiLogKorTip();
include_once 'klase/baza.php';
$baza = new Baza();
include_once 'klase/dnevnik.php';
$id = $_GET['id'];
$korisnik=$_GET['korisnik'];
$datum= vrijemeSad();
if ($prijavaTip == administrator) {
    if (isset($_POST["dodaj"])) {
       $moderator=$_POST["moderator"];
      
        $upit = "update Moderator_klub set Korisnik_Korisnicko_ime='$moderator', Datum='$datum'"
                . " where Korisnik_Korisnicko_ime='$korisnik' and Ribicki_klub_ID_klub='$id'";
        $rezultat = $baza->upitDB($upit);

        if ($rezultat) {
            $korisnik = $prijava;
            upisiLog("Izmjena: Promjenjen moderator kluba {$id}", $korisnik, 3);
            $poruka="Uspješno ste promijenili moderatora kluba {$id}.";
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
$naslov = "Promijeni moderatora";
$dodaci = "";
$pozovi = "edit_moderator.php?id=$id&korisnik=$korisnik";
include_once '_header.php';
include_once '_navigacija.php';
$smarty->assign('moderatori',$pogledA);
$smarty->assign('aktivnaSkripta', $pozovi);
$smarty->display('predlosci/edit_moderator.tpl');
$smarty->display('predlosci/_footer.tpl');
?>
   
